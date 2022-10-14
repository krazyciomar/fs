<?php
function fecha($f) {
$v=explode('/',$f);
return $v[2]."-".$v[0]."-".$v[1];
}

function ext_fecha1($f) {
$v=explode('-',$f);
return fecha(trim($v[0]));
}

function ext_fecha2($f) {
$v=explode('-',$f);
return fecha(trim($v[1]));
}

$rango=$_REQUEST["rango"];

if (!$rango) {
$rango=Date('m/d/Y')." - ".Date('m/d/Y');
}
$fecha1=ext_fecha1($rango);
$fecha2=ext_fecha2($rango);
$accountcode=$_REQUEST["accountcode"];

$sql="SELECT distinct(`start_stamp`),`caller_id_number` as numero,`destination_number` as destino,`start_stamp` as fechahora,end_stamp as fin, ceil(`billsec`/60) as minutos,`hangup_cause` as status from cdr where date(start_stamp)>='$fecha1' and date(start_stamp)<='$fecha2' and accountcode='$accountcode' ORDER BY  `cdr`.`start_stamp`";
$res=mysql_query($sql);

?> 
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de llamadas</h3><br> <small><?php echo $rango ?> (mm/dd/yyyy)</small>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>CallerID</th>
                  <th>Origen</th>
                  <th>Destino</th>
                  <th>Inicio</th>
                  <th>Fin</th>
                  <th>Minutos</th>
                  <th>Status llamada</th>
                </tr>
                </thead>
                <tbody>
<?php
while ($obj=mysql_fetch_object($res)) { ?>
<tr <?php
$c1='/^15[0-9]+/';
$c2='/^0[0-9]{2}15[0-9]+/';
$c3='/^0[0-9]{3}15[0-9]+/';
$c4='/^0[0-9]{4}15[0-9]+/';
$c5='/^0[0-9]{5}15[0-9]+/';
/*if (preg_match($c1,$obj->destino) && strlen($obj->destino)>4) echo 'style="background-color: #e0e0e0"';
if (preg_match($c2,$obj->destino) && strlen($obj->destino)>4) echo 'style="background-color: #e0e0e0"';
if (preg_match($c3,$obj->destino)) echo 'style="background-color: #e0e0e0"';
if (preg_match($c4,$obj->destino)) echo 'style="background-color: #e0e0e0"';*/
//if (preg_match($c5,$obj->destino)) echo 'style="background-color: #e0e0e0"';
if (((preg_match($c1,$obj->destino) || preg_match($c2,$obj->destino)|| preg_match($c3,$obj->destino) || preg_match($c4,$obj->destino)) && strlen($obj->destino)>4)) { 
	echo 'style="background-color: #e0e0e0"';
	$mc++;
	$tc+=$obj->minutos;
}
 ?>>
<td><?php echo $obj->callerid ?></td>
<td><?php echo $obj->numero ?></td>
<td><?php echo $obj->destino ?></td>
<td><?php echo $obj->fechahora ?></td>
<td><?php echo $obj->fin ?></td>
<td><?php echo $obj->minutos; $mins++ ?></td>
<td><?php echo $obj->status ?></td>
</tr>
<?php }

$sql="SELECT distinct(`start_stamp`),sum(ceil(billsec/60)) as minutos FROM `cdr` where length(destination_number)>4 and accountcode='$accountcode' and date(start_stamp)>='$fecha1' and date(start_stamp)<='$fecha2' and (destination_number like '15%' or destination_number like '0__15%' or destination_number like '0___15%' or destination_number like '0____15%');";

//$sql="SELECT distinct(`start_stamp`),sum(ceil(billsec/60)) as minutos, sum(ceil(billsec/60))*0.6 as precio,`caller_id_number` as numero,`destination_number` as destino,`start_stamp` as fechahora,end_stamp as fin, ceil(`billsec`/60) as minutos,`hangup_cause` as status from cdr where date(start_stamp)>='$fecha1' and date(start_stamp)<='$fecha2' and accountcode='$accountcode' ORDER BY  `cdr`.`start_stamp`";
$res=mysql_query($sql);
$celus=mysql_fetch_object($res);
?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

 <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Llamadas (<?php echo $rango ?>)</h3>

          <div class="box-tools pull-right">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
<b> Total de minutos: <?php echo $mins ?> <br>
Total de minutos a celularles: <?php echo $tc ?> costo: <?php echo '$ '.$tc*0.6." pesos"; ?> </b>
<!-- /.box-body -->
 <div class="box-footer">
<button type="button" onclick="window.location.href='export_llamadas.php?fecha1=<?php echo $fecha1 ?>&fecha2=<?php echo $fecha2 ?>&accountcode=<?php echo $accountcode ?>'" class="btn btn-primary pull-left" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Bajar CSV Excell 
          </button>
<button type="button" onclick="window.location.href='imprime.php?fecha1=<?php echo $fecha1 ?>&fecha2=<?php echo $fecha2 ?>&accountcode=<?php echo $accountcode ?>&minutos=<?php echo $mins ?>&celulares=<?php echo $tc?>';target='_blank'" class="btn btn-primary pull-left" style="margin-right: 5px;">
            <i class="fa fa-download"></i>Bajar PDF 
          </button>
        </div>
        <!-- /.box-footer-->

      </div>
      <!-- /.box -->


<?php

//$db = new PDO('/usr/local/freeswitch/db/cdr.db');

class Db extends SQLite3
   {
      function __construct()
      {
         $this->open('/usr/local/freeswitch/db/cdr.db');
      }
   }

   $db = new Db();

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

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 		<div class="info-box bg-blue" style="width:400px">
                        <span class="info-box-icon bg-orange"><i class="fa fa-mail-forward"></i></span>
                        <div class="info-box-content">
                                <span class="info-box-text">&nbsp</span>
                                <span class="info-box-number">Listado de llamadas Salientes</span>
                                <div class="progress">
                                        <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description" style="text-align:right">
                                (On-line)
                                </span>
                        </div>
                        <!-- /.info-box-content -->
                </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<form>
<div class="box box-primary" style="width:80%">
            <div class="box-header">
              <h3 class="box-title"><button class="btn btn-block btn-primary btn-lg">Ingrese rango de fechas</button></h3>
            </div>
            <div class="box-body">
  
<div class="row">
            <!-- Date range -->
	<div class="col-md-6">
   	<div class="form-group" style="width:50%">
                <label>Rango de fechas:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="rango" class="form-control pull-right" id="reservation">

                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
	</div>
	<div class="col-md-6">
		<div class="info-box bg-green" style="width:350px">
            		<span class="info-box-icon"><i class="fa fa-calendar"></i></span>
            		<div class="info-box-content">
              			<span class="info-box-text">Rango de fecha</span>
              			<span class="info-box-number">(mm/dd/yyyy)</span>
              			<div class="progress">
                			<div class="progress-bar" style="width: 70%"></div>
              			</div>
                  		<span class="progress-description">
                    		Menor de 10 Días
                  		</span>
            		</div>
            		<!-- /.info-box-content -->
          	</div>
        </div>
</div>


            </div>
<div class="box-footer">
<button type="submit" class="btn btn-primary">Buscar</button>
        </div>
        <!-- /.box-footer-->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
<input type="hidden" name="action" value="5">
</form>

<div class="box box-primary" style="width:80%">
            <div class="box-header">
              <h3 class="box-title"><button class="btn btn-block btn-primary btn-lg">Resultado de la búsqueda</button></h3><br> <small><?php echo $rango ?> (mm/dd/yyyy)</small>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding: 20px">

<?php 
$sql="select `start_stamp`,`caller_id_number`,`destination_number`,`start_stamp`,end_stamp, billsec,`hangup_cause` from cdr where length(destination_number)>4 and length(caller_id_number)=4 and date(start_stamp)>='$fecha1' and date(start_stamp)<='$fecha2' ORDER BY  `cdr`.`start_stamp`";
$ret=$db->query($sql);

?>

<table style="width:80%" id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr>
                  <th width="40px">Origen</th>
                  <th width="40px">Destino</th>
                  <th width="100px">Inicio</th>
                  <th width="100px">Fin</th>
                  <th width="10px">Mins</th>
                  <th width="100px">Estado</th>
                  <th width="40px">Audio</th>
                </tr>
                </thead>
                <tbody>
<?php
while ($row = $ret->fetchArray(SQLITE3_ASSOC)) { 
?>
<tr>
<td><?php echo $row["caller_id_number"]; ?></td>
<td><?php echo $row["destination_number"]; ?></td>
<td><?php echo $row["start_stamp"]; ?></td>
<td><?php echo $row["end_stamp"]; ?></td>
<td align="left"><?php echo ceil($row["billsec"]/60); ?></td>
<td><?php echo $row["hangup_cause"]; ?></td>
<td>---</td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>

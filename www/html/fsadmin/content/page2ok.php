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
      <h1>
	Listado de llamadas
        <small>listado de llamadas y sus grabaciones de audio</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<form>
<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Ingrese rango de fechas</h3>
            </div>
            <div class="box-body">
              <!-- Date range -->
              <div class="form-group">
                <label>Date range:</label>

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
<div class="box-footer">
<button type="submit" class="btn btn-primary">Buscar</button>
        </div>
        <!-- /.box-footer-->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
<input type="hidden" name="action" value="2">
</form>

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de llamadas</h3><br> <small><?php echo $rango ?> (mm/dd/yyyy)</small>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

<?php 
$sql="select `start_stamp`,`caller_id_number`,`destination_number`,`start_stamp`,end_stamp, billsec,`hangup_cause` from cdr where date(start_stamp)>='$fecha1' and date(start_stamp)<='$fecha2' ORDER BY  `cdr`.`start_stamp`";
$ret=$db->query($sql);
?>


<table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>CallerID</th>
                  <th>Destino</th>
                  <th>Inicio</th>
                  <th>Fin</th>
                  <th>Minutos</th>
                  <th>Segundos</th>
                  <th>Estado</th>
                  <th>Audio</th>
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
<td><?php echo ceil($row["billsec"]/60); ?></td>
<td><?php echo $row["billsec"]; ?></td>
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

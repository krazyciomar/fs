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
<!-- div class="box box-primary" style="width:60%;padding: 10px" -->

<!-- /div -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php include "estadisticas.php" ?>
<?php include "estadisticas2.php" ?>
<?php include "estadisticas3.php" ?>
<form>
<div class="box box-primary" style="width:80%">
            <div class="box-header">
              <h3 class="box-title"><button class="btn btn-block btn-primary btn-lg"><i class="fa fa-calendar"></i>&nbsp&nbspIngrese rango de fechas</span></button></h3>
<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
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
<input type="hidden" name="action" value="2">
</form>


    </section>
    <!-- /.content -->
  </div>

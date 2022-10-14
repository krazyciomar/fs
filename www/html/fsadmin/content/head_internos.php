
<div class="box box-primary">

<?php

$sql="select count(*) as cant from directory";
$res=mysql_query($sql);
$obj=mysql_fetch_object($res);

$sql="SELECT count(*) as cant FROM sip_registrations";

$ret=$db->query($sql);
$row=$ret->fetchArray(SQLITE3_ASSOC);
$regs=$row["cant"];

$sql="SELECT count(*) as cant FROM sip_dialogs";

$ret=$db->query($sql);
$row=$ret->fetchArray(SQLITE3_ASSOC);
$cants=$row["cant"];

$fp=popen("uptime","r");
$a=fgets($fp);

$v=explode(',',$a);

$dias=explode(' ',$v[0]);


$cpu=sys_getloadavg();
$cpu[0]=$cpu[0]*10;


/*
while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {

}
*/
?>
<br>
<center>
<div class="row">
 <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow" style="width:90%;text-align:left">
            <div class="inner">
              <h3><?php echo $regs ?></h3>

              <p>Internos Registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>&nbspTotal Registrados</a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua" style="width:90%;text-align:left">
            <div class="inner">
              <h3><?php echo $obj->cant ?></h3>

              <p>Cant Internos</p>
            </div>
            <div class="icon">
              <i class=ion "fa-calendar-check-o"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>&nbspTotal de Internos</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green"  style="width:90%;text-align:left">
            <div class="inner">
              <h3><?php echo $cants ?></h3>

              <p>Canales Activos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>&nbspTotal 100</a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red" style="width:90%;text-align:left">
            <div class="inner">
              <h3><?php echo (floor(100 * disk_free_space('/data') / disk_total_space('/data'))) ?> %</h3>

              <p>&nbspDisponible</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>&nbspEspacio en disco</a>
          </div>
        </div>
        <!-- ./col -->
      </div>

</centert>

</div>


<div class="box box-primary">

<?php


$sql="SELECT count(*) as cant FROM sip_registrations";

$ret=$db->query($sql);
$row=$ret->fetchArray(SQLITE3_ASSOC);

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
              <h3><?php echo $row["cant"] ?></h3>

              <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>&nbspMax 100</a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua" style="width:90%;text-align:left">
            <div class="inner">
              <h3><?php echo Date('H:m:s') ?></h3>

              <p>Hora Actual</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>&nbsp<?php echo "Fecha Actual: ".Date('d-m-Y') ?></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green"  style="width:90%;text-align:left">
            <div class="inner">
              <h3><?php echo $dias[3] ?> días</h3>

              <p><?php echo $v[1] ?> horas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>&nbspFuncionando</a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red" style="width:90%;text-align:left">
            <div class="inner">
              <h3><?php echo $cpu[0]." %"?></h3>

              <p>&nbsp</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>&nbspCarga de la central</a>
          </div>
        </div>
        <!-- ./col -->
      </div>

</centert>

</div>

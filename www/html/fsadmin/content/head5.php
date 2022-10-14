
<div class="box box-primary">

<?php

$hoy=Date('Y-m-d');

$c=0;
while (Date('D',strtotime('-'.$c.' day'))!='Sun') {
	$c++;
}
$sem=date('Y-m-d', strtotime('-'.$c.' day'));

$sql_sem="SELECT count(*) as cant FROM cdr WHERE length(caller_id_number)>4 and not(caller_id_number=destination_number) and date(start_stamp)>=\"$sem\" and date(start_stamp)<=date('now')";


$ayer=date('Y-m-d', strtotime('-1 day'));
$ante_ayer=date('Y-m-d', strtotime('-2 day'));

$week=$numeroSemana = date("W");

$sql="SELECT count(*) as cant from cdr where length(caller_id_number)>4 and not(caller_id_number=destination_number) and date(start_stamp)=\"$ante_ayer\";";
$ret=$db->query($sql);
$row=$ret->fetchArray(SQLITE3_ASSOC);
$llamadas_ante_ayer=$row["cant"];

$sql="SELECT count(*) as cant from cdr where length(caller_id_number)>4 and not(caller_id_number=destination_number) and date(start_stamp)=\"$ayer\";";
$ret=$db->query($sql);
$row=$ret->fetchArray(SQLITE3_ASSOC);
$llamadas_ayer=$row["cant"];

$sql="SELECT count(*) as cant from cdr where length(caller_id_number)>4 and not(caller_id_number=destination_number) and date('now')=date(start_stamp);";
$ret=$db->query($sql);
$row=$ret->fetchArray(SQLITE3_ASSOC);
$llamadas_hoy=$row["cant"];

$ret=$db->query($sql_sem);
$row=$ret->fetchArray(SQLITE3_ASSOC);
$llamadas_sem=$row["cant"];

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
              <h3>&nbsp<?php echo $llamadas_hoy; ?></h3>

              <p>Llamadas Entrante</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>&nbspDía de hoy</a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua" style="width:90%;text-align:left">
            <div class="inner">
              <h3><?php echo $llamadas_ayer ?></h3>

              <p>Llamadas Entrantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>&nbsp<?php echo "Fecha Ayer: ".$ayer ?></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green"  style="width:90%;text-align:left">
            <div class="inner">
              <h3><?php echo $llamadas_ante_ayer ?></h3>

              <p>Llamadas Entrantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>&nbspFecha Anteayer: <?php echo $sem ?></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red" style="width:90%;text-align:left">
            <div class="inner">
              <h3><?php echo $llamadas_sem ?></h3>

              <p>Llamadas Entrantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>&nbspSemana Actual</a>
          </div>
        </div>
        <!-- ./col -->
      </div>

</centert>

</div>

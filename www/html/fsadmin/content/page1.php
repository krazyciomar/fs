<?php

//$db = new PDO('/usr/local/freeswitch/db/cdr.db');

class Db extends SQLite3
   {
      function __construct()
      {
         $this->open('/usr/local/freeswitch/db/sofia_reg_internal.db');
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

if (isset($_REQUEST["rango"]))  {
	$rango=$_REQUEST["rango"];
} else {
	$rango=0;	
}


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

    </section>

    <!-- Main content -->
    <section class="content">

<form>
<input type="hidden" name="action" value="1">
</form>

<?php include "status.php" ?>

<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><button class="btn btn-block btn-primary btn-lg"><i class="fa fa-users"></i>&nbsp&nbspDispositivos registrados</button></h3><br><br>
<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>


            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding: 20px">

<?php 
$sql="SELECT * FROM sip_registrations order by sip_user asc ;";
//echo $sql;
$ret=$db->query($sql);
?>

<table id="example3" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr>
		 <th>User</th>
                  <th>Ip Address</th>
                  <th>Contact</th>
                  <th>Port</th>
                  <th>Transport</th>
                  <th>Expires</th>
                  <th>Agent</th>
                </tr>
                </thead>
                <tbody>
<?php
while ($row = $ret->fetchArray(SQLITE3_ASSOC)) { 
?>
<tr>
<td><?php echo $row["sip_user"]; ?></td>
<td><?php echo $row["network_ip"]; ?></td>
<td><?php 
$a=$row["contact"];
$a=str_replace("\"", '', $a);
echo $a;
?></td>
<td><?php echo $row["network_port"]; ?></td>
<td><?php echo $row["status"]; ?></td>
<td><?php echo date("d-m-Y g:i A",$row["expires"]); ?></td>
<td><?php echo $row["user_agent"]; ?></td>
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

<?php

class Db extends SQLite3
   {
      function __construct()
      {
         $this->open('/usr/local/freeswitch/db/core.db');
      }
   }

   $db = new Db();

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
	Dispositivos registrados
        <small>Telefonos IP registrados</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Dispositivos Registrados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

<?php 
$sql="SELECT * FROM registrations;";
$ret=$db->query($sql);
?>

<table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User</th>
                  <th>Ip Address</th>
                  <th>Port</th>
                  <th>Transport</th>
                  <th>Expires</th>
                </tr>
                </thead>
                <tbody>
<?php
while ($row = $ret->fetchArray(SQLITE3_ASSOC)) { ?>
<tr>
<td><?php echo $row["reg_user"]; ?></td>
<td><?php echo $row["network_ip"]; ?></td>
<td><?php echo $row["network_port"]; ?></td>
<td><?php echo $row["network_proto"]; ?></td>
<td><?php echo $row["expires"]; ?></td>
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

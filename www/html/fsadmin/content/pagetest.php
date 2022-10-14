<?php include "connect.php"; ?>
<script type="text/javascript" src="content/internos.js"></script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Internos 
        <small>Agregado y edición de internos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Interno</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<div class="form-group">
                <label>Interno</label>
<?php
$sql="select * from directory";
$res=mysql_query($sql);
?>

                
<div class="form-group">
		<select class="form-control select2" name="interno" onchange="refresh()" style="width: 100%;">
<?php while ($obj=mysql_fetch_object($res)) { ?>
	<option value="<?php echo $obj->id ?>"><?php echo $obj->username; ?></option>
<?php } ?>
                </select>
</div>

<div class="col-md-6">
<div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
<div class="form-group">
                  <label for="exampleInputEmail1">CallerId</label>
                  <input type="text" class="form-control" id="callerid" placeholder="Enter Callerid">
                </div>
</div>

<div class="col-md-6">
<div class="form-group">
                  <label for="exampleInputPassword1">Password confirmation</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>
<div class="form-group">
                  <label for="exampleInputEmail1">CallerId</label>
                  <input type="text" class="form-control" id="callerid" placeholder="Enter Callerid">
		</div>
</div>
              </div>

</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include "connect.php";
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
<?php //include "head_internos.php" ?>
<form>
<input type="hidden" name="action" value="8">
</form>

<?php 


$caller_id=$_REQUEST["caller_id"];
$pass=$_REQUEST["pwd"];
$id=$_REQUEST["id"];

function textbox($type,$label,$placeholder,$name,$value) { ?>
<div class="form-group">
        <label><?php echo $label ?></label>
        <input type="<?php echo $type ?>" name="<?php echo $name ?>" <?php if ($type=='password') echo ' title="'.$value.'" '; ?> value="<?php echo $value ?>" class="form-control" placeholder="<?php echo $placeholder?>">
</div>

<?php }

function checkbox($label,$name,$value) { ?>
<div class="form-group">
     <div class="checkbox">
     <label><input type="checkbox" name="<?php echo $name ?>" value="<?php echo $value ?>"<?php if (isset($value) && strlen($value)>0 && $value!='0') echo 'checked'?>><?php echo $label ?></label>
     </div>
</div>
<?php }

include "skel.php";
?>

<div class="box box-primary" style="width:80%">
            <div class="box-header">
              <h3 class="box-title">
                Propiedades del Interno 
                </h3>
<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding: 20px">
<?php
$dirs=opendir('internos');

?>
<form>
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<table>
<tr>
<td>
<h1> Interno: <?php echo $_SESSION["user_session"] ?> </h1>
</td>
</tr>
</table>
</div>
</div>
</div>


<input type="hidden" name="callerid" value="<?php echo $callerid ?>">


<div class="row">

<div class="col-sm-6">
<?php textbox("text","Apellido","Ingrese caller apellido...","apellido",$apellido); ?>
</div>

<div class="col-sm-6">
<?php textbox("text","Nombre","Ingrese caller nombre...","nombre",$nombre); ?>
</div>

</div>

<div class="row">

<div class="col-sm-4">
<?php textbox("text","E-Mail","Ingrese caller email...","email",$email); ?>
</div>

<div class="col-sm-4">
<?php textbox("text","Celular","Ingrese caller celular...","celular",$celular); ?>
</div>

<div class="col-sm-4">
<?php textbox("text","Sector","Ingrese caller sector...","sector",$sector); ?>
</div>

</div>


<div class="row">

<div class="col-sm-4">
<?php textbox("text","Redireccion",'',"redirect",$redirect);?>
</div>

<div class="col-sm-4">
<?php textbox("password","Password",'',"webpass",$webpass);?>
<input type="hidden" name="password" value="<?php echo $password?>">
<input type="hidden" name="pickup" value="<?php echo $_REQUEST["pickup"]?>">
</div>

<div class="col-sm-4">
</div>

</div>

<div class="row">
<div class="col-sm-2">
<input type="hidden" name="internos" value="<?php echo $internos?>">
</div>
<div class="col-sm-2">
<input type="hidden" name="urbanas" value="<?php echo $urbanas?>">
</div>
<div class="col-sm-2">
<input type="hidden" name="celulares" value="<?php echo $celulares?>">
</div>
<div class="col-sm-2">
<input type="hidden" name="ddi" value="<?php echo $ddi?>">
</div>
<div class="col-sm-2">
<input type="hidden" name="activo" value="<?php echo $activo ?>">
</div>
<div class="col-sm-2">
&nbsp;
</div>

</div>

<div class="row">

<div class="col-sm-12">
<?php checkbox("Casilla de voz",'casilla',$casilla);?>
</div>

</div>


</div>

<?php echo $obj->username."<br>" ?>

<input type="hidden" type="text" name="action" value="8">

            <!-- /.box-body -->
	      <div class="box-footer">
                <button type="submit" name="guardar" value="1" class="btn btn-primary">Guardar</button>
              </div>
          </div>
          <!-- /.box -->


</form>
    </section>
    <!-- /.content -->
  </div>

<?php
//include "connect.php";

if ($_REQUEST["eliminar"]) {
?> 
<script>
alert('Se ha eliminado el interno: <?php echo $_REQUEST["combo_interno"] ?>'); 
</script>
<?php
unlink("internos/".$_REQUEST["combo_interno"].".xml");
}

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
<input type="hidden" name="action" value="2">
</form>

<div class="box box-primary" style="width:80%">
            <div class="box-header">
              <h3 class="box-title">
		Nuevo Interno
		</h3>
<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding: 20px">

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

include "skeleton.php";
?>

<form>

<div class="row">

<div class="col-sm-3">
<?php textbox("text","Interno Nuevo","Ingrese numero de interno...","nuevo",'') ?>
</div>
<input type="hidden" name="action" value="3">
<div class="col-sm-2">
<label>&nbsp;</label>
<button type="submit" class="btn btn-block btn-primary">Agregar</button>
</div>

<div class="col-sm-7">
<label>&nbsp;</label>
<div>&nbsp;</div>
</div>
</form>
</div>
</div>
</div>

<div class="box box-primary" style="width:80%">
            <div class="box-header">
              <h3 class="box-title">
                Propiedades de Interno 
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
        <label>Interno</label>
<table>
<tr>
<td>
<select class="form-control select2" name="combo_interno" onchange="this.form.submit()" >
<?php while ($arch=readdir($dirs)) {
	if ($arch[0]=='1' && strstr($arch,'xml')) { 
		$x=explode('.',$arch);
		$f[]=$x[0];
	}
}

asort($f);

function apenom($f) {
$a=simplexml_load_file("internos/$f.xml");
$t1=$a->user->variables->variable[9]["value"];
$t2=$a->user->variables->variable[10]["value"];
return $t1." ".$t2; 
}

foreach ($f as $name => $value) { 
$apenom=apenom($value);
?> 
<option value="<?php echo $value ?>" <?php if ($value==$_REQUEST["combo_interno"] || $value==$_REQUEST["nuevo"]) echo "selected";?>><?php echo $value." ".$apenom; ?></option>
<?php } ?>
</select>
</td>
<td>
<button type="submit" class="btn btn-block btn-primary">>></button>
</td>
</tr>
</table>
</div>
</div>
</div>

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
<div class="col-sm-3">
<?php textbox("text","Caller id","Ingrese caller id...","callerid",$callerid); ?>
</div>

<div class="col-sm-3">
<?php textbox("password","Password",'',"password",$password);?>
<input type="hidden" name="redirect" value="<?php echo $redirect?>">
<input type="hidden" name="pickup" value="<?php echo $pickup?>">
</div>

<div class="col-sm-3">
<?php textbox("password","Web password",'',"webpass",$webpass);?>
</div>

<div class="col-sm-3">
<div class="form-group">
        <label>Grupo de pickup</label>
<select name="pickup" class="form-control select2">
        <option value="grupo1" <?php if ($pickup=='grupo1') echo "selected"?>>Grupo 1</option>
        <option value="grupo2" <?php if ($pickup=='grupo2') echo "selected"?>>Grupo 2</option>
        <option value="grupo3" <?php if ($pickup=='grupo3') echo "selected"?>>Grupo 3</option>
        <option value="grupo4" <?php if ($pickup=='grupo4') echo "selected"?>>Grupo 4</option>
        <option value="grupo5" <?php if ($pickup=='grupo5') echo "selected"?>>Grupo 5</option>
</select>
</div>
</div>


</div>

<div class="row">

<div class="col-sm-2">
<?php checkbox("Activo",'activo',$activo); ?>
</div>
<div class="col-sm-2">
<?php checkbox("Internos",'internos',$internos);?>
</div>
<div class="col-sm-2">
<?php checkbox("Urbanas",'urbanas',$urbanas);?>
</div>
<div class="col-sm-2">
<?php checkbox("Celulares",'celulares',$celulares);?>
</div>
<div class="col-sm-2">
<?php checkbox("DDI",'ddi',$ddi);?>
</div>
<div class="col-sm-2">
&nbsp;
</div>

</div>

<div class="row">

<div class="col-sm-2">
<?php checkbox("Casilla de voz",'casilla',$casilla);?>
</div>

</div>


</div>

<?php echo $obj->username."<br>" ?>

<input type="hidden" type="text" name="action" value="3">


            <!-- /.box-body -->
	      <div class="box-footer">
                <button type="submit" name="guardar" value="1" class="btn btn-info">Guardar</button>
		<button type="submit" class="btn btn-danger pull-right" name="eliminar" onclick="return confirma()" value="1">Eliminar</button>
              </div>
          </div>
          <!-- /.box -->


</form>
    </section>
    <!-- /.content -->
  </div>

<script>
function confirma() {
var a=confirm('¿Está seguro?');
return a;
} 
</script>

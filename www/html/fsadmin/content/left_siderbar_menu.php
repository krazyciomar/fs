<?php 
function activate($action) {
global $_REQUEST; 
	if (isset($_REQUEST["action"]) && $_REQUEST["action"]==$action) echo 'class="active"'; 
}

?>

<!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Opciones</li>
        <!-- Optionally, you can add icons to the links -->


<?php // if ($_SESSION["user_session"]=='1') { ?>
        <li <?php activate(1) ?>><a href="?action=1"><i class="fa fa-phone"></i> <span>Dispositivos registrados</span></a></li>
<?php // } ?>
<?php // if ($_SESSION["user_session"]=='1') { ?> 
        <li <?php activate(2) ?>><a href="?action=2"><i class="fa fa-exchange" style="color:yellow"></i> <span>Llamadas general</span></a></li>
<?php //} ?>
        <li <?php activate(4) ?>><a href="?action=4"><i class="fa fa-mail-reply text-green"></i> <span>Llamadas entrantes</span></a></li>
        <li <?php activate(5) ?>><a href="?action=5"><i class="fa fa-mail-forward text-red"></i> <span>Llamadas salientes</span></a></li>
        <li <?php activate(3) ?>><?php 
		//if ($_SESSION["user_session"]=='1') {
		if (1) {
		echo '<a href="?action=3"><i class="fa fa-gear text-blue"></i> <span> Manejo de internos';
		} else {
		echo '<a href="?action=8"><i class="fa fa-gear text-blue"></i> <span> Propiedades';
		}
		?></span></a></li>
<?php //if ($_SESSION["user_session"]=='1') { ?> 
<?php if (1) { ?> 
        <li <?php activate(6) ?>><a href="?action=6"><i class="fa fa-lightbulb-o"></i> <span>Estado</span></a></li>
<?php } ?>
      </ul>
      <!-- /.sidebar-menu -->

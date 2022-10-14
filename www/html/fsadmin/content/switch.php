<?php 

if (isset($_REQUEST["action"]) && $_REQUEST["action"]) {
	$action=$_REQUEST["action"];
} else {
	$action=1;
}

switch ($action) {
	CASE 1:
		include "content/page1.php";
		break;
	CASE 2:
		include "content/page2.php";
		break;
	CASE 3:
		include "content/page3.php";
		break;
	CASE 5:
		include "content/page4.php";
		break;
	CASE 4:
		include "content/page5.php";
		break;
	CASE 6:
		include "content/page6.php";
		break;
	CASE 7:
		include "content/page7.php";
		break;
	CASE 8:
		include "content/page8.php";
		break;
}

?>

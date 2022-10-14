<?php

$filename=$_REQUEST["ruta"];
header('Content-Type: audio/mpeg');
header('Content-Disposition: filename="recording.mp3"');
header('Content-length: '.filesize($filename));
header('Cache-Control: no-cache');
header("Content-Transfer-Encoding: chunked"); 

readfile($filename);
?>

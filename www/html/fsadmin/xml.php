<?php
$a=simplexml_load_file("internos/1000.xml");
//var_dump($a);
$a->user->variables->variable[4]["value"]=2;


$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($a->asXML());
$b=$dom->saveXML();

file_put_contents("2000.xml",$b);
?>

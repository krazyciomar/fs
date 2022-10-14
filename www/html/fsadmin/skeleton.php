<?php

if (isset($_REQUEST["nuevo"])) {

$interno=$_REQUEST["nuevo"];

$xml='
<include>
  <user id="'.$interno.'">
    <params>
      <param name="password" value="$${default_password}"/>
      <param name="vm-password" value="'.$interno.'"/>
    </params>
    <variables>
      <variable name="accountcode" value="'.$interno.'"/>
      <variable name="activo" value="1"/>
      <variable name="internos" value="1"/>
      <variable name="urbanas" value="1"/>
      <variable name="celulares" value="1"/>
      <variable name="ddi" value="1"/>
      <variable name="casilla" value="1"/>
      <variable name="redirect" value=""/>
      <variable name="pickup" value=""/>
      <variable name="nombre" value=""/>
      <variable name="apellido" value=""/>
      <variable name="sector" value=""/>
      <variable name="celular" value=""/>
      <variable name="email" value=""/>

      <variable name="user_context" value="piruli"/>
      <variable name="effective_caller_id_name" value="Extension '.$interno.'"/>
      <variable name="effective_caller_id_number" value="'.$interno.'"/>
      <variable name="outbound_caller_id_name" value="$${outbound_caller_name}"/>
      <variable name="outbound_caller_id_number" value="$${outbound_caller_id}"/>
      <variable name="webpass" value="sty2030"/>
    </variables>
  </user>
</include>';

file_put_contents("internos/$interno.xml",$xml);
}


function setea($vari) {
if (isset($_REQUEST[$vari])) {
	return 1;
}
else {
	return 0;
}
}

if (isset($_REQUEST["guardar"])) {
$a=simplexml_load_file("internos/".$_REQUEST["combo_interno"].".xml");

$a->user->params->param[0]["value"]=$_REQUEST["password"];
$a->user->variables->variable[15]["value"]=$_REQUEST["callerid"];
$a->user->variables->variable[1]["value"]=setea("activo");
$a->user->variables->variable[2]["value"]=setea("internos");
$a->user->variables->variable[3]["value"]=setea("urbanas");
$a->user->variables->variable[4]["value"]=setea("celulares");
$a->user->variables->variable[5]["value"]=setea("ddi");
$a->user->variables->variable[6]["value"]=setea("casilla");
$a->user->variables->variable[7]["value"]=$_REQUEST["redirect"];
$a->user->variables->variable[8]["value"]=$_REQUEST["pickup"];
$a->user->variables->variable[9]["value"]=$_REQUEST["nombre"];
$a->user->variables->variable[10]["value"]=$_REQUEST["apellido"];
$a->user->variables->variable[11]["value"]=$_REQUEST["sector"];
$a->user->variables->variable[12]["value"]=$_REQUEST["celular"];
$a->user->variables->variable[13]["value"]=$_REQUEST["email"];
$a->user->variables->variable[19]["value"]=$_REQUEST["webpass"];

$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($a->asXML());
$b=$dom->saveXML();

file_put_contents("internos/".$_REQUEST["combo_interno"].".xml",$b);
$cmd="fs_cli -x reloadxml";
$fp=popen($cmd,'r');
}

if (isset($_REQUEST["combo_interno"])) {
	$a=simplexml_load_file("internos/".$_REQUEST["combo_interno"].".xml");
	$password=$a->user->params->param[0]["value"];
	$callerid=$a->user->variables->variable[15]["value"];
	$activo=$a->user->variables->variable[1]["value"];
	$internos=$a->user->variables->variable[2]["value"];
	$urbanas=$a->user->variables->variable[3]["value"];
	$celulares=$a->user->variables->variable[4]["value"];
	$ddi=$a->user->variables->variable[5]["value"];
	$casilla=$a->user->variables->variable[6]["value"];
	$redirect=$a->user->variables->variable[7]["value"];
	$pickup=$a->user->variables->variable[8]["value"];
	$nombre=$a->user->variables->variable[9]["value"];
	$apellido=$a->user->variables->variable[10]["value"];
	$sector=$a->user->variables->variable[11]["value"];
	$celular=$a->user->variables->variable[12]["value"];
	$email=$a->user->variables->variable[13]["value"];
	$webpass=$a->user->variables->variable[19]["value"];
//var_dump($a->user->variables);
}

?>

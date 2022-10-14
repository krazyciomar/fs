<?php

/*
	$a=simplexml_load_file("internos/".$_REQUEST["combo_interno"].".xml");
        $password=$a->user->params->param[0]["value"];
        $callerid=$a->user->variables->variable[10]["value"];
        $activo=$a->user->variables->variable[1]["value"];
        $internos=$a->user->variables->variable[2]["value"];
        $urbanas=$a->user->variables->variable[3]["value"];
        $celulares=$a->user->variables->variable[4]["value"];
        $ddi=$a->user->variables->variable[5]["value"];
        $casilla=$a->user->variables->variable[6]["value"];
        $redirect=$a->user->variables->variable[7]["value"];
        $pickup=$a->user->variables->variable[8]["value"];
        $webpass=$a->user->variables->variable[14]["value"];
*/

function verifica($pass1,$pass2,$uname) {
if ($uname>5999) {
	$a=simplexml_load_file("internos/".$uname.".xml");
	$password=$a->user->params->param[0]["value"];
	$webpass=$a->user->variables->variable[19]["value"];
	if ($webpass==$pass1) return true;
	return false;
}

return password_verify($pass1,$pass2);
}

?>

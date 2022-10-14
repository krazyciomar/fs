<?php

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

      <variable name="user_context" value="stylus"/>
      <variable name="effective_caller_id_name" value="Extension '.$interno.'"/>
      <variable name="effective_caller_id_number" value="'.$interno.'"/>
      <variable name="outbound_caller_id_name" value="$${outbound_caller_name}"/>
      <variable name="outbound_caller_id_number" value="$${outbound_caller_id}"/>
      <variable name="webpass" value="sty2030"/>
    </variables>
  </user>
</include>';

file_put_contents("internos/$interno.xml",$xml);

?>

<stylusIPPhoneDirectory clearlight="true">
<Title>Phonelist</Title>
<Prompt>Prompt</Prompt>

<?php
$dirs=opendir('internos');

while ($arch=readdir($dirs)) {

if (strstr($arch,'xml')) {
        $x=explode('.',$arch);
        $f=$x[0];

$a=simplexml_load_file("internos/".$arch);
$nombre=$a->user->variables->variable[9]["value"];
$apellido=$a->user->variables->variable[10]["value"];
?>
<DirectoryEntry><Name><?php echo $nombre." ".$apellido; ?></Name>
<Telephone><?php echo $f; ?></Telephone>
</DirectoryEntry>

<?php 
}
}
?>
</stylusIPPhoneDirectory>

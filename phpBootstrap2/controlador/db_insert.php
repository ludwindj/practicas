<?php
  include("../modelo/db_conect.php"); 
$link = Conectarse();
$id = $_GET['id'];
$nombre = $_GET['nombre'];
$so= $_GET['so'];
$ip = $_GET['ip'];
$tarjetared = $_GET['tarjetared'];
$procesador = $_GET['procesador'];
$memram = $_GET['memram'];
$dispositivo = $_GET['dispositivo'];
$discoduro = $_GET['discoduro'];
$tiposerver = $_GET['tiposerver'];


$comando=oci_parse($link, "insert into DTI_SERVIDOR values ('$id','$nombre','$so','','$ip','$tarjetared','$procesador','$memram','$dispositivo','$discoduro','$tiposerver')");
//echo $comando;

//$comando=oci_parse($link, "insert into PERSONA (CODIGO, NOMBRE, DIRECCION, TELEFONO) values ('$id','$nombre','$dir','$tel')");
oci_execute($comando);
//echo"OK";

header("Location: ../vista/listadoServidores.php"); 


?>


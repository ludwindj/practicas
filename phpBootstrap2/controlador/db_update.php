<?php
  include("../modelo/db_conect.php"); 
$link = Conectarse();
$nombre = $_GET['nombre'];
$so= $_GET['so'];
$ip = $_GET['ip'];
$tarjetared = $_GET['tarjetared'];
$procesador = $_GET['procesador'];
$memram = $_GET['memram'];
$dispositivo = $_GET['dispositivo'];
$discoduro = $_GET['discoduro'];
$tiposerver = $_GET['tiposerver'];
echo $nombre;

$id = $_GET['id2'];

//$dir = $_GET['DIRECCION'];
//$tel = $_GET['TELEFONO'];

$comando=oci_parse($link, "update DTI_SERVIDOR SET NOMBRE='$nombre',ID_SISTEMA_OPERATIVO='$so',IP='$ip',TARJETA_RED='$tarjetared',PROCESADOR='$procesador',RAM_MB='$memram',ID_DISPOSITIVO='$dispositivo',DISCO_DURO_GB='$discoduro',ID_TIPO_SERVER='$tiposerver' WHERE ID='$id'");
//$comando=oci_parse($link, "insert into PERSONA (CODIGO, NOMBRE, DIRECCION, TELEFONO) values ('$id','$nombre','$dir','$tel')");
oci_execute($comando);
echo"OK";

header("Location: ../vista/listadoServidores.php"); 


?>


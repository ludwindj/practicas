<?php
  include("../modelo/db_conect.php"); 
$link = Conectarse();
$nombre = $_GET['nombre'];

$capacidad= $_GET['capacidadus'];
$noinventario = $_GET['noinventario'];

echo $nombre;

$id = $_GET['id2'];

//$dir = $_GET['DIRECCION'];
//$tel = $_GET['TELEFONO'];

$comando=oci_parse($link, "update DTI_GABINETE SET NOMBRE='$nombre',CAPACIDAD_US='$capacidad',NO_INVENTARIO='$noinventario' WHERE ID='$id'");
//$comando=oci_parse($link, "insert into PERSONA (CODIGO, NOMBRE, DIRECCION, TELEFONO) values ('$id','$nombre','$dir','$tel')");
oci_execute($comando);
echo"OK";

header("Location: ../vista/listadoGabinetes.php"); 


?>


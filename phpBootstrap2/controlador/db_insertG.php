<?php
  include("../modelo/db_conect.php"); 
$link = Conectarse();
$id = $_GET['id'];
$nombre = $_GET['nombre'];
$capacidad= $_GET['capacidadus'];
$noinventario = $_GET['noinventario'];



$comando=oci_parse($link, "insert into DTI_GABINETE values ('$id','$nombre','$capacidad','$noinventario','')");
//echo $comando;

//$comando=oci_parse($link, "insert into PERSONA (CODIGO, NOMBRE, DIRECCION, TELEFONO) values ('$id','$nombre','$dir','$tel')");
oci_execute($comando);
//echo"OK";

header("Location: ../vista/listadoGabinetes.php"); 


?>


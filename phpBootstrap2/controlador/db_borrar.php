<?php 
    include("../modelo/db_conect.php"); 
   $link=Conectarse(); 
   $id=$_GET['ID']; 
   
   
   $comando=oci_parse($link, "delete from DTI_SERVIDOR where ID = $id");
    oci_execute($comando);
    echo"OK";
  
  header("Location: ../vista/listadoServidores.php"); 
?> 
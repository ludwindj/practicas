<?php 
function Conectarse() 
{ 
  
    $link = oci_connect('SCHE$SISAG','SI2014SAG','128.37.86.22:1521/OSNIP');
    //$link = oci_connect('Selvyn','123456','Localhost/XE');
     if(!$link)

     {
          die("No se pudo conectar al servidor ");

     } 
     else{
         
       //  echo '<H3>LISTADO DE SERVIDORES</H3> ';
     }
    
    
   return $link; 
} 

//cierra la conexion 
?>

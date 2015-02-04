<?php
include("../modelo/db_conect.php"); 

include("../vista/excel/excelController.php");
include("../vista/excel/excel-ext.php");
 
class db_select {
    
    public function datosToPdf()
    {
        $link=Conectarse(); 
        
        $result=oci_parse($link, 'SELECT * FROM DTI_SERVIDOR');
        //$result=oci_parse($link, 'SELECT * FROM PERSONA');
        oci_execute($result);
 
        //Array asociativo que contendrá los datos
        $valores = array();
 
        
 
            while($row = oci_fetch_assoc($result))
            {
                //Se crea un arreglo asociativo
                array_push($valores, $row);
            }
        //Regresa array asociativo
        return $valores;
    }
    
    
    public function datosToExcel()
    {
        $link=Conectarse(); 
        
        $result=oci_parse($link, 'SELECT * FROM DTI_SERVIDOR');
        //$result=oci_parse($link, 'SELECT * FROM PERSONA');
        oci_execute($result);
 
        //Array asociativo que contendrá los datos
            while($datatmp = oci_fetch_assoc($result))
            {
                //Se crea un arreglo asociativo
                 $data[] = $datatmp; 
            }
       // Generamos el Excel 

        createExcel("excel-repo.xls", $data); 
    }
}
?>
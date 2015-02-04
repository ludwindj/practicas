<?php

include './exportController.php';

$extencion = $_GET['ext'];
$file = $_GET['file'];
$param = $_GET['param'];
//echo $param."<br/>";

$export = new exportar();

if($param != 0)
        $export->generateReport($param, $file, $extencion);
    else {
        $file = "PPALMA01";
        $export->exportarReporte($file, $extencion);
    }
    
$extencion = null;
$file = null;
$param = null;

?>
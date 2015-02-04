<?php

class exportar {

    function generateReport($vals, $nombre, $extencion) {

        $nombreExp = "Reporte2";
        $my_report = "C:\\wamp\\www\\phpBootstrap2\\vista\\reportes\\formato\\" . $nombre . '.rpt'; // Ubicacion rpt 
        $reporte = 'C:\\wamp\\www\\phpBootstrap2\\vista\\reportes\\generado\\' . $nombreExp . '.' . $extencion; // Ubicacion de Exportacion
      
            //$crapp = new COM("CrystalRuntime.Application.10");
            $crapp = new COM("CrystalRunTime.Application");
            $creport = $crapp->OpenReport($my_report, 1);
//            
//            //$creport->ExportOptions->PDFExportAllPages = true;
//            $creport->EnableParameterPrompting = 0;
//            $creport->ExportOptions->DestinationType = 1;
//            //$creport->DiscardSavedData;
//	    $creport->ReadRecords();
            $creport->ReadRecords();
            
			$field=$creport->ParameterFields(1);
                        echo "<br/> Valor ".$vals;
			$field->SetCurrentValue(7);
			
		
            $creport->EnableParameterPrompting = 0;
               $creport->ExportOptions->DiskFileName = $reporte;
        $creport->ExportOptions->PDFExportAllPages = true;
        $creport->ExportOptions->DestinationType = 1;
        
        
            //$creport->Export(false);
             echo "<br/> Presentar reporte";
            
            

            //4 - RTF
            //31 - PDF
            //30 - xls
            //36 - xls
            //14 - doc
            //
            switch
            ($extencion) {
                case "rtf":
                    $creport->ExportOptions->FormatType = 4; // 
                    break;
                case "doc":
                    $creport->ExportOptions->FormatType = 14; //
                    break;
                case "xls":
                    $creport->ExportOptions->FormatType = 30; //
                    break;
                case "pdf":
                    $creport->ExportOptions->FormatType = 31; //
                    break;
            }
            
            
           
	    
                

            $this->presentarReporte($reporte, $extencion, $nombreExp);

    }

    public function exportarReporte($nombre, $extencion) {
        $nombreExp = "Reporte";
        $my_report = "C:\\wamp\\www\\phpBootstrap2\\vista\\reportes\\formato\\" . $nombre . '.rpt'; // Ubicacion rpt 
        $reporte = 'C:\\wamp\\www\\phpBootstrap2\\vista\\reportes\\generado\\' . $nombreExp . '.' . $extencion; // Ubicacion de Exportacion

        //$application = new COM("CrystalRuntime.Application.10");
        $application = new COM("CrystalRunTime.Application");// Importante la version
        $creport = $application->OpenReport($my_report, 1);       // Abre el reporte

        $creport->ExportOptions->DiskFileName = $reporte;
        $creport->ExportOptions->PDFExportAllPages = true;
        $creport->ExportOptions->DestinationType = 1;

        //4 - RTF
        //31 - PDF
        //30 - xls
        //36 - xls
        //14 - doc
        //
            switch
        ($extencion) {
            case "rtf":
                $creport->ExportOptions->FormatType = 4; // 
                break;
            case "doc":
                $creport->ExportOptions->FormatType = 14; //
                break;
            case "xls":
                $creport->ExportOptions->FormatType = 30; //
                break;
            case "pdf":
                $creport->ExportOptions->FormatType = 31; //
                break;
        }

        $creport->ReadRecords();
        $creport->Export(false);

        // echo "<embed src=\"reportes/generado/Reporte.pdf\" width=\"100%\" height=\"100%\">";

        $this->presentarReporte($reporte, $extencion, $nombreExp);
    }

    function presentarReporte($repor, $ext, $exp) {
        
        $nombre = $exp . '.' . $ext;
        //echo $nombre;
        if ($repor) {

            $data = fopen($repor, "r");

            $size = filesize($repor);
            $file_content = fread($data, $size);

            header('Content-type: application/' . $ext);
            header("Content-length: $size");
            header("Content-Disposition: attachment; filename=$nombre");


            echo $file_content;
        } else {

            echo "<script languaje='javascript'>

                        alert('El archivo no pudo ser generado');

                </script>";
        }
    }

}
?> 


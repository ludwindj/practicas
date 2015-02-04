<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        
        <link href="resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="resources/css/estilo.css" rel="stylesheet">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="resources/css/styles.css" rel="stylesheet">
        <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/scripts.js"></script>
        
    </head>
    <body>
        <div style="margin-top: -45px; margin-bottom: 55px; ">
            <h3 style="alignment-adjust: central">LISTADO DE GABINETES</h3>
          
                        <?php 
                       include("../modelo/db_conect.php"); 
                        $link=Conectarse(); 
                        $result=oci_parse($link, 'SELECT * FROM DTI_GABINETE');
                        //$result=oci_parse($link, 'SELECT * FROM PERSONA');
                        oci_execute($result);
                        ?>
        
        <br>
                            <TABLE  CELLSPACING=1 CELLPADDING=1 class="tabla"> 
                                <tr >
                                    <td>
                                        <A  style="float: left;" HREF="Gabinetes/nuevo.php"><img src="resources/images/add.png" alt="NUEVO" /></A>
                                        <A  style="float: right;" HREF="excelG.php"><img src="resources/images/excel.png" alt="EXCEL" /></A>

                                        <A  style="float: right;"  HREF="pdfG.php"><img src="resources/images/pdf.png" alt="PDF" /></A>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1 class="tabla"> 
                                            <TR><th>&nbsp;<B>CODIGO</B></th> <th>&nbsp;<B>NOMBRE</B>&nbsp;</th><th>&nbsp;<B>CAPACIDAD U's</B>&nbsp;</th><th>&nbsp;<B>No. INVENTARIO</B>&nbsp;</th> <th>&nbsp;<B></B>&nbsp;</th><th>&nbsp;<B></B>&nbsp;</th></TR>

                                            <?php  
                                            while($row = oci_fetch_assoc($result)){
                                            printf("<tr class='modo1'>"
                                            . "<td>"
                                            . "&nbsp;%s"
                                            . "</td>"
                                            . "<td>"
                                            . "&nbsp;%s&nbsp;"
                                            . "</td>"
                                                    . "<td>"
                                            . "&nbsp;%s&nbsp;"
                                            . "</td>"
                                                    . "<td>"
                                            . "&nbsp;%s&nbsp;"
                                            . "</td>"
                                            
                                             . "<td>"
                                            . "<a href=\"Gabinetes/editar.php?ID=%d\"><img src=\"resources/images/edit-16.png\" /></a>"
                                            . "</td>"
                                                    . "<td>"
                                            . "<a href=\"../controlador/db_borrarG.php?ID=%d\"><img src=\"resources/images/borrar-16.png\" /></a>"
                                            . "</td>"
                                            . "</tr>"
                                            , $row["ID"],$row["NOMBRE"],$row["CAPACIDAD_US"],$row["NO_INVENTARIO"],$row["ID"],$row["ID"]); 
                                            } 
                                            oci_close($link); 

                                            ?>

                                        </table>
                                    </td>
                                </tr>


                            </table>
                     </div>                    
        
    </body>
</html>
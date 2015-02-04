<link rel="stylesheet" type="text/css" href="resources/css/estilo.css"/>   

<div class="container">
    <div class="row clearfix">
        <div class="col-md-2 column">
        </div>
        <div class="col-md-8 column">
        </div>
        <div class="col-md-2 column">
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-2 column">
        </div>
        <div class="col-md-10 column">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <DIV>
                        <TABLE  CELLSPACING=1 CELLPADDING=1 class="tabla"> 
                            <tr >
                                <td>

                                    <A  style="float: right;" HREF="vista/excel.php"><img src="resources/images/excel.png" alt="EXCEL" />EXCEL</A>

                                    <A  style="float: right;" TARGET="_new" HREF="vista/pdf.php"><img src="resources/images/pdf.png" alt="PDF" />PDF</A>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1 class="tabla"> 
                                        <TR><th>&nbsp;<B>CODIGO</B></th> <th>&nbsp;<B>NOMBRE</B>&nbsp;</th> <th>&nbsp;<B></B>&nbsp;</th></TR>

                                        <?php
                                        
                                        include("modelo/db_conect.php"); 
                                            $link=Conectarse(); 
                                            $result=oci_parse($link, 'SELECT * FROM DTI_SERVIDOR');
                                            //$result=oci_parse($link, 'SELECT * FROM PERSONA');
                                            oci_execute($result);
                                        
                                        while ($row = oci_fetch_assoc($result)) {
                                            printf("<tr class='modo1'>"
                                                    . "<td>"
                                                    . "&nbsp;%s"
                                                    . "</td>"
                                                    . "<td>"
                                                    . "&nbsp;%s&nbsp;"
                                                    . "</td>"
                                                    . "<td>"
                                                    . "<a href=\"../phpPracticaOr/controlador/db_borrar.php?ID=%d\">Borrar</a>"
                                                    . "</td>"
                                                    . "</tr>"
                                                    , $row["ID"], $row["NOMBRE"], $row["ID"]);
                                        }
                                        oci_close($link);
                                        ?>

                                    </table>
                                </td>
                            </tr>


                        </table>

                    </DIV>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-2 column">
        </div>
        <div class="col-md-8 column">
        </div>
        <div class="col-md-2 column">
        </div>
    </div>
</div>
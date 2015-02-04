<!DOCTYPE html>
<html> 
<head> 
   <link rel="stylesheet" type="text/css" href="../resources//css/estilo.css"/>   
   <link rel="stylesheet" href="../resources/css/bootstrap.min.css" />
   <script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../resources/js/angular-1.3.11.js"></script>
</head>

<body ng-app>
    <?php 
    include("../../modelo/db_conect.php"); 
   $link=Conectarse(); 
   $id=$_GET['ID']; 
   //echo $id;
   // 
   $result=oci_parse($link, "SELECT * FROM DTI_SERVIDOR WHERE ID = $id");
        //$result=oci_parse($link, 'SELECT * FROM PERSONA');
        oci_execute($result);
 
        //Array asociativo que contendrá los datos
       
        $data = oci_fetch_assoc($result);
        
        //echo $data['IP'];
  
?> 
    
    
    <div class="container" >
        <H3>EDITAR</H3> 
        <form class="form-horizontal" role="form" ACTION="../../controlador/db_update.php" method="GET" name="forma">     
        
        <div class="form-group">
        <label for="inputId" class="col-sm-2 control-label">ID</label>
        <div class="col-sm-4">
            <input id="inputId" type="text" class="form-control" placeholder="ID" name="id" value="<?php echo $data['ID'] ?>" ng-disabled="true" required ng-maxlength="2" >
           
        </div>
        <span class="validation-message" ng-show="forma.id.$error.maxlength">Longitud maxima de 2 digitos</span>

    </div>
            
    <div class="form-group" ng-class="{'has-error': forma.nombre.$invalid, 'has-success': forma.nombre.$valid}">
        <label for="inputNombre" class="col-sm-2 control-label">NOMBRE</label>
        <div class="col-sm-4">
        <input id="inputNombre" type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $data['NOMBRE'] ?>" required ng-maxlength="50"/>
        </div>
        <span class="validation-message" ng-show="forma.nombre.$error.maxlength">Longitud maxima de 50 caracteres</span>
    </div>
    
       <div class="form-group">
            <label for="inputDispositivo" class="col-sm-2 control-label">DISPOSITIVO</label>
            <div class="col-sm-4">  
                <select name="dispositivo" class="form-control">
                    <option value="0">Seleccionar</option>
        <?php 
            //include("../../modelo/db_conect.php"); 
            $link=Conectarse();
            $result=oci_parse($link, 'SELECT D.ID, T.DESCRIPCION FROM DTI_DISPOSITIVO D INNER JOIN DTI_TIPO_DISPOSITIVO T ON T.ID = D.ID_TIPO_DISPOSITIVO WHERE D.ID_TIPO_DISPOSITIVO = 1');                      
            oci_execute($result);            
            
            //echo "<select>";
            
            while($row = oci_fetch_assoc($result)){
                if ($row['ID']==$data['ID_DISPOSITIVO'])
                    echo "<option name='dispositivo' value=".$row['ID']." selected>".$row['DESCRIPCION']."</option>\n"; 
                else
                echo "<option name='dispositivo' value=".$row['ID'].">".$row['DESCRIPCION']."</option>\n"; 
            } 
            //echo "</select>"; 
        ?>
                </select>
            </div>
        </div>
           
            <div class="form-group">
            <label for="inputServer" class="col-sm-2 control-label">Tipo Servidor</label>
            <div class="col-sm-4">  
                <select name="tiposerver" class="form-control">
                    <option value="">Seleccionar</option>
        <?php 
            //include("../../modelo/db_conect.php"); 
            $link=Conectarse();
            $result=oci_parse($link, 'SELECT * FROM DTI_TIPO_SERVER');            
            oci_execute($result);            
            
            //echo "<select>";
            
            while($row = oci_fetch_assoc($result)){
                if ($row['ID']==$data['ID_TIPO_SERVER'])
                    echo "<option name='tiposerver' value=".$row['ID']." selected>".$row['DESCRIPCION']."</option>\n"; 
                else
                    echo "<option name='tiposerver' value=".$row['ID'].">".$row['DESCRIPCION']."</option>\n"; 
            } 
            //echo "</select>"; 
        ?>
                </select>
            </div>
        </div>
    <p>        
    <div class="form-group">
            <label for="inputSOe" class="col-sm-2 control-label">SISTEMA OPERATIVO</label>
            <div class="col-sm-4">  
                <select name="so" class="form-control">
                    <option value="">Seleccionar</option>
        <?php 
            //include("../../modelo/db_conect.php"); 
            $conex=Conectarse();
            $res=oci_parse($conex, 'SELECT * FROM DTI_SISTEMA_OPERATIVO');            
            oci_execute($res);            
            
            //echo "<select>";
            
            while($fila = oci_fetch_assoc($res)){
                if ($fila['ID']==$data['ID_SISTEMA_OPERATIVO'])
                    echo "<option name='so' value=".$fila['ID']." selected>".$fila['DESCRIPCION']."</option>\n"; 
                else
                    echo "<option name='so'  value=".$fila['ID'].">".$fila['DESCRIPCION']."</option>\n"; 
            } 
            echo "</select>"; 
        ?>
            </div>
        </div>
        </p>
    
        <div class="form-group" ng-class="{'has-error': forma.ip.$invalid, 'has-success': forma.ip.$valid}">
            <label for="inputIp" class="col-sm-2 control-label">IP</label>
            <div class="col-sm-4">
                <input id="inputIp" type="text" class="form-control" placeholder="IP" name="ip" value="<?php echo $data['IP'] ?>" required ng-maxlength="15"/>
            </div>
            <span class="validation-message" ng-show="forma.ip.$error.maxlength">Longitud maxima de 15 caracteres</span>
        </div>
            
            
        <div class="form-group" ng-class="{'has-error': forma.tarjetared.$invalid, 'has-success': forma.tarjetared.$valid}">
            <label for="inputTarjetaRed" class="col-sm-2 control-label">TARJETA RED</label>
            <div class="col-sm-4">
                <input id="inputTarjetaRed" type="text" class="form-control" placeholder="Tarjeta de Red" name="tarjetared" value="<?php echo $data['TARJETA_RED'] ?>" required ng-maxlength="50"/>
            </div>
            <span class="validation-message" ng-show="forma.tarjetared.$error.maxlength">Longitud maxima de 50 caracteres</span>
        </div>
            
        <div class="form-group" ng-class="{'has-error': forma.procesador.$invalid, 'has-success': forma.procesador.$valid}">
            <label for="inputProc" class="col-sm-2 control-label">PROCESADOR</label>
            <div class="col-sm-4">
                <input id="inputProc" type="text" class="form-control" placeholder="Procesador" name="procesador" value="<?php echo $data['PROCESADOR'] ?>" required ng-maxlength="100"/>
            </div>
            <span class="validation-message" ng-show="forma.procesador.$error.maxlength">Longitud maxima de 100 caracteres</span>
        </div>
            
        <div class="form-group" ng-class="{'has-error': forma.memram.$invalid, 'has-success': forma.memram.$valid}">
            <label for="inputMemRam" class="col-sm-2 control-label">MEMORIA RAM</label>
            <div class="col-sm-4">
                <input id="inputMemRam" type="text" class="form-control" placeholder="Memoria RAM" name="memram" value="<?php echo $data['RAM_MB'] ?>" required ng-maxlength="10"/>
            </div>
            <span class="validation-message" ng-show="forma.memram.$error.maxlength">Longitud maxima de 10 digitos</span>
        </div>
                   
            
        
        
        <div class="form-group" ng-class="{'has-error': forma.discoduro.$invalid, 'has-success': forma.discoduro.$valid}">
            <label for="inputDiscoDuro" class="col-sm-2 control-label">DISCO DURO</label>
            <div class="col-sm-4">
                <input id="inputDiscoDuro" type="text" class="form-control" placeholder="Disco Duro" name="discoduro" value="<?php echo $data['DISCO_DURO_GB'] ?>" required ng-maxlength="10"/>
            </div>
            <span class="validation-message" ng-show="forma.discoduro.$error.maxlength">Longitud maxima de 10 digitos</span>
        </div>
        
        
<!--        <div class="form-group" ng-class="{'has-error': forma.direccion.$invalid, 'has-success': forma.direccion.$valid}">
        <label for="inputDireccion" class="col-sm-1 control-label">DIRECCION</label>
        <div class="col-sm-4">
        <input id="inputDireccion" type="text" class="form-control" placeholder="Direccion" name="direccion" ng-model="usuario.direccion" required ng-maxlength="100"/>
        </div>
        <span class="validation-message" ng-show="forma.direccion.$error.maxlength">Longitud maxima de 100 caracteres</span>
    </div>    
    <div class="form-group" ng-class="{'has-error': forma.telefono.$invalid, 'has-success': forma.telefono.$valid}">
        <label for="inputTelefono" class="col-sm-1 control-label">TELEFONO</label>
        <div class="col-sm-4">
        <input id="inputTelefono" type="text" class="form-control" placeholder="Telefono" name="telefono" ng-maxlength="8"/>
        </div>
        <span class="validation-message" ng-show="forma.telefono.$error.maxlength">Longitud maxima de 8 digitos</span>
    </div>    -->
<!--<TABLE> 
    <TR> 
   <TD>ID:</TD> 
   <TD><INPUT TYPE="text" NAME="ID" SIZE="20" MAXLENGTH="30" ng-model="usuario.id" required></TD> 
</TR> 
<TR> 
   <TD>NOMBRE:</TD> 
   <TD><INPUT TYPE="text" NAME="NOMBRE" SIZE="20" MAXLENGTH="30" ng-model="usuario.nombre" required></TD> 
</TR>
<TR> 
   <TD>DIRECCION:</TD> 
   <TD><INPUT TYPE="text" NAME="DIRECCION" SIZE="20" MAXLENGTH="30" ng-model="usuario.direccion" required></TD> 
</TR>
<TR> 
   <TD>TELEFONO:</TD> 
   <TD><INPUT TYPE="text" NAME="TELEFONO" SIZE="20" MAXLENGTH="30"></TD> -->
<INPUT class="col-lg-offset-2 col-sm-2 btn-success" TYPE="submit" NAME="accion" VALUE="Grabar" ng-disabled="forma.$invalid"> 
 <input id="inputId" type="text" class="form-control" placeholder="ID" name="id2" value="<?php echo $data['ID'] ?>" style="visibility: hidden" required ng-maxlength="2" >
        </FORM> 
</div>
<form>
    
</form>





</body> 
</html>
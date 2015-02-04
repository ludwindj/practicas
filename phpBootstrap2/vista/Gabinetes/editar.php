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
   $result=oci_parse($link, "SELECT * FROM DTI_GABINETE WHERE ID = $id");
        //$result=oci_parse($link, 'SELECT * FROM PERSONA');
        oci_execute($result);
 
        //Array asociativo que contendrá los datos
       
        $data = oci_fetch_assoc($result);
        
        //echo $data['IP'];
  
?> 
    
    
    <div class="container" >
        <H3>EDITAR</H3> 
        <form class="form-horizontal" role="form" ACTION="../../controlador/db_updateG.php" method="GET" name="forma">     
        
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
    
       <div class="form-group" ng-class="{'has-error': forma.capacidadus.$invalid, 'has-success': forma.capacidadus.$valid}">
            <label for="inputCapacidadUs" class="col-sm-2 control-label">CAPACIDAD U's</label>
            <div class="col-sm-4">
                <input id="inputCapacidadUs" type="text" class="form-control" placeholder="Capacidad"  name="capacidadus" value="<?php echo $data['CAPACIDAD_US'] ?>" required ng-maxlength="50"/>
            </div>
            <span class="validation-message" ng-show="forma.capacidadus.$error.maxlength">Longitud maxima de 50 caracteres</span>
        </div>
            <div class="form-group" ng-class="{'has-error': forma.noinventario.$invalid, 'has-success': forma.noinventario.$valid}">
            <label for="inputNoInventario" class="col-sm-2 control-label">No. INVENTARIO</label>
            <div class="col-sm-4">
                <input id="inputNoInventario" type="text" class="form-control" placeholder="No. Inventario" name="noinventario" value="<?php echo $data['NO_INVENTARIO'] ?>" required ng-maxlength="50"/>
            </div>
            <span class="validation-message" ng-show="forma.noinventario.$error.maxlength">Longitud maxima de 50 caracteres</span>
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
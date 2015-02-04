<!DOCTYPE html>
<html> 
<head> 
    <link rel="stylesheet" type="text/css" href="../resources/css/estilo.css"/>   
   <link rel="stylesheet" href="../resources/css/bootstrap.min.css" />
   <script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../resources/js/angular-1.3.11.js"></script>
</head>

<body ng-app>
    
    <div class="container" >
        <H3>INGRESAR</H3> 
        <form class="form-horizontal" role="form" ACTION="../../controlador/db_insertG.php" method="GET" name="forma">     
        
        <div class="form-group" ng-class="{'has-error': forma.id.$invalid, 'has-success': forma.id.$valid}">
        <label for="inputId" class="col-sm-2 control-label">ID</label>
        <div class="col-sm-4">
        <input id="inputId" type="text" class="form-control" placeholder="Id" name="id" ng-model="usuario.id" required ng-maxlength="2">
        </div>
        <span class="validation-message" ng-show="forma.id.$error.maxlength">Longitud maxima de 2 digitos</span>
        </div>
            
        <div class="form-group" ng-class="{'has-error': forma.nombre.$invalid, 'has-success': forma.nombre.$valid}">
            <label for="inputNombre" class="col-sm-2 control-label">NOMBRE</label>
            <div class="col-sm-4">
                <input id="inputNombre" type="text" class="form-control" placeholder="Nombre" name="nombre" ng-model="usuario.nombre" required ng-maxlength="50"/>
            </div>
            <span class="validation-message" ng-show="forma.nombre.$error.maxlength">Longitud maxima de 50 caracteres</span>
        </div>
          
            <div class="form-group" ng-class="{'has-error': forma.capacidadus.$invalid, 'has-success': forma.capacidadus.$valid}">
            <label for="inputCapacidadUs" class="col-sm-2 control-label">CAPACIDAD (U's)</label>
            <div class="col-sm-4">
                <input id="inputCapacidadUs" type="text" class="form-control" placeholder="Capacidad" name="capacidadus" ng-model="usuario.capacidadus" required ng-maxlength="50"/>
            </div>
            <span class="validation-message" ng-show="forma.capacidadus.$error.maxlength">Longitud maxima de 50 caracteres</span>
        </div>
            <div class="form-group" ng-class="{'has-error': forma.noinventario.$invalid, 'has-success': forma.noinventario.$valid}">
            <label for="inputNoInventario" class="col-sm-2 control-label">No. INVENTARIO</label>
            <div class="col-sm-4">
                <input id="inputNoInventario" type="text" class="form-control" placeholder="No. Inventario" name="noinventario" ng-model="usuario.noinventario" required ng-maxlength="50"/>
            </div>
            <span class="validation-message" ng-show="forma.noinventario.$error.maxlength">Longitud maxima de 50 caracteres</span>
        </div>
        
        
<!--        <div class="btn-group"> <a class="btn btn-default dropdown-toggle btn-select2" data-toggle="dropdown" href="#">Select a Region <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">California</a></li>
                <li><a href="#">New York</a></li>
                <li><a href="#">Massachusetts</a></li>
                <li class="divider"></li>
                <li><a href="#">Quebec</a>
                </li><li><a href="#">Ontario</a>
                </li><li><a href="#">British Columbia</a>
                </li>
            </ul>
        </div>-->
            
<!--            <select name=mytextarea>
            <option name=uno value=one> uno </option>
            <option name=dos value=two selected> dos </option>
            <option name=tres value=three> tres </option>
        </select>-->
<!--        
            
        </div>-->
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
<INPUT class="col-lg-offset-3 col-sm-3 btn-success" TYPE="submit" NAME="accion" VALUE="Grabar" ng-disabled="forma.$invalid"> 

        </FORM> 
</div>
<form>
    
</form>





</body> 
</html>
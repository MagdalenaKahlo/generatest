<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Examenes</title>
    <!-- bootstrap -->
    <link href="../../resources/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Fuesntes -->
    <link href="../../resources/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Sweet alerts -->
    <script src="../../resources/js/sweetalert.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="../../resources/css/sweetalert.css">
</head>

<body background="../../resources/img/acozac2.jpg">
<div class="col-md-10">
  <div class="page-header">
    <h1>ALTA <small class="texto-verde">NUEVO ALUMNO</small></h1>
  </div>
  <form class="form-horizontal" action="../../controlador/Tareas/agregaalumno.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-md-2">MATRICULA:</label>
      <div class="col-md-4">
        <input type="number" class="form-control" name="cn_matricula" placeholder="INGRESA MATRICULA" required>
      </div>
      <label class="control-label col-md-2">NOMBRE:</label>
      <div class="col-md-4">
      	<input type="text" class="form-control" name="cn_nombre" placeholder="INGRESA NOMBRE" onkeyup="this.value=this.value.toUpperCase()" pattern="[a-z]+{30}" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-2  ">APELLIDO PATERNO:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="cn_apePaterno" placeholder="INGRESA APELLIDO PATERNO" onkeyup="this.value=this.value.toUpperCase()" pattern="[a-z]+{30}" required>
      </div>
      <label class="control-label col-md-2  ">APELLIDO MATERNO:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="cn_apeMaterno" placeholder="INGRESA APELLIDO MATERNO" onkeyup="this.value=this.value.toUpperCase()" pattern="[a-z]+{30}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-2  ">DIRECCIÓN:</label>
      <div class="col-md-10">
        <textarea rows="3" class="form-control" name="cn_direccion" placeholder="DIRECCIÓN" onkeyup="this.value=this.value.toUpperCase()" required></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-2  ">TELÉFONO CASA:</label>
      <div class="col-md-4">
        <input type="tel" class="form-control" name="cn_telefono" pattern="[0-9]{8,14}" title="revisa tu numero y si tienes lada ingresala" placeholder="TELÉFONO DE CASA" required>
      </div>
      <label class="control-label col-md-2  ">TELÉFONO CELULAR:</label>
      <div class="col-md-4">
        <input type="tel" class="form-control" name="cn_telefono2"  pattern="[0-9]{11,11}" title="11 digitos" placeholder="TELÉFONO DE CELULAR" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-2  ">CORREO:</label>
      <div class="col-md-4  ">
        <input name="cn_correo" type="text" required="required" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="ejemplo mail@example.com" class="form-control" placeholder="CORREO ELECTRÓNICO" required/>
      </div>
      <label class="control-label col-md-2  ">GRUPO:</label>
      <div class="col-md-4">
        <select name="cn_grupo" required class="form-control">
          <option value="">SELECCIONA EL GRUPO</option>
          <?php include("../../entidades/Bases de datos/Consulta_Grupos.php");?>
        </select>
      </div>
    </div>
    <div class="form-group">
        <div class="col-md-3" align="center">
            
        </div>
        <div class="col-md-3" align="center">
            <input type="submit" class="btn btn-success btn-block" name="AGREGAR" value="AGREGAR" >
        </div>						
        <div class="col-md-3" align="center">
            <input type="reset" class="btn btn-default btn-block" name="LIMPIAR" value="LIMPIAR" >
        </div>
		<div class="col-md-3" align="center">
           
        </div>
	</div>
  </form>
</div>
</body>
</html>
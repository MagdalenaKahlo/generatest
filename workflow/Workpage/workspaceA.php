<?php session_start();?>
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
<p align="center"><a href="../../controlador/Alumno/Cerrar.php"><label class="btn btn-danger btn-lg">Cerrar</label></a></p>
<?php 
if(isset($_SESSION["matricula"]) and isset($_SESSION['tipo_usuario'])){
	if($_SESSION['tipo_usuario']==3){
?>
<br/><br/><br/><br/>
<table width="400" border="0" align="center">
  <tbody>
    <tr>
      <td align="center" colspan="4"><font face="Impact" color="#323232" size="6">Bienvenido Administrador</font><br/><br/></td>
    </tr>
    <tr>
      <td colspan="4"><a href="../../dependencias/Profesor/AltaProfesor.php" class="btn btn-danger btn-block">Registrar Profesor</a><br/></td>
    </tr>
    <tr>
      <td colspan="4"><a href="../../controlador/Tareas/operacionmaterias.php" class="btn btn-default btn-block">Registrar Materia</a><br/></td>
    </tr>
    <tr>
      <td colspan="4"><a href="../../controlador/Tareas/operaciongrupos.php" class="btn btn-info btn-block">Registrar Grupo</a><br/></td>
    </tr>
    <tr>
      <td colspan="4"><a href="../../controlador/Tareas/operacionasignacion.php" class="btn btn-primary btn-block">Asignar Grupo - Materia - Profesor</a><br/></td>
    </tr>    
  </tbody>
</table>
<?php
	}else{
		$_SESSION = array();
		// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
		// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
		if (ini_get("session.use_cookies")) {
    		$params = session_get_cookie_params();
    		setcookie(session_name(), '', time() - 42000,
        	$params["path"], $params["domain"],
        	$params["secure"], $params["httponly"]
    		);
		}
		// Finalmente, destruir la sesión.
		session_destroy();
		header("location:../../index.php");
	}
}else{
	$_SESSION = array();
	// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
	// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
	if (ini_get("session.use_cookies")) {
    	$params = session_get_cookie_params();
    	setcookie(session_name(), '', time() - 42000,
       	$params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    	);
	}
	// Finalmente, destruir la sesión.
	session_destroy();
	header("location:../../index.php");
}
?>
</body>
</html>
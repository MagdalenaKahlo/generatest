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
<?php 
if(isset($_SESSION['calificacion']) and isset($_SESSION['historial'])){
	if($_SESSION['calificacion']!="" and $_SESSION['historial']!=""){
		if($_SESSION['calificacion']>=7){
?>
			<p align="center"><a href="../../controlador/Alumno/Cerrar.php"><label class="btn btn-danger btn-lg">Cerrar</label></a>							</p>
<br />
			<table width="300" border="0" align="center">
				<tr>
      				<td align="center"><font face="Impact" color="#323232" size="5">Felicidades aprobaste&nbsp;<?php echo $_SESSION['calificacion']?></font></td>
    			</tr>
    			<tr>
      				<td align="center"><img src="../../resources/img/battux.png" width="256" height="256" alt=""/></td>
    			</tr>
			</table>
<?php 
		}else{
?>
			<p align="center"><a href="../../controlador/Alumno/Cerrar.php"><label class="btn btn-danger btn-lg">Cerrar</label></a></p>
			<br />
			<table width="320" border="0" align="center">
				<tr>
      				<td align="center"><font face="Impact" color="#323232" size="5">Lo sentimos no aprobaste&nbsp;<?php echo $_SESSION['calificacion']?></font></td>
    			</tr>
    			<tr>
      				<td align="center"><img src="../../resources/img/tuxtriste.png" width="320" height="257" alt=""/></td>
    			</tr>
			</table>
<?php 
		}
	echo $_SESSION['historial'];
	}
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
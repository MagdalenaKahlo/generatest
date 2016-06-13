<?php 
session_start();
require_once("../../entidades/Bases de datos/conexion.php");
$usu =htmlentities($_POST['usu']);
$pass=htmlentities($_POST['pass']);
$usu=addslashes($_POST['usu']);
$pass=addslashes($_POST['pass']);
if ($usu == null || $pass == null){
	echo '<script> sweetAlert("Oops...", "Ingrese Usuario y Contraseña", "error"); </script>';
}else{
	$usu=md5($usu);
	$pass=md5($pass); 
	$sql="SELECT matricula, tipo_usuario FROM generatest.usuarios WHERE ( md5(nom_usuario)=_utf8'$usu' COLLATE utf8_bin) and (md5(password) =_utf8'$pass' COLLATE utf8_bin)";
    $result =$con-> query($sql)or die("Error" .mysqli_error($con));
	$usuario = mysqli_fetch_array($result);
	mysqli_close($con);
    if (mysqli_num_rows($result) > 0){
		$_SESSION["matricula"] = $usuario['matricula'];;
        $_SESSION['tipo_usuario']=$usuario['tipo_usuario'];
        echo '<div class="alert alert-success">CARGANDO... <i class="fa fa-spinner fa-spin "></i></div>';
        echo '<script>setTimeout(function(){ location.href = "controlador/Usuarios/acceso.php";},1000);</script>';
    }else{
        echo '<div class="alert alert-danger"><i class="fa fa-warning"></i>...Usuario o clave incorrecta</div>';
    }
}
?>
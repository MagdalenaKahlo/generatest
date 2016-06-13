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
//ini_set('display_errors',0);
include("../../entidades/Bases de datos/conexion.php");
	if(isset($_POST['AGREGAR'])){
		
	$cn_matricula=htmlentities($_POST['cn_matricula']);
	$cn_matricula=addslashes($cn_matricula);
		
	$cn_nombre=htmlentities($_POST['cn_nombre']);
	$cn_nombre=addslashes($cn_nombre);
	
	$cn_apePaterno=htmlentities($_POST['cn_apePaterno']);
	$cn_apePaterno=addslashes($cn_apePaterno);
	
	$cn_apeMaterno=htmlentities($_POST['cn_apeMaterno']);
	$cn_apeMaterno=addslashes($cn_apeMaterno);
	
	$cn_direccion=htmlentities($_POST['cn_direccion']);
	$cn_direccion=addslashes($cn_direccion);
	
	$cn_telefono=htmlentities($_POST['cn_telefono']);
	$cn_telefono=addslashes($cn_telefono);
	
	$cn_telefono2=htmlentities($_POST['cn_telefono2']);
	$cn_telefono2=addslashes($cn_telefono2);
	
	$cn_correo=htmlentities($_POST['cn_correo']);
	$cn_correo=addslashes($cn_correo);
	
	$cn_nombreU=htmlentities($_POST['cn_nombreU']);
	$cn_nombreU=addslashes($cn_nombreU);
	
	$query="SELECT matricula FROM generatest.usuarios where matricula='$cn_matricula'";
	$result = $con-> query($query);
	if(mysqli_num_rows($result)>0){
		mysqli_close($con);
		echo("<script>
			swal({  title: 'ERROR',   text:'TU USUARIO YA EXISTE, NO SE AGREGO CORRECTAMENTE' ,   type: 'warning',   showCancelButton: false,   confirmButtonColor:'#8CD4F5',   confirmButtonText:'Ok',   closeOnConfirm: false,   closeOnCancel: false }, function(){document.location.href='../../workflow/Workpage/workspaceA.php';});</script>");
	}else{
		$query="INSERT INTO alumnos(matricula, ape_paterno, ape_materno, nombre, direccion, tel_casa, celular, email, id_grupo) VALUES ('$cn_matricula', '$cn_apePaterno', '$cn_apeMaterno', '$cn_nombre', '$cn_direccion', '$cn_telefono', '$cn_telefono2', 'cn_correo', '0000')";
		$result = $con-> query($query);
	echo $query;
		$query="INSERT INTO usuarios(matricula, nom_usuario, password, tipo_usuario) VALUES ('$cn_matricula', '$cn_nombreU', '$cn_matricula', '1')";
		$result = $con-> query($query);
		if($result){
			mysqli_close($con);
		echo("<script>
			swal({  title: 'Aceptada',   text:'TU USUARIO HA SIDO AGREGADO CORRECTAMENTE' ,   type: 'success',   showCancelButton: false,   confirmButtonColor:'#8CD4F5',   confirmButtonText:'Ok',   closeOnConfirm: false,   closeOnCancel: false }, function(){document.location.href='../../workflow/Workpage/workspaceA.php';});</script>");
		}		
	}
}
	
?>
</body>
</html>

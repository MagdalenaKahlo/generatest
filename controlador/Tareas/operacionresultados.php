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
<br/><br/><br/>
<table width="400" border="0" align="center">
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="3">Selecciona el grupo y la materia</font><br/></td>
    </tr>
    <tr>
      <td align="center">
          <?php include("../../entidades/Bases de datos/Consulta_Grupos_Profesor.php");?>
      </td>
    </tr>
    </tr>
</table>
<?php
if(isset($_REQUEST['cn_grupo'])){
	if(isset($_SESSION["matricula"]) and isset($_SESSION['tipo_usuario'])){
		if($_SESSION['tipo_usuario']==1){
		?>
<p>&nbsp;</p>
<table width="600" border="1" align="center" bordercolor="#1DA8D3">
  <tbody>
    <tr>
      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Matricula</font></td>
      <td width="500" align="center"><font face="Impact" color="#323232" size="3">Nombre</font></td>
      <td width="100" align="center"><font face="Impact" color="#323232" size="3">Calificacion</font></td>
    </tr>
    <?php
	require("../../entidades/Bases de datos/conexion.php");
	
	$query="SELECT alumnos.matricula, nombre,ape_paterno,ape_materno, calificacion,asignacion.id_materia FROM generatest.alumnos, generatest.resultados, generatest.asignacion where alumnos.matricula=resultados.matricula and alumnos.id_grupo='".$_REQUEST['cn_grupo']."' and asignacion.id_profesor='".$_SESSION["matricula"]."' AND asignacion.id_materia='".$_REQUEST['cn_materia']."'";
	$result = $con-> query($query);
	if(mysqli_num_rows($result)>0)
		while($alumnos=mysqli_fetch_array($result)){
	?>
    		<tr>
      			<td align="center"><font face="Impact" color="#323232" size="3"><?php echo utf8_encode($alumnos[0]);?></font></td>
                <td align="center"><font face="Impact" color="#323232" size="3"><?php echo utf8_encode($alumnos[1]." ".$alumnos[2]." ".$alumnos[3]);?></font></td>
                <td align="center"><font face="Impact" color="#323232" size="3"><?php echo utf8_encode($alumnos[4]);?></font></td>
    		</tr>
  <?php
		}
	mysqli_close($con);
		}
	}
	else{
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
}
	?>  
  </tbody>
</table>
<br>
<p align="center"><a href="../../workflow/Workpage/workspaceP.php" class="btn btn-danger btn-lg">Regresar</a></p>
</body>
</html>

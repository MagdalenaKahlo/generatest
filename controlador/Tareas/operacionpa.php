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
<form method="post" name="selmateria">
<table width="400" border="0" align="center">
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="3">Nombre Materia</font><br/></td>
    </tr>
    <tr>
      <td align="center"><select name="cn_materia" required class="form-control">
          <option value="">SELECCIONA LA MATERIA</option>
          <?php include("../../entidades/Bases de datos/Consulta_Materias_Profesor.php");?>
        </select><br/>
      </td>
    </tr>
    <tr>
      <td align="center"><input type="submit" class="btn btn-success btn-block" name="SELMATERIA" value="SELECCIONAR MATERIA" ></td>
    </tr>
</table>
</form>
<?php
ini_set('display_errors',0);
if(isset($_REQUEST['cn_materia'])){
if(isset($_SESSION["matricula"]) and isset($_SESSION['tipo_usuario'])){
	if($_SESSION['tipo_usuario']==1){
		if(isset($_REQUEST['ELIMINAR'])){
			require("../../entidades/Bases de datos/conexion.php");
			$query="DELETE FROM preguntasc WHERE id_preguntac='".$_GET['cn_pre']."'";
			$result = $con-> query($query);
			mysqli_close($con);
			header("location:operacionpa.php?cn_materia=".$_REQUEST['cn_materia']);
		}
		if(isset($_POST['AGREGARPRE'])){
			require("../../entidades/Bases de datos/conexion.php");
			$query="INSERT INTO preguntasc(id_materia, preguntac, respuesta,id_profesor) VALUES ('".htmlentities($_REQUEST['cn_materia'])."', '".htmlentities($_REQUEST['cn_pregunta'])."', '".htmlentities($_REQUEST['cn_resp'])."', '".htmlentities($_SESSION["matricula"])."')";
			$result = $con-> query($query);
			mysqli_close($con);
			header("location:operacionpa.php?cn_materia=".$_REQUEST['cn_materia']);		
		}else{?>

<br/><br/><br/><br/>
<form method="post" name="agregap">
<table width="1000" border="0" align="center">
  <tbody>
    <tr>
      <td colspan="6" align="center"><font face="Impact" color="#323232" size="6">Registrar Pregunta Abierta</font><br/><br/></td>
    </tr>
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="3">Pregunta</font><br/></td>
      <td align="center" width="100"><font face="Impact" color="#323232" size="3">Respuesta</font><br/></td>
    </tr>
    <tr>
      <td align="center"><input type="text" class="form-control" name="cn_pregunta" placeholder="INGRESA PREGUNTA" required></td>
      <td align="center" width="350"><input type="text" class="form-control" name="cn_resp" min="0" max="1" required></td>
    </tr>
    <tr>
      <input type="hidden" name="cn_materia" value="<?php echo $_REQUEST['cn_materia'];?>" />
      <td align="center" colspan="6"><input type="submit" class="btn btn-warning btn-block" name="AGREGARPRE" value="AGREGAR PREGUNTA" ></td>
    </tr>
  </tbody>
</table>
</form>
<p>&nbsp;</p>
<table width="600" border="1" align="center" bordercolor="#1DA8D3">
  <tbody>
    <tr>
      <td width="390" align="center"><font face="Impact" color="#323232" size="3">Materia</font></td>
      <td width="98" align="center"><font face="Impact" color="#323232" size="3">Eliminar</font></td>
    </tr>
    <?php
	require("../../entidades/Bases de datos/conexion.php");
	$query="SELECT * FROM preguntasc where id_materia=".$_REQUEST['cn_materia']." and id_profesor='".$_SESSION["matricula"]."'";
	$result = $con-> query($query);
	if(mysqli_num_rows($result)>0)
		while($materia=mysqli_fetch_array($result)){
	?>
    		<tr>
      			<td><font face="Impact" color="#323232" size="3"><?php echo utf8_encode($materia[1]." - ".$materia[2]);?></font></td>
      			<td align="center"><a href="?ELIMINAR=1&<?php echo utf8_encode("cn_pre=".$materia[0]."&cn_materia=".$materia[1]);?>" class="btn btn-danger btn-block">Eliminar</a></td>
    		</tr>
  <?php
		}
	mysqli_close($con);
}
	?>  
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
}
?>
<br>
<p align="center"><a href="../../workflow/Workpage/workspaceP.php" class="btn btn-danger btn-lg">Regresar</a></p>
</body>
</html>

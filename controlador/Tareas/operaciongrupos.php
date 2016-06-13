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
//ini_set('display_errors',0);
if(isset($_SESSION["matricula"]) and isset($_SESSION['tipo_usuario'])){
	if($_SESSION['tipo_usuario']==3){
		if(isset($_REQUEST['ELIMINAR'])){
			require_once("../../entidades/Bases de datos/conexion.php");
			$query="DELETE FROM grupos WHERE id_grupo='".$_GET['cn_grupo']."'";
			$result = $con-> query($query);
			mysqli_close($con);
			header("location:operaciongrupos.php");
		}
		if(isset($_POST['AGREGARGRUPO'])){
			require_once("../../entidades/Bases de datos/conexion.php");
			$query="SELECT * FROM grupos where grupo like'%".$_POST['cn_grupo']."%'";
			$result = $con-> query($query);
			if(mysqli_num_rows($result)>0){
				mysqli_close($con);
				header("location:operaciongrupos.php");
			}else{
				$query="INSERT INTO grupos(grupo) VALUES ('".$_POST['cn_grupo']."')";
				$result = $con-> query($query);
				mysqli_close($con);
				header("location:operaciongrupos.php");
			}
		}	
		if(isset($_REQUEST['MODIFICAR'])){
			if($_REQUEST['MODIFICAR']==1){
?>
<br/><br/><br/><br/>
<form method="post" name="modificag">
<table width="400" border="0" align="center">
  <tbody>
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="6">Registrar Grupo</font><br/><br/></td>
    </tr>
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="3">Clave del Grupo</font><br/></td>
    </tr>
    <tr>
      <td align="center"><input type="text" class="form-control" name="cn_grupo" value="<?php echo $_REQUEST['cn_grupo']?>"  required></td>
    </tr>
    <tr>
    	<input type="hidden" name="cn_idgrupo" value="<?php echo $_REQUEST['cn_idgrupo']?>"/>
    	<input type="hidden" name="MODIFICAR" value="2"/>
      <td align="center"><input type="submit" class="btn btn-success btn-block" name="MODIFICARGRUPO" value="MODIFICAR GRUPO" ></td>
    </tr>
  </tbody>
</table>
</form>
<?php }else{
		require_once("../../entidades/Bases de datos/conexion.php");
		$query="SELECT * FROM grupos where grupo like'%".$_POST['cn_grupo']."%'";
		$result = $con-> query($query);
		if(mysqli_num_rows($result)>0){
				mysqli_close($con);
				header("location:operaciongrupos.php");
		}else{
			$query="UPDATE grupos SET grupo='".$_POST['cn_grupo']."' WHERE id_grupo='".$_POST['cn_idgrupo']."'";
			$result = $con-> query($query);
			mysqli_close($con);
			header("location:operaciongrupos.php");
			}
		}
	}else{?>

<br/><br/><br/><br/>
<form method="post" name="agregam">
<table width="400" border="0" align="center">
  <tbody>
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="6">Registrar Grupo</font><br/><br/></td>
    </tr>
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="3">Clave del Grupo</font><br/></td>
    </tr>
    <tr>
      <td align="center"><input type="text" class="form-control" name="cn_grupo" placeholder="INGRESA LA CLAVE" onkeyup="this.value=this.value.toUpperCase()" pattern="[0-9]+{5}" required></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" class="btn btn-success btn-block" name="AGREGARGRUPO" value="AGREGAR GRUPO" ></td>
    </tr>
  </tbody>
</table>
</form>
<p>&nbsp;</p>
<table width="600" border="1" align="center" bordercolor="#1DA8D3">
  <tbody>
    <tr>
      <td width="390" align="center"><font face="Impact" color="#323232" size="3">Grupo</font></td>
      <td width="98" align="center"><font face="Impact" color="#323232" size="3">Modificar</font></td>
      <td width="98" align="center"><font face="Impact" color="#323232" size="3">Eliminar</font></td>
    </tr>
    <?php
	$query="SELECT * FROM grupos";
	require_once("../../entidades/Bases de datos/conexion.php");
	$result = $con-> query($query);
	if(mysqli_num_rows($result)>0)
		while($grupo=mysqli_fetch_array($result)){
	?>
    		<tr>
      			<td align="center"><font face="Impact" color="#323232" size="3"><?php echo utf8_encode($grupo[1]);?></font></td>
      			<td align="center"><a href="?MODIFICAR=1&<?php echo utf8_encode("cn_idgrupo=".$grupo[0]."&cn_grupo=".$grupo[1]);?>" class="btn btn-warning btn-block">Modificar</a></td>
      			<td align="center"><a href="?ELIMINAR=1&<?php echo utf8_encode("cn_grupo=".$grupo[0]);?>" class="btn btn-danger btn-block">Eliminar</a></td>
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
?>
<br>
<p align="center"><a href="../../workflow/Workpage/workspaceA.php" class="btn btn-danger btn-lg">Regresar</a></p>
</body>
</html>

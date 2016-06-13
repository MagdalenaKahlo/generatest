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
			$query="DELETE FROM asignacion WHERE id_asignacion='".$_GET['cn_asignacion']."'";
			$result = $con-> query($query);
			mysqli_close($con);
			header("location:operacionasignacion.php");
		}
		if(isset($_POST['AGREGARASIGNACION'])){
			require_once("../../entidades/Bases de datos/conexion.php");
			$query="SELECT * FROM asignacion where (id_grupo = '".$_POST['cn_grupo']."' and id_materia= '".$_POST['cn_materia']."')";
			$result = $con-> query($query);
			if(mysqli_num_rows($result)>0){
				mysqli_close($con);
				header("location:operacionasignacion.php");
			}else{
				$query="INSERT INTO `generatest`.`asignacion` (`id_grupo`, `id_materia`, `id_profesor`) VALUES ('".$_POST['cn_grupo']."', '".$_POST['cn_materia']."', '".$_POST['cn_profesor']."')";
				$result = $con-> query($query);
				mysqli_close($con);
				header("location:operacionasignacion.php");
			}
		}	
		if(isset($_REQUEST['MODIFICAR'])){
			if($_REQUEST['MODIFICAR']==1){
?>
<br/><br/><br/><br/>
<form method="post" name="modificaa">
<table width="500" border="0" align="center">
  <tbody>
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="6">Asignar grupo - materia - profesor</font><br/><br/></td>
    </tr>
    <tr>
      <td align="center"><font color="#323232" size="3" face="Impact">Grupo</font><br/></td>
    </tr>
    <tr>
      <td align="center">
      	<select name="cn_grupo" required class="form-control">
          <option value="">SELECCIONA El GRUPO</option>
          <?php include("../../entidades/Bases de datos/Consulta_Grupos.php");?>
        </select><br/>
      </td>
    </tr>
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="3">Materia</font><br/></td>
    </tr>
    <tr>
      <td align="center">
      	<select name="cn_materia" required class="form-control">
          <option value="">SELECCIONA LA MATERIA</option>
          <?php include("../../entidades/Bases de datos/Consulta_Materias.php");?>
        </select><br/>
      </td>
    </tr>
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="3">Profesor</font><br/></td>
    </tr>
    <tr>
      <td align="center">
      	<select name="cn_profesor" required class="form-control">
          <option value="">SELECCIONA AL PROFESOR</option>
          <?php include("../../entidades/Bases de datos/Consulta_Profesores.php");?>
        </select><br/>
      </td>
    </tr>
    <tr>
      <td align="center">
      	<input type="hidden" name="cn_asignacion" value="<?php echo $_GET['cn_asignacion'];?>"/>
      	<input type="hidden" name="MODIFICAR" value="2"/>
      	<input type="submit" class="btn btn-success btn-block" name="MODIFICASIGNACION" value="MODIFICAR ASIGNACION" >
      </td>
    </tr>
  </tbody>
</table>
</form>
<?php }else{
		require_once("../../entidades/Bases de datos/conexion.php");
		$query="SELECT * FROM asignacion where (id_grupo = '".$_POST['cn_grupo']."' and id_materia= '".$_POST['cn_materia']."') or id_profesor= '".$_POST['cn_profesor']."'";
			$result = $con-> query($query);
			if(mysqli_num_rows($result)>0){
				mysqli_close($con);
				header("location:operacionasignacion.php");
			}else{
				$query="UPDATE `generatest`.`asignacion` SET `id_grupo`='".$_POST['cn_grupo']."', `id_materia`='".$_POST['cn_materia']."', `id_profesor`='".$_POST['cn_profesor']."' WHERE `id_asignacion`='".$_POST['cn_asignacion']."';";
				$result = $con-> query($query);
				mysqli_close($con);
				header("location:operacionasignacion.php");
			}
		}
	}else{?>

<br/><br/><br/><br/>
<form method="post" name="agregaa">
<table width="500" border="0" align="center">
  <tbody>
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="6">Asignar grupo - materia - profesor</font><br/><br/></td>
    </tr>
    <tr>
      <td align="center"><font color="#323232" size="3" face="Impact">Grupo</font><br/></td>
    </tr>
    <tr>
      <td align="center">
      	<select name="cn_grupo" required class="form-control">
          <option value="">SELECCIONA El GRUPO</option>
          <?php include("../../entidades/Bases de datos/Consulta_Grupos.php");?>
        </select><br/>
      </td>
    </tr>
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="3">Materia</font><br/></td>
    </tr>
    <tr>
      <td align="center">
      	<select name="cn_materia" required class="form-control">
          <option value="">SELECCIONA LA MATERIA</option>
          <?php include("../../entidades/Bases de datos/Consulta_Materias.php");?>
        </select><br/>
      </td>
    </tr>
    <tr>
      <td align="center"><font face="Impact" color="#323232" size="3">Profesor</font><br/></td>
    </tr>
    <tr>
      <td align="center">
      	<select name="cn_profesor" required class="form-control">
          <option value="">SELECCIONA AL PROFESOR</option>
          <?php include("../../entidades/Bases de datos/Consulta_Profesores.php");?>
        </select><br/>
      </td>
    </tr>
    <tr>
      <td align="center"><input type="submit" class="btn btn-success btn-block" name="AGREGARASIGNACION" value="AGREGAR ASIGNACION" ></td>
    </tr>
  </tbody>
</table>
</form>
<p>&nbsp;</p>
<table width="900" border="1" align="center" bordercolor="#1DA8D3">
  <tbody>
    <tr>
      <td width="690" align="center"><font face="Impact" color="#323232" size="3">Asignacion</font></td>
      <td width="98" align="center"><font face="Impact" color="#323232" size="3">Modificar</font></td>
      <td width="98" align="center"><font face="Impact" color="#323232" size="3">Eliminar</font></td>
    </tr>
    <?php
	require("../../entidades/Bases de datos/conexion.php");
	$query="SELECT id_asignacion, grupos.grupo, materias.nom_materia, alumnos.nombre, alumnos.ape_paterno, alumnos.ape_materno FROM  asignacion,grupos,alumnos,materias where asignacion.id_grupo=grupos.id_grupo and asignacion.id_materia=materias.id_materia and asignacion.id_profesor=alumnos.matricula order by id_asignacion asc";
	$result = $con-> query($query);
	if(mysqli_num_rows($result)>0)
		while($asignacion=mysqli_fetch_array($result)){
	?>
    		<tr>
      			<td><font face="Impact" color="#323232" size="3"><?php echo utf8_encode($asignacion[1]." - ".$asignacion[2]." - ".$asignacion[3]." ".$asignacion[4]." ".$asignacion[5]);?></font></td>
      			<td align="center"><a href="?MODIFICAR=1&<?php echo utf8_encode("cn_asignacion=".$asignacion[0]);?>" class="btn btn-warning btn-block">Modificar</a></td>
      			<td align="center"><a href="?ELIMINAR=1&<?php echo utf8_encode("cn_asignacion=".$asignacion[0]);?>" class="btn btn-danger btn-block">Eliminar</a></td>
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

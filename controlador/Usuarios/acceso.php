<?php 
session_start();
    switch ((int)$_SESSION['tipo_usuario']):
		case 1:  
				header('location:../../workflow/workpage/workspaceP.php');	break;
		case 2:  
				 $_SESSION['acceso']=1;
				 require_once("../../entidades/Bases de datos/conexion.php");
				 $sql="SELECT alumnos.id_grupo FROM alumnos, grupos where alumnos.id_grupo=grupos.id_grupo and alumnos.matricula='".$_SESSION["matricula"]."'";
    			 $result =$con-> query($sql)or die("Error" .mysqli_error($con));
				 $grupo = mysqli_fetch_array($result);
				 $_SESSION['grupo']=$grupo['id_grupo'];
				 header('location:../../workflow/workpage/workspace.php');
				 break;
		case 3: header('location:../../workflow/workpage/workspaceA.php');	break;
		default: header('location:../../index.php');
	endswitch;
?>
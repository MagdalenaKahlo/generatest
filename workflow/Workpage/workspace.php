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
</br></br></br></br></br></br>
<?php
	require_once("../../entidades/Bases de datos/conexion.php");
	$query="SELECT id_asignacion, grupos.id_grupo, materias.nom_materia, asignacion.id_materia, asignacion.id_profesor FROM  asignacion,grupos,alumnos,materias where asignacion.id_grupo=grupos.id_grupo and asignacion.id_materia=materias.id_materia and alumnos.matricula='".$_SESSION["matricula"]."' and asignacion.id_grupo='".$_SESSION["grupo"]."' order by id_asignacion asc";
	$result = $con-> query($query);
	mysqli_close($con); 
	while ($coor = mysqli_fetch_row($result)) {
		echo'<table width="600" border="1" align="center" bordercolor="#1DA8D3">';
		echo'<tr>';
      	echo"<td align='center'><a href='workspaceC.php?cn_asignacion=$coor[0]&cn_grupo=$coor[1]&cn_materia=$coor[3]&cn_profesor=$coor[4]' class='btn btn-warning btn-block'>".utf8_encode($coor['1']." - ".$coor['2'])."</a></td>";      			
    	echo'</tr>';
		echo'</table>';
	}
?>
</br>
</body>
</html>
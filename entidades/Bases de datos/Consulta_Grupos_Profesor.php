<?php 
	include("conexion.php");
	$query="SELECT id_asignacion, grupos.id_grupo, materias.nom_materia, alumnos.nombre, alumnos.ape_paterno, alumnos.ape_materno, asignacion.id_materia FROM  asignacion,grupos,alumnos,materias where asignacion.id_grupo=grupos.id_grupo and asignacion.id_materia=materias.id_materia and asignacion.id_profesor=alumnos.matricula and alumnos.matricula='".$_SESSION["matricula"]."' order by id_asignacion asc";
	$result = $con-> query($query);
	mysqli_close($con); 
	while ($coor = mysqli_fetch_row($result)) {
		echo'<table width="600" border="1" align="center" bordercolor="#1DA8D3">';
		echo'<tr>';
      	echo"<td align='center'><a href='?cn_asignacion=$coor[0]&cn_grupo=$coor[1]&cn_materia=$coor[6]' class='btn btn-warning btn-block'>".utf8_encode($coor['1']." - ".$coor['2'])."</a></td>";      			
    	echo'</tr>';
		echo'</table>';
	}
?>
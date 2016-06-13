<?php
	include("conexion.php");
	$consulta = "SELECT * FROM alumnos where id_grupo='0000'";
	$result = $con-> query($consulta);
	mysqli_close($con);
	while ($coor = mysqli_fetch_row($result)) {
		echo "<option value='".$coor[0]."'>".utf8_encode($coor['3'])." ".utf8_encode($coor['1'])." ".utf8_encode($coor['2'])."</option>";
	}
?>
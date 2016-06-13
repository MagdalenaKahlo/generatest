<?php
	include("conexion.php");
	$consulta = "SELECT * FROM materias";
	$result = $con-> query($consulta);
	mysqli_close($con);
	while ($coor = mysqli_fetch_row($result)) {
		echo "<option value='".$coor[0]."'>".utf8_encode($coor['1'])."</option>";
	}
			?>
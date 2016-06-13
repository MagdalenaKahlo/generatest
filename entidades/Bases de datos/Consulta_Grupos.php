<?php 
include("conexion.php");

	    		$consulta = "SELECT id_grupo,grupo FROM generatest.grupos ORDER BY id_grupo ASC";
				$result = $con-> query($consulta);
				mysqli_close($con); 
				while ($coor = mysqli_fetch_row($result)) {
					echo "<option value='".$coor[0]."'>".utf8_encode($coor['1'])."</option>";
				}
			?>
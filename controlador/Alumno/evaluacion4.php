<?php session_start();
$misRespuestas[]=NULL;
$_SESSION['historial']=$_SESSION['historial'].'<table width="600" border="0" align="center" style="background:rgba(217,83,79,0.70)">
  <tbody>
    <tr>
      <td colspan="3" align="center"><p><font face="Impact" color="#323232" size="3">Aciertos en preguntas abiertas</font></p></td>
    </tr>
    <tr>
      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Pregunta</font></td>
      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Respuesta</font></td>
      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Tu Respuesta</font></td>
    </tr>';
$correctas=0;
for($i=0;$i<10;$i++){
	$misRespuestas[$i]=$_POST['opcion'.($i+1)];
}
for($i=0;$i<10;$i++){
	if($misRespuestas[$i]==$_SESSION['respuesta'][$i]){
		$correctas++;
	}
	$_SESSION['historial']=$_SESSION['historial'].'
	<tr>
      <td align="center" width="200"><font face="Impact" color="#323232" size="3">'.($i+1).'</font></td>
      <td align="center" width="200"><font face="Impact" color="#323232" size="3">'.$_SESSION['respuesta'][$i].'</font></td>
      <td align="center" width="200"><font face="Impact" color="#323232" size="3">'.$misRespuestas[$i].'</font></td>
	</tr>';
}
$_SESSION['historial']=$_SESSION['historial'].'

  </tbody>
</table><br/>';
$_SESSION['correctas']=$_SESSION['correctas']+$correctas;
$_SESSION['acceso']=5;
echo $_SESSION['correctas'];
$cal=$_SESSION['correctas']/4;
require_once("../../entidades/Bases de datos/conexion.php");
$sql="INSERT INTO resultados(matricula, calificacion, respuestas, id_materia) VALUES ('".$_SESSION["matricula"]."', '".$cal."', '".$_SESSION['historial']."', '".$_SESSION['materia']."')";
$result =$con-> query($sql)or die("Error" .mysqli_error($con));
if($result>0){
header("location:../../workflow/Workpage/workspaceC.php");
}
?>

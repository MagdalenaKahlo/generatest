<?php session_start();
$misRespuestas[]=NULL;
include("historial.php");
$_SESSION['historial']=$_SESSION['historial'].'<table width="600" border="0" align="center" style="background:rgba(92,184,92,0.70)">
  <tbody>
    <tr>
      <td colspan="3" align="center"><p><font face="Impact" color="#323232" size="3">Aciertos en preguntas de relación de columnas</font></p></td>
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
$_SESSION['acceso']=4;
echo $_SESSION['correctas'];
header("location:../../workflow/Workpage/workspaceC.php");
?>
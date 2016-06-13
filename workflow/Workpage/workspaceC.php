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
<!--Presentacion preguntas de opcion multiple-->

<?php
if(isset($_SESSION['acceso'])){
 if($_SESSION['acceso']==1){?>
<br />
<form name="opcion" method="post" action="../../controlador/Alumno/evaluacion1.php">
<table width="800" border="0" align="center">
    <tr>
      <td>
      <?php
		require("../../entidades/Bases de datos/conexion.php");
		$sql="SELECT id_pregunta,pregunta, opc1, opc2, opc3, opc4, resp_correcta from preguntas where id_materia='".$_REQUEST['cn_materia']."' and id_profesor='".$_REQUEST['cn_profesor']."' ORDER BY RAND() LIMIT 10";
    	$result =$con-> query($sql)or die("Error" .mysqli_error($con));
		$num=1;
		while($pregunta = mysqli_fetch_array($result)){
			$_SESSION['respuesta'][$num-1]=$pregunta['resp_correcta'];
		?>
      	<div class="form-group" style="background:rgba(179,223,225,0.79)">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
          <div class="row">
            <div class="col-md-12" align="left">
			<font face="Impact" color="#323232" size="3"><?php echo $num.".-¿".utf8_encode($pregunta['pregunta'])."?"?></font>
            </div>
          </div>
          <br/>
          <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
          <div class="row">
            <div class="col-md-3"><input type="radio" name="opcion<?php echo $num; ?>" value="1" required><font face="Calibri" color="#323232" size="3"> <?php echo utf8_encode($pregunta['opc1']); ?></font></div>
            <div class="col-md-3"><input type="radio" name="opcion<?php echo $num; ?>" value="2"><font face="Calibri" color="#323232" size="3"> <?php echo utf8_encode($pregunta['opc2']); ?></font></div>
            <div class="col-md-3"><input type="radio" name="opcion<?php echo $num; ?>" value="3"><font face="Calibri" color="#323232" size="3"> <?php echo utf8_encode($pregunta['opc3']); ?></font></div>
            <div class="col-md-3"><input type="radio" name="opcion<?php echo $num; ?>" value="4"><font face="Calibri" color="#323232" size="3"> <?php echo utf8_encode($pregunta['opc4']); ?></font></div>
          </div>
      	</div>
        <?php $num++; } ?>
        <div class="row">
        	<input type="submit" value="Continuar con el cuestionario" class="btn btn-info btn-block" />
        </div>
      </td>
    </tr>
</table>
</form>
<?php }?>

<!--Presentacion preguntas de falso y verdadero-->
<?php if($_SESSION['acceso']==2){?>
<br />
<form name="opcion" method="post" action="../../controlador/Alumno/evaluacion2.php">
<table width="800" border="0" align="center">
    <tr>
      <td>
      <?php
		require_once("../../entidades/Bases de datos/conexion.php");
		$sql="SELECT preguntafv, respuestafv FROM preguntasfv WHERE id_materia='".$_REQUEST['cn_materia']."' and id_profesor='".$_REQUEST['cn_profesor']."' ORDER BY RAND() LIMIT 10";
    	$result =$con-> query($sql)or die("Error" .mysqli_error($con));
		$num=1;
		while($pregunta = mysqli_fetch_array($result)){
			$_SESSION['respuesta'][$num-1]=$pregunta['respuestafv'];
		?>
      	<div class="form-group" style="background:rgba(240,173,78,0.70)">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
          <div class="row">
            <div class="col-md-12" align="left">
			<font face="Impact" color="#323232" size="3"><?php echo $num.".- ".utf8_encode($pregunta['preguntafv'])?></font>
            </div>
          </div>
          <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
          <div class="row">
            <div class="col-md-3"><input type="radio" name="opcion<?php echo $num; ?>" value="1" required><font face="Calibri" color="#323232" size="3"> Verdadero</font></div>
            <div class="col-md-3"><input type="radio" name="opcion<?php echo $num; ?>" value="0"><font face="Calibri" color="#323232" size="3"> Falso</font></div>
      	  </div>
        </div>
        <br/>
        <?php $num++; } ?>
        <div class="row">
        	<input type="submit" value="Continuar con el cuestionario" class="btn btn-warning btn-block" />
        </div>
      </td>
    </tr>
</table>
</form>
<?php }?>

<!--Presentacion preguntas de relacion de columnas-->
<?php if($_SESSION['acceso']==3){?>
<br />
<form name="opcion" method="post" action="../../controlador/Alumno/evaluacion3.php">
<table width="900" border="0" align="center">
    <tr>
      <td>
      <?php
		require_once("../../entidades/Bases de datos/conexion.php");
		$sql="SELECT concepto, opcion, respuesta  FROM  preguntasr WHERE id_materia='".$_REQUEST['cn_materia']."' and id_profesor='".$_REQUEST['cn_profesor']."' LIMIT 10";
    	$result =$con-> query($sql)or die("Error" .mysqli_error($con));
		$num=1;
		while($pregunta = mysqli_fetch_array($result)){
			$_SESSION['respuesta'][$num-1]=$pregunta['respuesta'];
		?>
      	<div class="form-group" style="background:rgba(92,184,92,0.70)">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
          <div class="row">
            <div class="col-md-8" align="left">
			<font face="Impact" color="#323232"><?php echo $num.".- ".utf8_encode($pregunta['concepto'])?></font>
            </div>
            <div class="col-md-2" align="left">
			<input type="number" name="opcion<?php echo $num; ?>" class="form-control" min="1" max="10" required/>
            </div>
            <div class="col-md-2" align="left">
			<font face="Impact" color="#323232"><?php echo utf8_encode($pregunta['opcion'])?></font>
            </div>
          </div>
        </div>
        <?php $num++; } ?>
        <div class="row">
        	<input type="submit" value="Continuar con el cuestionario" class="btn btn-success btn-block" />
        </div>
      </td>
    </tr>
</table>
</form>
<?php }?>
<!--Presentacion preguntas de preguntas abiertas-->
<?php if($_SESSION['acceso']==4){?>
<br />
<form name="opcion" method="post" action="../../controlador/Alumno/evaluacion4.php">
<table width="900" border="0" align="center">
    <tr>
      <td>
      <?php
		require_once("../../entidades/Bases de datos/conexion.php");
		$sql="SELECT preguntac, respuesta FROM preguntasc WHERE id_materia='".$_REQUEST['cn_materia']."' and id_profesor='".$_REQUEST['cn_profesor']."' ORDER BY RAND() LIMIT 10";
    	$result =$con-> query($sql)or die("Error" .mysqli_error($con));
		$num=1;
		while($pregunta = mysqli_fetch_array($result)){
			$_SESSION['respuesta'][$num-1]=utf8_encode($pregunta['respuesta']);
		?>
      	<div class="form-group" style="background:rgba(217,83,79,0.70)">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
          <div class="row">
            <div class="col-md-12" align="left">
			<font face="Impact" color="#323232" size="3"><?php echo $num.".- ".utf8_encode($pregunta['preguntac'])?></font>
            </div>
            <div class="col-md-12" align="left">
			<input type="Text" name="opcion<?php echo $num; ?>" class="form-control" required/>
            </div>
          </div>
        </div>
        <?php $num++; } ?>
        <div class="row">
        	<input type="submit" value="Continuar con el cuestionario" class="btn btn-danger btn-block" />
        </div>
      </td>
    </tr>
</table>
</form>
  <?php }?>
  <!--Presentacion preguntas de preguntas abiertas-->
  <?php 
if($_SESSION['acceso']==5){
	$cal=$_SESSION['correctas']/4;
	if($cal>=7){
?>
<p align="center"><a href="../../controlador/Alumno/Cerrar.php"><label class="btn btn-danger btn-lg">Cerrar</label></a></p>
<br />
<table width="300" border="0" align="center">
	<tr>
      <td align="center"><font face="Impact" color="#323232" size="5">Felicidades aprobaste&nbsp;<?php echo $cal?></font></td>
    </tr>
    <tr>
      <td align="center"><img src="../../resources/img/battux.png" width="256" height="256" alt=""/></td>
    </tr>
</table>
<?php }else{?>
<p align="center"><a href="../../controlador/Alumno/Cerrar.php"><label class="btn btn-danger btn-lg">Cerrar</label></a></p>
<br />
<table width="320" border="0" align="center">
	<tr>
      <td align="center"><font face="Impact" color="#323232" size="5">Lo sentimos no aprobaste&nbsp;<?php echo $cal?></font></td>
    </tr>
    <tr>
      <td align="center"><img src="../../resources/img/tuxtriste.png" width="320" height="257" alt=""/></td>
    </tr>
</table>
<?php }
echo $_SESSION['historial'];
	}
}else{
	header("location:../../index.php");	
}
?>
</body>
</html>
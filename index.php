<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
<script src="resources/js/sweetalert.min.js"></script> 
<link rel="stylesheet" type="text/css" href="resources/css/sweetalert.css">
    <title>Sistema de Examenes</title>
	<link rel="shortcut icon" href="assets/img/">
    <!-- Bootstrap core CSS -->
    <link href="resources/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="resources/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="resources/css/Stylelogin.css" rel="stylesheet">
  </head>
  <body>
  	<p align="right"><a href="dependencias/Alumnos/AltaAlumnos.php" class="btn btn-danger">Registrarme</a></p>
	  <div class="page-wrap">  
	  	<div class="container centrado">
		      <form class="form-login" method="post" action="return false" onsubmit="return false">
		        <h2 class="form-login-heading">Bienvenido</h2>
		        <div class="login-wrap">
                	<br>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
		            <input type="text" name="usu" id="usu" class="form-control" placeholder="Usuario" autofocus required />
                    </div>
		            <br>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
		            <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña">
                    </div>
		            <br>
		            <input class="btn btn-block btn-solid"  type="submit" name="Entrar"  onclick="Validar(document.getElementById('usu').value , document.getElementById('pass').value);"  value="ENTRAR"></input>
		            <hr>
                     <div id="respuesta"> </div>
		        </div>
		          <!-- Modal -->
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="resources/js/jquery.js"></script>
      <script>
                   function Validar(usu, pass)
        {
            
            $.ajax({
                url: "controlador/Usuarios/validar.php",
                type: "POST",
                data: "usu="+usu+"&pass="+pass,
                success: function(resp){
                    $('#respuesta').html(resp)
                }        
            });
        } 

        </script>
  </body>
</html>

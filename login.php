<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="estilos/index.css?ts=<?=time()?>" rel="stylesheet">
<link href="estilos/login.css?ts=<?=time()?>" rel="stylesheet">
    
    <meta http-equiv="Content-Type"  charset="utf-8">
	<title> Login </title>
</head>

<body>
<div id="contenedor">
<div id="contenido">
<a class='boton_login' href="registro.php"> Registrarse </a>

	<p class="titulo"> Bienvenido a ProjectMaad </p>
	<p class="subtitulo"> "Organizar no es algo que haces una vez al año, es algo que haces todos los dias"
  <div id="opciones">
  <form action="proceso.php" method="post" class="form_iniciar">
    <input type="text" name="nick" placeholder="Nick">
    <input type="password" name="pass" placeholder="Contraseña">
    <?php
    if (isset($_GET['error'])==1)    
    {
      echo "<div class='alert alert-danger error' role='alert'>
      El usuario o contraseña no son correctos.
    </div>";
    }
  ?>
    <input type="submit" value="Iniciar Sesion">
  </form>


  
  
  </div>
</div>
</div>
	
	
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="estilos/index.css" rel="stylesheet">
    <link href="estilos/registro.css?ts=<?=time()?>" rel="stylesheet"> <!-- Hace que mis cambios en css se tomen, problemas con que no refesca los cambios en las hojas de estilo-->
    <meta http-equiv="Content-Type"  charset="utf-8">
	<title> Registro </title>
</head>

<body>
<div id="contenedor">
<div id="contenido">
	<p class="titulo"> Bienvenido a ProjectMaad </p>
	<p class="subtitulo"> "Organizar no es algo que haces una vez al año, es algo que haces todos los dias"
  <div id="opciones">
    <form action="registro.php" method="post" class="form_registro">
      <input type="text" name="nombre" placeholder="Nombre" required>
      
      <input type="text" name="nick" placeholder="Nick" required>
      <input type="text" name="email" placeholder="e-mail" required>
      <input type="password" name="pass" placeholder="Contraseña" required>
      <input type="password" name="pass2" placeholder="Repita la contraseña" required>
      

      <?php
        if (isset($_POST['nombre']) && isset($_POST['nick']) && isset($_POST['email']) && isset($_POST['pass']))
        {
          $nombre=$_POST['nombre'];
          $nick=$_POST['nick'];
          $email=$_POST['email'];
          $pass=$_POST['pass'];
          $pass2=$_POST['pass2'];
          
          if ($pass==$pass2)
          {
          $consulta="INSERT INTO usuario (nombre_usuario,nick_usuario,email,contra) VALUES ('$nombre','$nick','$email','$pass')";

          include("SQLConn.php");
          $query=mysqli_query($con,$consulta);
           echo "<div class='alert alert-success ok' role='lert'>
           Se registro correctamente <a class='ok_a' href='login.php'> Iniciar Sesion </a>
         </div>";
          }
          else 
          {
            echo "<div class='alert alert-danger' role='alert'>
            La contraseña no coinciden.
          </div>";
          }
        }
      ?>
      <input type="submit" value="Registrarse">
    </form>

  
  </div>
</div>
</div>
	
	
</body>
</html>
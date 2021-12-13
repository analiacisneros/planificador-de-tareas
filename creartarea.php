<!DOCTYPE html>
<html>
<head>
	<title>Main</title>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="estilos/main.css?ts=<?=time()?>" rel="stylesheet">
  <link href="estilos/creartarea.css?ts=<?=time()?>" rel="stylesheet">
	

</head>
<?php 
 session_start();
 if (isset($_SESSION['Nick']) && isset($_SESSION['Contra']))
 {
 
 ?>
<body>
<div id="contenedor">
  <header> 
  <div id="linea"><img src="fotos/enlinea.png" id="imagen" > <?php echo $_SESSION['Nombre']; ?> </div>
 <a class="cerses" href="cerrarsesion.php"> Cerrar Sesion </a>
  </header>
  <aside>
  

    <ul class="lista_opc">
      <li> <a href="creartarea.php"> <img src="fotos/crear.png"> Crear tarea </a></li>
      <li> <a href="tareasprog.php"><img src="fotos/lista.png"> Tareas programadas </a> </li>
      <li> <a href="tareasreal.php"><img src="fotos/lista.png">Tareas realizadas </a></li>
      
      <li> <a href="tareascaduc.php"><img src="fotos/lista.png">Tareas caducadas </a></li>
    </ul>
  </aside>
  <section>
    <form method="POST" action="creartarea.php" id="form_creartarea">
        <label> Nombre: </label>
        <input type="text" name="nombre_tarea" required>

        <label> Descripcion: </label>
        <textarea name="descrip"></textarea>

        <label> Fecha de incio: </label>
        <input type="date" name="fecha_inic" required>

        <label> Fecha de fin: </label>
        <input type="date" name="fecha_fin" required>

        <input type="submit" value="Crear">
       
   
        <?php   
         if (isset($_POST['nombre_tarea']) && isset($_POST['descrip']) && isset($_POST['fecha_inic'])  && isset($_POST['fecha_fin']))
         {
          
          $nombre=$_POST['nombre_tarea'];
          $descrip=$_POST['descrip'];
          $fecha_in=$_POST['fecha_inic'];
          $fecha_fin=$_POST['fecha_fin'];
          $id_usua=intval($_SESSION['Id']);

         
          $insertar="INSERT INTO tarea (tarea,descrip,inicio,fin,id_usuario) VALUES ('$nombre', '$descrip', '$fecha_in', '$fecha_fin', $id_usua)";
          include("SQLConn.php");
          $query=mysqli_query($con,$insertar);


          echo "<div class='alert alert-success ok_ctarea' role='lert'>
          La tarea se creo correctamente
        </div>";

         }
         
        ?>
    </form>
  </section>
</div>
</body>
<?php 
}
else {
  header("Location: login.php");
}
?>
</html>
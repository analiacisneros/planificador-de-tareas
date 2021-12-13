<!DOCTYPE html>
<html>
<head>
	<title>Main</title>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="estilos/main.css?ts=<?=time()?>" rel="stylesheet">
  <link href="estilos/tarea.css?ts=<?=time()?>" rel="stylesheet">
	

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
    <form class="form_bus"action="main.php" method="get" name="form_buscar">
    <label> Buscar: </label>
    <input type="search" name="buscar" class="buscador">
    </form>

    <ul class="lista_opc">
      <li> <a href="creartarea.php"> <img src="fotos/crear.png"> Crear tarea </a></li>
      <li> <a href="tareasprog.php"><img src="fotos/lista.png"> Tareas programadas </a> </li>
      <li> <a href="tareasreal.php"><img src="fotos/lista.png">Tareas realizadas </a></li>
     
      <li> <a href="tareascaduc.php"><img src="fotos/lista.png">Tareas caducadas </a></li>
    </ul>
  </aside>
  <section>
  <?php 
   if (isset($_GET['id']) && isset($_GET['accion']))
   {
     $accion=$_GET['accion'];
     $id_tarea=$_GET['id'];
     if ($accion=='realiz')
     { //If en donde se marca la tarea como realizada
       
       $consulta="SELECT * FROM tarea where id_tarea=$id_tarea";
       include("SQLConn.php");
       $query=mysqli_query($con,$consulta);
       $registro=mysqli_num_rows($query);
       if ($registro>0)
       {
        
        while($row=mysqli_fetch_assoc($query))
        {

        
        $insertar="INSERT INTO tarea_realizada (tarea, descrip, inicio, fin,id_usuario, id_tarea) values ('{$row['tarea']}' , '{$row['descrip']}' , '{$row['inicio']}' , '{$row['fin']}' , {$row['id_usuario']} , {$row['id_tarea']})";
        $resultado=mysqli_query($con,$insertar);
        echo "<div class='alert alert-success ok' role='alert'>
        La tarea se marco como realizada
      </div>";
        }
        $eliminar="DELETE from tarea where id_tarea=$id_tarea";
        $query2=mysqli_query($con,$eliminar);
         include("SQLclose.php");
       }
     } // Fin del proceso de tarreas realizadas

     if ($accion=='modif')
     {
      if (!isset($_POST['titulo']) && !isset($_POST['descrip']))
        { // Llave que comprueba si vienen los campos del formulario modificado
       $consulta="SELECT * FROM tarea where id_tarea=$id_tarea";
       include("SQLConn.php");
       $query=mysqli_query($con,$consulta);
       $registro=mysqli_num_rows($query);
       echo "<form action='tarea.php?id=$id_tarea&accion=modif' method='post' class='form_modificar'> ";
       while ($row=mysqli_fetch_assoc($query))
       {
         echo "<label> Titulo </label>
         <input type='text' name='titulo' value='{$row['tarea']}'>
         <label> Descripcion</label>
         <textarea name='descrip'> {$row['descrip']} </textarea>
         <label> Fecha inicio </label>
         <input type='date' name='inicio' value='{$row['inicio']}'>
         <label> Fecha fin </label>
         <input type='date' name='fin' value='{$row['fin']}'>

         <input type='submit' value='Modificar' class='boton_modificar'>
         ";
       }
       echo "</form>";
     } // Fin del if que verifica los campo del formulario
     else 
     {
      $titulo=$_POST['titulo'];
      $descrip=$_POST['descrip'];
      $inicio=$_POST['inicio'];
      $fin=$_POST['fin'];
      $modificar="UPDATE tarea SET tarea='$titulo', descrip='$descrip', inicio='$inicio', fin='$fin' WHERE id_tarea=$id_tarea";
      include("SQLConn.php");
      $query_modif=mysqli_query($con,$modificar);
      echo "<div class='alert alert-success ok' role='alert'>
      Modificación realizada.
    </div>";
      } // Fin del else en el que se inserta los datos modificados
     } // Fin del if para modificar 
     
     
     if ($accion=='elimin')
     {
      $eliminar= "DELETE from tarea Where id_tarea=$id_tarea";
      include("SQLConn.php");
      $query=mysqli_query($con,$eliminar);
      echo "<div class='alert alert-danger eliminar' role='alert'>
      Se ha eliminado la tarea
    </div>";
     }

   }
   elseif (isset($_GET['id']))
   {
    $id_tarea=$_GET['id'];
    $consulta="SELECT * FROM tarea where id_tarea=$id_tarea";
    include("SQLConn.php");
    $query=mysqli_query($con,$consulta);
     echo "<table>
           <thead>
           <tr> <th> TITULO </th>
           <th> DESCRIPCION </th>
           <th> FECHA INCIO </TH>
           <TH> FECHA FIN </TH>
           </TR> </THEAD>";
    while ($row=mysqli_fetch_assoc($query))
    {
      
       echo "<tr>  <td>  {$row['tarea']} </td>  
                       <td> {$row['descrip']} </td>
                        <td> {$row['inicio']} </td>
                        <td> {$row['fin']} </td>
                        
                       </tr>";
    }
    echo "</table>";
     echo "<a href='tarea.php?id=$id_tarea&accion=realiz'class='boton_realizar'> Realizado </a> 
         <a href='tarea.php?id=$id_tarea&accion=modif' class='boton_modif'> Modificar </a>
        
         <a href='tarea.php?id=$id_tarea&accion=elimin' class='boton_elimin'> Eliminar </a>";
   }
  
  ?>
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

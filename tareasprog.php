<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Main</title>
	<link href="estilos/main.css?ts=<?=time()?>" rel="stylesheet">
  <link href="estilos/tareasprog.css?ts=<?=time()?>" rel="stylesheet">
  <script langiage="javascript" type="text/javascript">
	function Abrir(url) {
    location.href=url;
}
</script>

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
  <p class="titulo"> Tareas programadas: </p>
    <?php 
     $id=$_SESSION['Id'];
     $fecha_actual=date("Y-m-d");
     $consulta="SELECT * FROM tarea where fin>='$fecha_actual' and id_usuario=$id";
     include("SQLConn.php");
     $query=mysqli_query($con,$consulta);
     $registro=mysqli_num_rows($query);

  
         
           if ($registro>0)
           {
            echo "<table>
           <thead>
           <tr> <th> TITULO </th>
          
           <th> FECHA INCIO </TH>
           <TH> FECHA FIN </TH>
           </TR> </THEAD>";

             $fecha_actual=date("Y-m-d");
            
             while ($row=mysqli_fetch_assoc($query))
             {
              $pagina="document.location='tarea.php?id={$row['id_tarea']}'";
              
              echo "<tr onclick=$pagina>  <td>  {$row['tarea']} </td>  
                       
                        <td> {$row['inicio']} </td>
                        <td> {$row['fin']} </td>
                        
                       </tr>";
              
             }
             echo "</table>";
           }
           else 
           {
            echo "<div class='alert alert-danger sin_resultados' role='alert'>
            No hay tareas programadas
          </div>";
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
<?php


$nick=$_POST['nick'];
$pass=$_POST['pass'];
session_start();

$consulta="SELECT * from usuario WHERE nick_usuario='$nick' and contra='$pass'";

include("SQLConn.php");

$query=mysqli_query($con,$consulta);

if ($row=mysqli_fetch_assoc($query))
{
	
	$_SESSION['Nick']=$nick;
	$_SESSION['Contra']=$pass;
	$_SESSION['Nombre']= $row['nombre_usuario'];
	$_SESSION['Id']= $row['id_usuario'];
	
	
	
	
	header("Location:tareasprog.php");
	
}
else{
	header("Location: login.php?error=1");
	
}
?>
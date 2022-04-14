<?php
session_start();
include('../../php/conexion.php');
if(isset($_SESSION['nombre_cliente']))  include('vista_index.php');

else if(!isset($_SESSION['nombre_cliente']) && isset($_COOKIE['nombre_cliente'])){
	 
	$email=utf8_decode($_COOKIE['email_cliente']); 
	$password=utf8_decode($_COOKIE['password_cliente']);
	$registros=mysqli_query($conexion,"SELECT nombre FROM clientes WHERE email='$email' AND password='$password'");
	if(mysqli_num_rows($registros)==0) header('location:../../index.php');
	
	else{	
		
		include('vista_index.php');
		
		
		
	}
}

else	header('location:../../index.php');

cerrarconexion();
?>
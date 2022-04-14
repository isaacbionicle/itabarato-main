<?php
session_start();
include('../../php/conexion.php');
sleep(2);
if(isset($_POST['nombre'])){
	
	$nombre=mysqli_real_escape_string($conexion,$_POST['nombre']);
	$apellidos=mysqli_real_escape_string($conexion,$_POST['apellidos']);
	$email=mysqli_real_escape_string($conexion,$_POST['email']);
	$direccion=mysqli_real_escape_string($conexion,$_POST['direccion']);
	$estado=mysqli_real_escape_string($conexion,$_POST['estado']);
	$cp=mysqli_real_escape_string($conexion,$_POST['cp']);
	$telefono=mysqli_real_escape_string($conexion,$_POST['telefono']);
	$password=mysqli_real_escape_string($conexion,$_POST['password']);
	
//------------------------------------------------------//
	
	$nombre=ucwords($nombre);
	$apellidos=ucwords($apellidos);
	
	
	$nombre=utf8_decode($nombre);
	$apellidos=utf8_decode($apellidos);
	$email=utf8_decode($email);
	$direccion=utf8_decode($direccion);
	$estado=utf8_decode($estado);
	$cp=utf8_decode($cp);
	$telefono=utf8_decode($telefono);
	$password=utf8_decode($password);
	
	mysqli_query($conexion,"UPDATE clientes SET nombre='$nombre', apellidos='$apellidos',email='$email', direccion='$direccion',cp='$cp', estado='$estado', telefono='$telefono', password='$password' WHERE id_cliente='$_POST[id_cliente]'");
	
	setcookie("nombre_cliente",utf8_encode($nombre),time()+300,"/");
	setcookie("password_cliente",utf8_encode($password),time()+300,"/");
	setcookie("email_cliente",utf8_encode($email),time()+300,"/");
	
cerrarconexion();
	
}

else header('location:../../index.php');
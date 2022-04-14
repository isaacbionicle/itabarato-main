<?php 

session_start();
sleep(1);
include('../../../php/conexion.php');

if($_POST["prioridad_nueva"]==1){
	$filas=mysqli_query($conexion,"SELECT nombre FROM imagenes WHERE id_producto='$_SESSION[id]' && prioridad=1");
	
	if(mysqli_num_rows($filas)==1){
	
		$fila=mysqli_fetch_array($filas);
		mysqli_query($conexion,"UPDATE imagenes SET prioridad=1 WHERE prioridad='$_SESSION[prioridad_vieja]' && id_producto='$_SESSION[id]'");
		mysqli_query($conexion,"UPDATE imagenes SET prioridad='$_SESSION[prioridad_vieja]' WHERE nombre='$fila[nombre]'");
	
	}
	
	else {
		
		mysqli_query($conexion,"UPDATE imagenes SET prioridad=1 WHERE prioridad='$_SESSION[prioridad_vieja]' && id_producto='$_SESSION[id]'");	
	
	}
	
}

if($_POST["prioridad_nueva"]==2){
	$filas=mysqli_query($conexion,"SELECT nombre FROM imagenes WHERE id_producto='$_SESSION[id]' && prioridad=2");
	
	if(mysqli_num_rows($filas)==1){
	
		$fila=mysqli_fetch_array($filas);
		mysqli_query($conexion,"UPDATE imagenes SET prioridad=2 WHERE prioridad='$_SESSION[prioridad_vieja]' && id_producto='$_SESSION[id]'");
		mysqli_query($conexion,"UPDATE imagenes SET prioridad='$_SESSION[prioridad_vieja]' WHERE nombre='$fila[nombre]'");
	
	}
	
	else {
		
		mysqli_query($conexion,"UPDATE imagenes SET prioridad=2 WHERE prioridad='$_SESSION[prioridad_vieja]' && id_producto='$_SESSION[id]'");	
	
	}
	
}

if($_POST["prioridad_nueva"]==3){
	$filas=mysqli_query($conexion,"SELECT nombre FROM imagenes WHERE id_producto='$_SESSION[id]' && prioridad=3");
	
	if(mysqli_num_rows($filas)==1){
	
		$fila=mysqli_fetch_array($filas);
		mysqli_query($conexion,"UPDATE imagenes SET prioridad=3 WHERE prioridad='$_SESSION[prioridad_vieja]' && id_producto='$_SESSION[id]'");
		mysqli_query($conexion,"UPDATE imagenes SET prioridad='$_SESSION[prioridad_vieja]' WHERE nombre='$fila[nombre]'");
	
	}
	
	else {
		
		mysqli_query($conexion,"UPDATE imagenes SET prioridad=3 WHERE prioridad='$_SESSION[prioridad_vieja]' && id_producto='$_SESSION[id]'");	
	
	}
	
}

?>
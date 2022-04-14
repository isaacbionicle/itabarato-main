<?php 
session_start();
if(isset($_SESSION['administrador']) && isset($_POST['actualizar'])){
	include('../../php/conexion.php');
	$id_producto=$_POST['id_producto'];
	$precio_nuevo=$_POST['precionuevo'];
	$descripcion_nueva=utf8_decode($_POST['descripcionnueva']);
	// stock
	$cantidad=$_POST["cantidad"];
	// stock
	mysqli_query($conexion,"update productos set precio='$precio_nuevo', descripcion='$descripcion_nueva', cantidad='$cantidad' where id_producto='$id_producto'");
	header('location:mostrarproductos.php?alert&pagina='.$_POST["pagina"]);
	
	
}

else{
	
	header('location:../index.html');
	
}

?>
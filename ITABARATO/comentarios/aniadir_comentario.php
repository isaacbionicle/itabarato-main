<?php 
session_start();
include("funciones_comentarios.php");
include('../php/conexion.php');

// Corrección de errata 
// Lo de if(isset($_POST["id_producto"])) es por seguridad, para que no de un error si // te metes directamente en aniadir_comentario.php sin pasar por el formulario de index_comentarios.php
if(isset($_POST["id_producto"])){

	$registros=mysqli_query($conexion,"SELECT nombre FROM productos WHERE id_producto='$_POST[id_producto]'"); 
	$fila=mysqli_fetch_array($registros);
	$nombre_producto=$fila["nombre"];
	
}
// Corrección de errata

/*
if(isset($_POST["nombre_producto"]))
	$nombre_producto=$_POST["nombre_producto"];
*/
if(isset($_POST["comentario"]) && producto_comprado($_SESSION['id_cliente'],$nombre_producto,$conexion)==true && valoracion_repetida($_SESSION['id_cliente'],$_POST['id_producto'],$conexion)==false && (contar_caracteres($_POST["comentario"])<500)){

	if(isset($_POST["correo"])) 
		$correo=1;
	else 
		$correo=0;

	$n_estrellas=$_POST["estrellas"];
	$url=mysqli_real_escape_string($conexion,$_POST["url"]);
	$url=str_replace("watch?","", $url);
	$url=str_replace("=","/",$url);
	$url=explode("&",$url);
	$url=$url[0];
	$comentario=$_POST["comentario"];
	$comentario=htmlentities($comentario);
	$comentario=mysqli_real_escape_string($conexion,$comentario);
	$comentario=utf8_decode($comentario);
	$nombre=$_SESSION["nombre_cliente"]." ".$_SESSION["id_cliente"];
	$nombre=utf8_decode($nombre);
	$id_cliente=$_SESSION["id_cliente"];
	$id_producto=mysqli_real_escape_string($conexion,$_POST["id_producto"]);
	$id_categoria=mysqli_real_escape_string($conexion,$_POST["id_categoria"]);

	$sql="INSERT INTO comentarios 	(nombre,comentario,puntuacion,correo,url,id_cliente,id_producto,id_categoria) VALUES 	('$nombre','$comentario',$n_estrellas,$correo,'$url',$id_cliente,$id_producto,$id_categoria)";
	mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
	cerrarconexion();
	header(	"location:../detalleproducto.php?id_producto=$id_producto&id_categoria=$id_categoria&enviado=1");
	
}
?>
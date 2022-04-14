<?php 
session_start();
if (!isset($_SESSION["administrador"])) header("location:../index.html");
include('../../php/conexion.php');
$sql="SELECT comentario FROM comentarios WHERE id_comentario='$_POST[id_comentario]'";
$registro=mysqli_query($conexion,$sql);
$fila=mysqli_fetch_array($registro);
echo $fila["comentario"];
?>
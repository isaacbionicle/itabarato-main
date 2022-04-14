<?php
session_start();
include("../php/conexion.php");
$id_cliente=mysqli_real_escape_string($conexion,$_GET["id_cliente"]);
$id_producto=mysqli_real_escape_string($conexion,$_GET["id_producto"]);
$id_categoria=mysqli_real_escape_string($conexion,$_GET["id_categoria"]);
if(isset($_SESSION['id_cliente']) && $_SESSION['id_cliente']==$id_cliente){
$sql="DELETE FROM comentarios WHERE id_cliente='$_SESSION[id_cliente]' AND id_producto='$id_producto'";
mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
header("location:../detalleproducto.php?id_producto=$id_producto&id_categoria=$id_categoria&eliminado=1");
}
?>
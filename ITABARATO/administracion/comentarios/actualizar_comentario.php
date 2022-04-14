<?php 
session_start();
if (!isset($_SESSION['administrador'])) header('location:../index.html');
include("../../php/conexion.php");

$pagina=$_POST["pagina"];
$tamano_pagina=$_POST["tamano_pagina"];
$numero_registro_comentario=$_POST["numero_registro_comentario"];

for($i=0;$i<$tamano_pagina;$i++){

	if(isset($_POST["$numero_registro_comentario"])){
		
		$registros=mysqli_query($conexion,"SELECT id_comentario FROM comentarios LIMIT ".($numero_registro_comentario-1).",".$numero_registro_comentario) or die(mysqli_error($conexion));
		$fila=mysqli_fetch_array($registros);
		
		if($_POST["select"]==0 || $_POST["select"]==1){
			mysqli_query($conexion,"UPDATE comentarios SET estado='$_POST[select]' WHERE id_comentario='$fila[id_comentario]'");
		}
		
		if($_POST["select"]==2){
			mysqli_query($conexion,"DELETE FROM comentarios WHERE id_comentario='$fila[id_comentario]'");
		}
		
	}
		
	$numero_registro_comentario=$numero_registro_comentario-1;

}

header("location:mostrar_comentarios.php?pagina=$pagina");

?>
<?php
include('../php/conexion.php');

$codigo=mysqli_real_escape_string($conexion,$_GET['codigo']);
$id=mysqli_real_escape_string($conexion,$_GET['id_cliente']);

$registros=mysqli_query($conexion,"SELECT id_cliente FROM codigos WHERE codigo='$codigo' and id_cliente='$id'");
	if(mysqli_num_rows($registros)!=0){
		
		mysqli_query($conexion,"update clientes set validado='1' WHERE id_cliente='$id'");
		header('Location: ../index.php?alert=validado');
	}
	else{
		
		
		header('Location: form_registro_clientes.php?alert=enlacecaducado');
	}
	
cerrarconexion();

?>
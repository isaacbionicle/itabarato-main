<?php
include('../php/conexion.php');

$registros=mysqli_query($conexion,"SELECT id_cliente FROM codigos WHERE codigo='$_GET[codigo]' and id_cliente='$_GET[id_cliente]'");
	if(mysqli_num_rows($registros)==1){
		
		mysqli_query($conexion,"update clientes set validado='1' WHERE id_cliente='$_GET[id_cliente]'");
		header('Location: ../index.php?alert=validado');
	}
	else{
		
		
		header('Location: form_registro_clientes.php?alert=enlacecaducado');
	}
	
cerrarconexion();
?>
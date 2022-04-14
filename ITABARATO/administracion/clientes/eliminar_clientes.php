<?php 

session_start();
include('../../php/conexion.php');

	if(isset($_SESSION['administrador']) && isset($_POST['id_cliente'])){
	
		$id_cliente=$_POST['id_cliente'];
		
		$filas=mysqli_query($conexion,"SELECT pedido FROM pedidos WHERE id_cliente='$id_cliente'");
		while($fila=mysqli_fetch_array($filas)){
				
			mysqli_query($conexion,"DELETE FROM pedidos2 WHERE pedido='$fila[pedido]'");	
		
		}
		
		mysqli_query($conexion,"DELETE FROM pedidos WHERE id_cliente='$id_cliente'");	
		mysqli_query($conexion,"DELETE FROM clientes WHERE id_cliente='$id_cliente'");
		cerrarconexion();
	
	}
	
	else{
		
		cerrarconexion();
		header('location:../index.html');
		
	}

?>
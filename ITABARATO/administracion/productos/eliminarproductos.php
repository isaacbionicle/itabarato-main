<?php 
session_start();

	if(isset($_SESSION['administrador']) && isset($_POST['idproducto'])){
	
	
		$id_producto=$_POST['idproducto'];
		include('../../php/conexion.php');
		$registros=mysqli_query($conexion,"select nombre from imagenes where id_producto='$id_producto'");
		while($fila=mysqli_fetch_array($registros)){
			
			unlink("imagenes/".$fila['nombre']);	
			
	    }
		
		mysqli_query($conexion,"delete from imagenes where id_producto='$id_producto'");
		mysqli_query($conexion,"delete from productos where id_producto='$id_producto'");
		mysqli_query($conexion,"DELETE FROM comentarios WHERE id_producto='$id_producto'");
		cerrarconexion();
		
	
	
	
	}
	
	else {
		
		header('location:../index.html');
		
		
		}



?>
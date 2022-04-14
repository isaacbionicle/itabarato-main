<?php 
session_start();

	if(isset($_SESSION['administrador'])){//si esta logiado
	
	
		$idcategoria=$_POST['idcategoria'];
		include('../../php/conexion.php');//incluimos la conexion

		//seleccionamos los productos que tengan relacion con dicha categoria
		$registros1=mysqli_query($conexion,"select id_producto from productos where id_categoria='$idcategoria'");

         //SI EXISTEN PRODUCTOS CON ESA CATEGORIA
		while($fila1=mysqli_fetch_array($registros1)){
		    
		     //SELECCIONAMOS DE LA TABLA IMAGENES LOS PRODUCTOS
			$registros2=mysqli_query($conexion,"select nombre from imagenes where id_producto='$fila1[id_producto]'");
                     
              //SI EXISTEN IMAGENES DE ESOS PRODUCTOS 
			while($fila2=mysqli_fetch_array($registros2)){
				
				//QUITAMOS EL LINK DE DONDE SE GUARDA SU IMAGEN DEL PRODCUTO
				unlink("../productos/imagenes/".$fila2['nombre']);	
				
			}
			
			//BORRAMOS DE LA TAMBAL IMAGENES EL PRODUCTO
			mysqli_query($conexion,"delete from imagenes where id_producto='$fila1[id_producto]'");
			//BORRAMOS EL PRODUCTO  DEL LA TABLA PRODUCTO
			mysqli_query($conexion,"delete from productos where id_producto='$fila1[id_producto]'");	
			
		
		}
		//Borramos la categoria de la BD
		mysqli_query($conexion,"delete from categorias where id='$idcategoria'");
		//BORRAMOS LOS COMENTARIOS 
		mysqli_query($conexion,"DELETE FROM comentarios WHERE id_categoria='$idcategoria'");
		cerrarconexion();
	
	
	
	}
	
	else {
		
		header('location:../index.html');
		
		
		}



?>
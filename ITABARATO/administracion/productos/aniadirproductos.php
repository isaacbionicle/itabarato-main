<?php 
session_start();
include('../../php/conexion.php');

if(isset($_SESSION['administrador']) && isset($_POST['nombre'])){
	sleep(2);
	$nombre=utf8_decode($_POST['nombre']);
	$precio=utf8_decode($_POST['precio']);
	$descripcion=utf8_decode($_POST['descripcion']);
	$categoria=utf8_decode($_POST['categoria']);
	// stock
	$cantidad=$_POST["cantidad"];
	// stock

	$registros=mysqli_query($conexion,"select nombre from productos where nombre='$nombre'");
	if(mysqli_num_rows($registros)==0){
			
		
		// zona imagen
		//imagen 1
		if($_FILES['imagen1']['name']!=""){
			
			$ext=explode(".",$_FILES['imagen1']['name']);
			$extension=end($ext);
			$_FILES['imagen1']['name']=time()."_01.".$extension;
			$permitidos= array("image/jpg","image/jpeg","image/gif","image/png");
			$limite_kb= 1000;
			if(in_array($_FILES['imagen1']['type'],$permitidos) && $_FILES['imagen1']['size'] <= $limite_kb *1024){
				
				$ruta= "imagenes/".$_FILES['imagen1']['name'];
				move_uploaded_file($_FILES['imagen1']['tmp_name'],$ruta);
			
			}
			else {
			
				echo "errorimagen";
				exit();	
			
			}
		
		}
		
		//imagen 2
		
		if($_FILES['imagen2']['name']!=""){
			
			$ext=explode(".",$_FILES['imagen2']['name']);
			$extension=end($ext);
			$_FILES['imagen2']['name']=time()."_02.".$extension;
			$permitidos= array("image/jpg","image/jpeg","image/gif","image/png");
			$limite_kb= 1000;
			if(in_array($_FILES['imagen2']['type'],$permitidos) && $_FILES['imagen2']['size'] <= $limite_kb *1024){
				
				$ruta= "imagenes/".$_FILES['imagen2']['name'];
				move_uploaded_file($_FILES['imagen2']['tmp_name'],$ruta);
			
			}
			else {
			
				echo "errorimagen";
				exit();	
			
			}
		
		}
		
		//imagen 3
		
		if($_FILES['imagen3']['name']!=""){
			
			$ext=explode(".",$_FILES['imagen3']['name']);
			$extension=end($ext);
			$_FILES['imagen3']['name']=time()."_03.".$extension;
			$permitidos= array("image/jpg","image/jpeg","image/gif","image/png");
			$limite_kb= 1000;
			if(in_array($_FILES['imagen3']['type'],$permitidos) && $_FILES['imagen3']['size'] <= $limite_kb *1024){
				
				$ruta= "imagenes/".$_FILES['imagen3']['name'];
				move_uploaded_file($_FILES['imagen3']['tmp_name'],$ruta);
			
			}
			else {
			
				echo "errorimagen";
				exit();	
			
			}
		
		}
		
	mysqli_query($conexion,"insert into productos (nombre,precio,descripcion,id_categoria,cantidad) values ('$nombre','$precio','$descripcion','$categoria','$cantidad')");
	$registros=mysqli_query($conexion,"select id_producto from productos where nombre='$nombre'");
	$fila=mysqli_fetch_array($registros);
	if($_FILES['imagen1']['name']!=""){
		
		$nombreimagen1=$_FILES['imagen1']['name'];
		mysqli_query($conexion,"insert into imagenes (nombre,prioridad,id_producto) values ('$nombreimagen1','1','$fila[id_producto]')");
	
	}
	if($_FILES['imagen2']['name']!=""){
		
		$nombreimagen2=$_FILES['imagen2']['name'];
		mysqli_query($conexion,"insert into imagenes (nombre,prioridad,id_producto) values ('$nombreimagen2','2','$fila[id_producto]')");
		
	}
	
	if($_FILES['imagen3']['name']!=""){
		
		$nombreimagen3=$_FILES['imagen3']['name'];
		mysqli_query($conexion,"insert into imagenes (nombre,prioridad,id_producto) values ('$nombreimagen3','3','$fila[id_producto]')");
		
	}
	 	 cerrarconexion();
		 echo "exito";	
			
			
	}
	
	else{
		
	echo "nombrerepetido";
	
	}
	
	
	
}

else{

	header('location:../index.html');	
	
}


?>
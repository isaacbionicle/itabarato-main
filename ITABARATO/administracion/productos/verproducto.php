<?php 
if (isset($_POST['idproducto'])){
include('../../php/conexion.php');
	
	$registros1=mysqli_query($conexion,"select * from productos where id_producto='$_POST[idproducto]'") or die ("Error al conectar con la tabla".mysqli_error($conexion));
	$fila1=mysqli_fetch_array($registros1);
	
	// seleccionar categoría
	
	$registros2=mysqli_query($conexion,"select categoria from categorias where id='$fila1[id_categoria]'") or die ("Error al conectar con la tabla".mysql_error($conexion));
	
	$fila2=mysqli_fetch_array($registros2);
	
	// seleccionar imagen
	
	$registros3=mysqli_query($conexion,"select * from imagenes where id_producto='$fila1[id_producto]'") or die ("Error al conectar con la tabla".mysql_error($conexion));
	
	echo "<b>Nombre:</b>  ".utf8_encode($fila1['nombre']);
	echo "<br><br><b>Precio:</b>  ".utf8_encode($fila1['precio']);
	echo "<br><br><b>Categoria:</b> ".utf8_encode($fila2['categoria'])."<br><br>";
	if(mysqli_num_rows($registros3)!=0){
	
		while($fila3=mysqli_fetch_array($registros3)){
			
			echo utf8_encode($fila3['nombre']);
			echo "<img width='100px' src='imagenes/".utf8_encode($fila3['nombre'])."'>";
		
		}	
	
	}
	echo "<br><br><b>Descripción:</b>  ".utf8_encode($fila1['descripcion'])."<br><br>";
	
	
	
	
	
}

else{
	
	header('location:../index.html');
	
}
?>
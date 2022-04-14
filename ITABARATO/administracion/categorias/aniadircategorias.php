<?php 
session_start(); 


if(isset($_SESSION['administrador'])){//validar que este logiado
	
	if($_POST['categoria']!=""){
	 include('../../php/conexion.php'); //incluimos el archivo conexion 
	 $categoria=utf8_decode($_POST['categoria']);/*creamos una variable $categoria el utf_decode es para los caracteres y guardamos lo que trae  $_POST['categoria'] */
	 $registros=mysqli_query($conexion,"select categoria from categorias where categoria='$categoria'");
	 	if(mysqli_num_rows($registros)==0){//Si no existe entra 
	 	 mysqli_query($conexion,"insert into categorias (categoria) values ('$categoria')");//$categoria el seleccionado
	 	 cerrarconexion();//cerramos la conexion a la BD
	 	 header('location:formaniadircategorias.php?alert=1&categoria='.$categoria);/*nos direcciona Y LE MANDAMOS UNA VARIABLE LLAMADA ALERT CON EL VALOR DE UN EN CASO DE QUE SE HAYA INSTERADO CORRECTAMENTE*/
	 	}
		else{
			
			header('location:formaniadircategorias.php?alert=3&categoria='.$categoria); //SI YA EXISTE LA CATEGORIA
			
			}
	
	}
	else if ($_POST['categoria']==""){//si se intento ingresar infromacion vacia
		
		 header('location:formaniadircategorias.php?alert=2');/*mandamos un alert con valor 2 (el dos indicara en fromaniadi.. que no se añadio nada)*/
		}

}
else {//si no exta logiado madame a index html 
		
		header('location:../index.html');
		
		}
	

?>
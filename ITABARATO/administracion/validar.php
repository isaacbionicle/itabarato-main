<?php
session_start(); //Creamos una session 


if(!isset($_SESSION['administrador'])){ //si no existe  entonces entra y verficara el sig if la inf ingrsada
	if($_POST['nombre']=="jonathan" && $_POST['password']=="123456"){
	
		$_SESSION['administrador']=$_POST['nombre'];//creamos una variable sesssion y la llamamos administrador y le asignamose el valor de nombre */
	
	}
}

if (isset($_SESSION['administrador'])){//si existe la session 
	
	
	header('location:pedidos/ver_pedidos.php'); //nos direcciona a la ver_pedidos
	
	
	
	}
	
	else {
		
		header('location:index.html'); //nos direcciona a la pagina del logearse en caso de que no exista la session
	
		
		}

?>
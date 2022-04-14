<?php 
session_start();

if(isset($_SESSION['envio'])){
	
	unset($_SESSION['envio']);	//Eliminamos la session si es que existe

	$_SESSION["total"]=$_SESSION["total"]-100;	 //y le restamos al total  final 100 que es el del envio
		
}
?>
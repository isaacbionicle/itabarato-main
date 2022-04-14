<?php 
session_start();

if(!isset($_SESSION["envio"])){//si no existe una session envio
	
	$_SESSION["envio"]=100; //creamos una session envio a la cual le asignamos el cosoto de envio 100
	$_SESSION["total"]=$_SESSION["total"]+100;	
	
}

?>
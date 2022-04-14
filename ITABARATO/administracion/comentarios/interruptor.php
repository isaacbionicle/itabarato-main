<?php 

include("../../php/conexion.php");
$sql1="SELECT estado FROM interruptor";
$registro=mysqli_query($conexion,$sql1);
$fila=mysqli_fetch_array($registro);

if($fila["estado"]==1){
	
	$sql2="UPDATE interruptor SET estado=0";
	mysqli_query($conexion,$sql2) or die(mysqli_error($conexion));

}

else{
	
	$sql2="UPDATE interruptor SET estado=1";
	mysqli_query($conexion,$sql2) or die(mysqli_error($conexion));

}

?>
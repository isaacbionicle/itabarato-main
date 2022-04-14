<?php
include('../php/conexion.php');
$fecha_actual=time();
$registros=mysqli_query($conexion,"SELECT id_cliente FROM codigos WHERE '$fecha_actual'-fecha_antigua>60");
mysqli_query($conexion,"DELETE FROM codigos WHERE '$fecha_actual'-fecha_antigua>60");

while($fila=mysqli_fetch_array($registros)){
	
	mysqli_query($conexion,"DELETE FROM clientes WHERE id_cliente='$fila[id_cliente]' AND validado='0'");
	
}

cerrarconexion();

?>
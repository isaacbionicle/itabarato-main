<?php 

function producto_comprado($id_cliente,$nombre_producto,$conexion){
	
	$nombre_producto=utf8_encode($nombre_producto);
	$sql="SELECT producto,id_cliente FROM pedidos WHERE producto='$nombre_producto' AND id_cliente='$id_cliente'";
	$registros=mysqli_query($conexion,$sql);
	if(mysqli_num_rows($registros)>=1)
		return true;
	else
		return false;
	
}

function valoracion_repetida($id_cliente,$id_producto,$conexion){
	
	$sql="SELECT id_comentario FROM comentarios WHERE id_cliente='$id_cliente' AND id_producto='$id_producto'";
	$registros=mysqli_query($conexion,$sql);
	if(mysqli_num_rows($registros)==1)
		return true;
	else
		return false;

}

function contar_caracteres($string){
	
	$array=str_split($string);
	return count($array);
	
}

function valoracion_media($id_producto,$conexion){
	
	$sql="SELECT AVG(puntuacion) AS media FROM comentarios WHERE id_producto='$id_producto'";
	$registro=mysqli_query($conexion,$sql);
	$fila=mysqli_fetch_array($registro);
	echo round($fila["media"],2);

}

?>
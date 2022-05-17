<?php 

$conexion=mysqli_connect("localhost","root","");

if (!$conexion){// si conexion es igual a false
	
	die ("Error de conexión ".mysqli_error($conexion));/*mostrar el error y con  mysqli_error($conexion)  mostraremos el ipo de error */
	
	}
	
mysqli_select_db($conexion,"prueba") or die ("Error al conectar con la base de datos ".mysqli_error($conexion));
// se selecciona la base de datos             y si no se celecciona mostrara un error con la base de datos
function cerrarconexion(){
	
	mysqli_close($GLOBALS['conexion']); // para cerrar la concexion a la bd
	
	
	}

?>
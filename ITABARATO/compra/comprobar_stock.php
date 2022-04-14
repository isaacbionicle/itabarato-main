<?php 
session_start();
include("../php/conexion.php");

$id_producto=$_POST["id_producto"];
$cantidad_producto=$_POST["cantidad_producto"];

if(isset($_SESSION["mi_carrito"])){
	
	for($i=0;$i<count($_SESSION['mi_carrito']);$i++){
		
		if($id_producto==$_SESSION["mi_carrito"][$i]["id_producto"]){
			
			$cantidad_producto=$_SESSION["mi_carrito"][$i]["cantidad"] + $_POST["cantidad_producto"];
			
		}
		
	}

}

$sql1="SELECT cantidad FROM productos WHERE id_producto='$id_producto'";
$registro=mysqli_query($conexion,$sql1);
$fila=mysqli_fetch_array($registro);


if($fila["cantidad"]>=$cantidad_producto || $fila["cantidad"]==-1) echo "exito";
cerrarconexion();

?>
<?php 
session_start();

// nuevo
if(isset($_SESSION["pago"]) && $_SESSION["pago"]=="Paypal") {
	unset($_SESSION["pago"]);
	header("location:PayPal-PHP-SDK/paypal/rest-api-sdk-php/sample/payments/AuthorizePaymentUsingPayPal.php");
	exit();

}

if(!isset($_SESSION["pago"])) $_SESSION["pago"]="Paypal";
// nuevo

if(!isset($_SESSION["nombre_cliente"])) {
	if(!isset($_COOKIE["nombre_cliente"])){
		header("location:../../clientes/form_registro_clientes.php");
	}
}

if(!isset($_SESSION["mi_carrito"]))
	header("location:../../index.php");

include("../../php/conexion.php");

$registros=mysqli_query($conexion,"SELECT pedido FROM pedidos WHERE pedido=(SELECT MAX(pedido) FROM pedidos)") or die ("problemas"); 

	if(mysqli_num_rows($registros)==0){
		
		$pedido=1;
		
	
	}
	
	else {
		
		$fila=mysqli_fetch_array($registros);
		$pedido=$fila["pedido"]+1;
		
	}

for($i=0;$i<count($_SESSION["mi_carrito"]);$i++){
	
	
	$producto= utf8_decode($_SESSION["mi_carrito"][$i]["nombre"]);
	$cantidad= $_SESSION["mi_carrito"][$i]["cantidad"];
	$precio= $_SESSION["mi_carrito"][$i]["precio"];
	
		if(isset($_SESSION["id_cliente"]))
			$id_cliente=$_SESSION["id_cliente"];
			
		if(isset($_COOKIE["id_cliente"]))
			$id_cliente=$_COOKIE["id_cliente"];
	
	
	mysqli_query($conexion,"INSERT INTO pedidos (pedido,producto,cantidad,precio_producto,id_cliente) VALUES('$pedido','$producto','$cantidad','$precio','$id_cliente')");
	
}

$total_pedido=$_SESSION["total"];
$pago=$_SESSION["pago"];
	
		if(isset($_SESSION['envio']))
			$envio=1;
			
		else
			$envio=0;

mysqli_query($conexion,"INSERT INTO pedidos2 (total_pedido,envio,pago,pedido) VALUES('$total_pedido',$envio,'$pago','$pedido')");

//----------------------- stock -------------------------------//

for($i=0;$i<count($_SESSION["mi_carrito"]);$i++){
	
	
	$id_producto= $_SESSION["mi_carrito"][$i]["id_producto"];
	$sql1="SELECT cantidad FROM productos WHERE id_producto='$id_producto'";
	$registros2=mysqli_query($conexion,$sql1);
	$fila2=mysqli_fetch_array($registros2);
	
	if($fila2["cantidad"]!=-1){
		
		$cantidad=$fila2["cantidad"]-$_SESSION["mi_carrito"][$i]["cantidad"];
		if($cantidad < 0) $cantidad=0;
		$sql2="UPDATE productos SET cantidad='$cantidad' WHERE id_producto='$id_producto'";
		mysqli_query($conexion,$sql2);
		
		// enviar email de productos agotados 
		
		// interruptor
		$sql12="SELECT estado FROM interruptor_stock";
		$registro3=mysqli_query($conexion,$sql12);
		$fila3=mysqli_fetch_array($registro3);
		if($fila3["estado"]==1 && $cantidad==0){
		// interruptor
		
			$to = "itabarato@outlook.es";
			$subject = "Rotura de stock para :".$_SESSION["mi_carrito"][$i]["nombre"];
			$message = "Rotura de stock para :".$_SESSION["mi_carrito"][$i]["nombre"];
			mail($to, $subject, $message);
		
		// interruptor
		}
		// interruptor
			
		// enviar email de productos agotados
		
	}
		
	
	
}

//----------------------- stock -------------------------------//


unset($_SESSION["mi_carrito"]);
if(isset($_SESSION["envio"]))
	unset($_SESSION["envio"]);
unset($_SESSION["pago"]);
unset($_SESSION["total"]);
unset($_SESSION["total_iva"]);

cerrarconexion();

header('Location: ../../index.php?compra_realizada');

?>
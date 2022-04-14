<?php 
session_start();
include("../../php/conexion.php");
include("../../pdf/fpdf.php");
if(isset($_COOKIE["id_cliente"])){

	$_SESSION["id_cliente"]=$_COOKIE["id_cliente"];	
	
}

if(isset($_SESSION["id_cliente"]) && isset($_GET["pedido"])){
	
	$registros1=mysqli_query($conexion,"SELECT pedido,producto,cantidad,precio_producto FROM pedidos WHERE pedido='$_GET[pedido]'");
	$registros2=mysqli_query($conexion,"SELECT * FROM pedidos2 WHERE pedido='$_GET[pedido]'");
	$fila2=mysqli_fetch_array($registros2);
	$registros3=mysqli_query($conexion,"SELECT nombre,apellidos,direccion,cp,estado FROM clientes WHERE id_cliente='$_SESSION[id_cliente]'");
	$fila3=mysqli_fetch_array($registros3);
	
	$pdf=new FPDF("P","pt","A4");
	$pdf->AddPage();
	$pdf->SetFont("Times","B",25);
	$pdf->SetTextColor(0,102,255);
	$pdf->Cell(0,26,"Tienda ITA BARATO.",0,0,"L");
	
	
	$pdf->SetXY(30,75);
	$pdf->SetFont("Times","",12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(0,13,"Calle Morelo #120",0,2,"L");
	$pdf->Cell(0,13,"Aguascalientes Ags, Mexico (20299)",0,0,"L");
	
	
	$pdf->image("../../imagenes/logotipo.png",430,5,140,120,"png");
	
	$pdf->SetDrawColor(0,102,255);
	$pdf->Line(20,160,575,160);
	$pdf->Line(20,160.5,575,160.5);
	
	$pdf->SetXY(30,185);
	$pdf->SetFont("Times","B",12);
	$pdf->SetTextColor(0,102,255);
	$pdf->Cell(280,13,"Facturar a",0,0,"L");
	$pdf->Cell(95,13,"Fecha:",0,0,"L");
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont("Times","",12);
	$pdf->Cell(0,13,$fila2["fecha_pedido"],0,1,"L");
	
	$pdf->SetXY(30,210);
	$pdf->SetFont("Times","",12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(280,13,utf8_encode($fila3["nombre"])." ".utf8_encode($fila3["apellidos"]),0,0,"L");
	$pdf->SetTextColor(0,102,255);
	$pdf->SetFont("Times","B",12);
	$pdf->Cell(95,13,"Numero Factura:",0,0,"L");
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont("Times","",12);
	$pdf->Cell(0,13,$fila2["pedido"],0,1,"L");
	
	$pdf->SetXY(30,235);
	$pdf->SetFont("Times","",12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(280,13,utf8_encode($fila3["estado"]).", C/".utf8_encode($fila3["direccion"])." (".$fila3["cp"].")",0,0,"L");
	$pdf->SetTextColor(0,102,255);
	$pdf->SetFont("Times","B",12);
	$pdf->Cell(95,13,"Numero Pedido:",0,0,"L");
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont("Times","",12);
	$pdf->Cell(0,13,$fila2["pedido"],0,1,"L");
	
	$pdf->SetXY(30,285);
	$pdf->SetFont("Times","",12);
	$pdf->SetFillColor(0,102,255);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(60,30,"Cantidad",1,0,"C",true);
	$pdf->Cell(270,30,utf8_decode("Descripción"),1,0,"C",true);
	$pdf->Cell(105,30,"Precio Unitario",1,0,"C",true);
	$pdf->Cell(105,30,"Importe",1,1,"C",true);
	
	while($fila1=mysqli_fetch_array($registros1)){
		$pdf->SetX(30);
		$pdf->SetFont("Times","",9);
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(60,30,$fila1["cantidad"],1,0,"C");
		$pdf->Cell(270,30,utf8_decode($fila1["producto"]),1,0,"C");
		$pdf->Cell(105,30,$fila1["precio_producto"],1,0,"C");
		$pdf->Cell(105,30,($fila1["cantidad"]*$fila1["precio_producto"]),1,1,"C");
	}
	
	if($fila2["envio"]==true){
		
		$pdf->SetX(30);
		$pdf->SetFont("Times","",9);
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(60,30,1,1,0,"C");
		$pdf->Cell(270,30,"Envio",1,0,"C");
		$pdf->Cell(105,30,2.48,1,0,"C");
		$pdf->Cell(105,30,(1*2.48),1,1,"C");
	
	}
	
	$pdf->SetFont("Times","",11);
	$pdf->Cell(450,20,"",0,1,"R");
	$pdf->Cell(450,20,"Subtotal:",0,0,"R");
	$pdf->Cell(80,20,"$".$fila2["total_pedido"],0,1,"L");
	
	$pdf->Cell(450,20,"I.V.A. 16%:",0,0,"R");
	$pdf->Cell(80,20,"$".round((($fila2["total_pedido"]*16)/(100))*100)/(100),0,1,"L");
	
	$pdf->Cell(450,20,"TOTAL:",0,0,"R");
	$pdf->Cell(80,20,"$".round((($fila2["total_pedido"])+($fila2["total_pedido"]*16)/(100))*100)/(100),0,0,"L");
	
	$pdf->SetXY(30,773);
	$pdf->SetFont("Times","U",12);
	$pdf->SetTextColor(0,102,255);
	$pdf->Cell(85,12,"Forma de Pago:",0,0,"L");
	$pdf->SetFont("Times","B",12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(190,12,$fila2["pago"],0,0,"L");
	$pdf->Output("factura.pdf","I");
	
	
	
	
}

else header("location:../../index.php");
cerrarconexion();
?>
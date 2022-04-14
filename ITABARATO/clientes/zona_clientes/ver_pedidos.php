<?php
session_start();
include("../../php/conexion.php");
sleep(1);
if(isset($_COOKIE["id_cliente"])){

	$_SESSION["id_cliente"]=$_COOKIE["id_cliente"];	
	
}

if(isset($_SESSION["id_cliente"])){
	
	$registros1=mysqli_query($conexion,"SELECT pedido FROM pedidos WHERE id_cliente='$_SESSION[id_cliente]' GROUP BY pedido DESC");
	echo "<div style='margin:60px auto 0px auto; max-width:700px'>";
    echo "<div id='accordion'>";
    
	while($fila1=mysqli_fetch_array($registros1)){
	
		echo "<h3><br><br>Número de pedido: ".$fila1["pedido"]."<br></h3>";	

		$registros2=mysqli_query($conexion,"SELECT pedido,producto,cantidad,precio_producto FROM pedidos WHERE pedido='$fila1[pedido]'");

		?>
        <div>
        <table class="table table-hover">
    		<tr class="info">
        		<td style="text-decoration: underline; font-weight:bold">
            		Nombre
            	</td>
            	<td style="text-decoration: underline; font-weight:bold">
            		Precio
            	</td>
            	<td style="text-decoration: underline; font-weight:bold">
            		Cantidad
            	</td>
        	</tr>
        
        
        <?php
		
		while($fila2=mysqli_fetch_array($registros2)){
			
			
			 ?>
        		<tr class="warning">
		 			<td><?php echo $fila2["producto"]; ?>
         			</td>
         			<td><?php echo $fila2["precio_producto"]; ?>
         			</td>
         			<td><?php echo $fila2["cantidad"]; ?>
         			</td> 
        		</tr> 
        
			<?php		
		}
		
		$registros3=mysqli_query($conexion,"SELECT * FROM pedidos2 WHERE pedido='$fila1[pedido]'");
		$fila3=mysqli_fetch_array($registros3);
			if($fila3["envio"]==1){
			
				?>
				<tr class="danger"><td>Envío</td><td>2.48</td><td>1</td></tr>
				<?php
			
			}
		
				?>
				<tr class="danger"><td>Forma de Pago: <?php echo $fila3["pago"]; ?>			</td><td>0</td><td>1</td></tr>
                
                <tr ><td></td><td></td><td></td></tr>
                
                <tr class="success"><td>Fecha pedido: <?php echo $fila3["fecha_pedido"]; ?></td><td></td><td></td></tr>
                
                <tr class="info"><td>Estado pedido: <?php if($fila3["estado"]==0) echo "Preparación en curso"; else if($fila3["estado"]==1) echo "Enviado"; else echo "Entregado"; ?></td><td></td><td></td></tr>
                
     		</table>
     		
			<?php
			
				echo "<div style='float:right'>";
				
					echo "$".$fila3["total_pedido"]." Pesos Mexicanos (Sin IVA)</br>";
					echo "--------------------------------------------</br>";
					echo "+ 16% de IVA</br>";
					echo "--------------------------------------------</br>";
					$total_iva=(($fila3["total_pedido"]*16)/100)+$fila3["total_pedido"];
					$total_iva=round($total_iva * 100)/100;
					echo "Total: $".$total_iva."";
					
				echo "</div>";
				
				echo "<div>";
					
					echo "<a target='_blank' href='ver_factura.php?pedido=$fila1[pedido]'><img src='../../imagenes/pdf.png' alt='Descargar factura' width='80px'></a>";
					
				echo "</div>";
		?>
        	</div>
		
    	<?php
				
	}		
	echo "</div>";
	echo "</div>";
}	
cerrarconexion();		
?>
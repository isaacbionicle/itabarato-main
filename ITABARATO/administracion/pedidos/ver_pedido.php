<?php 
session_start();
if (!isset($_SESSION['administrador'])) header('location:../index.html');
include('../../php/conexion.php');
$registros1=mysqli_query($conexion,"SELECT producto,cantidad,precio_producto FROM pedidos WHERE pedido='$_POST[pedido]'");
$registros2=mysqli_query($conexion,"SELECT total_pedido,envio,pago FROM pedidos2 WHERE pedido='$_POST[pedido]'");
$registros3=mysqli_query($conexion,"SELECT nombre,apellidos,direccion,cp,estado FROM clientes WHERE id_cliente='$_POST[id_cliente]'");
$fila3=mysqli_fetch_array($registros3);
echo "Nombre: <strong>".$fila3["nombre"]." ".$fila3["apellidos"]."</strong><br>";
echo "Dirección: C/ <strong>".$fila3["direccion"].", ".$fila3["estado"]." (".$fila3["cp"].")</strong><br><br>"
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
		
		while($fila1=mysqli_fetch_array($registros1)){
			
			
			 ?>
        		<tr class="active">
		 			<td><?php echo $fila1["producto"]; ?>
         			</td>
         			<td><?php echo $fila1["precio_producto"]; ?>
         			</td>
         			<td><?php echo $fila1["cantidad"]; ?>
         			</td> 
        		</tr> 
        
			<?php		
		}
		
		$fila2=mysqli_fetch_array($registros2);
			if($fila2["envio"]==1){
			
				?>
				<tr class="active"><td>Envío</td><td>2.48</td><td>1</td></tr>
				<?php
			
			}
		
				?>
				<tr class="active"><td>Forma de Pago: <?php echo $fila2["pago"]; ?>			</td><td>0</td><td>1</td></tr>
                
                <tr ><td></td><td></td><td></td></tr>
                
               
                
     		</table>
     		
			<?php
			
				echo "<div style='float:right'>";
				
					echo $fila2["total_pedido"]." $ (Sin IVA)</br>";
					echo "--------------------------------------------</br>";
					echo "+ 16% de IVA</br>";
					echo "--------------------------------------------</br>";
					$total_iva=(($fila2["total_pedido"]*16)/100)+$fila2["total_pedido"];
					$total_iva=round($total_iva * 100)/100;
					echo "Total: $".$total_iva."";
					
				echo "</div>";

?>
</div>
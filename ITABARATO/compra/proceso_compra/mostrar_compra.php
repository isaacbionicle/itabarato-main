<?php 
session_start();
if(isset($_SESSION['mi_carrito']) && !empty($_SESSION['mi_carrito'])){
?>
	<table class="table table-hover">
    	<tr class="danger">
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
		
	for($i=0;$i<count($_SESSION['mi_carrito']);$i++){
		
?>
		
        <tr class="success" id="<?php echo $i; ?>">
		 <td><?php echo utf8_decode($_SESSION["mi_carrito"][$i]["nombre"]); ?>
         </td>
         <td><?php echo $_SESSION["mi_carrito"][$i]["precio"]; ?>
         </td>
         <td><?php echo $_SESSION["mi_carrito"][$i]["cantidad"]; ?>
         </td>
         <td>
         <a onclick="eliminar_producto(<?php echo $i; ?>)"><img width='25px' src='../cerrar.png'></a>
         </td>
         <td id="<?php echo "n".$i; ?>" style="display:none">
         <img width='25px' src='../cargando.gif'>
         </td> 
        </tr> 
        
<?php		
	}
	if(isset($_SESSION["envio"])){
?>
		<tr class="success"><td>Envío</td><td>100</td><td>1</td></tr>
<?php
	}
	if(isset($_SESSION["pago"])){
?>
		<tr class="success"><td>Forma de Pago: <?php echo $_SESSION["pago"]; ?></td><td>0</td><td>1</td></tr>
        
<?php
	}
?>
     </table>
     
<?php

	echo "".$_SESSION['total']." $ (Sin IVA)</br>";
	echo "--------------------------------------------</br>";
	echo "+ 16% de IVA</br>";
	echo "--------------------------------------------</br>";
	$_SESSION['total_iva']=(($_SESSION['total']*16)/100)+$_SESSION['total'];
	$_SESSION['total_iva']=round($_SESSION['total_iva'] * 100)/100;
	echo "Total: $".$_SESSION['total_iva'];
	
}

else echo "Carrito vacio";
?>
<?php
session_start(); 
$repetido="no";
	

	//Aqui metemos un producto al carrito a la session que se encuentre el ususario

if(isset($_POST["precio_producto"])){// $_POST["precio_producto"]) da lo mismo si ponemos nomnre producto ,etc 
	
	//total  de un produto por la cantidad ingresada 
	$total=$_POST["precio_producto"]*$_POST["cantidad_producto"];
	
	if(isset($_SESSION['total'])){//CUANDO COMPRARMO MAS DE UN PRODUCTO AQUI ENTRA PARA LA SUMA DEL TOTAL
	//suma de los totales de los productos
		$_SESSION['total']=$total+$_SESSION['total'];
	
	}
	
	else{//COMO AL INICIO NO EXISTE LA SESSION TOTAL ENTRA AQUI (PRIMER PRODUCTO ) PARA CREARLA Y ASIGNAR EL TOTAL
	
		$_SESSION['total']=$total;
	
	}
	
	//ESTA PARTE DEL CODIGO ES PARA ACUMULAR PRODUCTOS EXISTENETES EN EL CARRITO ES DECIR SI YA HABIAMOS AñADIDO UN PRODUTO
	//ANTERIORMENTE Y AñADIMOS OTRO DEL MISMO SE DEBE ACUMULAR LA CANTIDAD

	if(isset($_SESSION['mi_carrito'])){//si el carrito existe es decir que existe almenos un producto en el carrito
	
		for($i=0;$i<count($_SESSION['mi_carrito']);$i++){//reccoreemos el arrrye para mostrar los productos
	
			if($_SESSION['mi_carrito'][$i]["nombre"]==utf8_encode($_POST["nombre_producto"])){//SI ENCONTRAMOS UN PRODUCTO QUE SEA
				//EL MISMO AL QUE VAMOS AÑADIR SOLO VAMOS AA SUMAR LA CANTIDAD DEL PRODUCTO
		
				//AÑADIMOS LA NUEVA CANTIDAD DEL PRODUCUTO AL LA QUE YA TENIAMOS ANTERIORMENTE 
				$_SESSION['mi_carrito'][$i]["cantidad"]=$_SESSION['mi_carrito'][$i]["cantidad"]+$_POST["cantidad_producto"];
				
				//MARCAMOS QUE YA EXISTE ESTO NOS SIRVE  PARA QUE NOS HAGA LO SIGUIENTE IF  (if($repetido=="no") ES PARA QUE NO SE
				//AñADA AL ARRAY COMO YA LO TENEMOS EN EL CARRITO ANTERIOREMENTE
				$repetido="si";
			}

		}
	}
	//en caso de que no este ya en el carrito el producto
	if($repetido=="no"){
///Agreagmos un prodcuto a la session actual  y vamos a meter el nombre del produtcto,precio del producto,cantidad,y la id (que no se va a mostrar)
	$_SESSION["mi_carrito"][]=array("nombre"=>utf8_encode($_POST["nombre_producto"]),"precio"=>$_POST["precio_producto"],"cantidad"=>$_POST["cantidad_producto"],"id_producto"=>$_POST["id_producto"]);
	
	}
	
	

}

if(isset($_SESSION['mi_carrito']) && !empty($_SESSION['mi_carrito'])){ //Si el carrito no esta vacio
?>

<!-- Tabla de los productos en el carrito-->
    <!-- class="table table-hover" boostrap -->
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
		
		//Mostrara los productos  del carrito
	for($i=0;$i<count($_SESSION['mi_carrito']);$i++){
		
?>
		
        <tr class="success" id="<?php echo $i; ?>">
        <!--Muestra en este caso el nombre en los demas succede el mismo proceso -->
		 <td><?php echo utf8_decode($_SESSION["mi_carrito"][$i]["nombre"]); ?>
         </td>
         <td><?php echo $_SESSION["mi_carrito"][$i]["precio"]; ?>
         </td>
         <td><?php echo $_SESSION["mi_carrito"][$i]["cantidad"]; ?>
         </td>
         <td>

         <!--Eliminar el producto del carrito mandamos la pocicion del producto dentro del array al metodo eliminar_producto -->
         <a onclick="eliminar_producto(<?php echo $i; ?>)"><img width='25px' src='compra/cerrar.png'></a>
         </td>
         <td id="<?php echo "n".$i; ?>" style="display:none">
         	
         <img width='25px' src='compra/cargando.gif'>
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

	echo "".$_SESSION['total']." Pesos (Sin IVA)</br>";
	echo "--------------------------------------------</br>";
	echo "+ 16% de IVA</br>";
	echo "--------------------------------------------</br>";
	$_SESSION['total_iva']=(($_SESSION['total']*16)/100)+$_SESSION['total'];
	$_SESSION['total_iva']=round($_SESSION['total_iva'] * 100)/100;
	echo "Total: $".$_SESSION['total_iva'];
?>
	<div style="margin-top:10px; margin-bottom:10px">
    <a href="compra/proceso_compra/proceso_compra.php">
    <button type="button" class="btn btn-warning">Finalizar</button>
    </a>
    </div>
<?php
}
//carrito vacio
else echo "Carrito vacio";


?>

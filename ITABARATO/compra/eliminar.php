<?php 
session_start();
sleep(2); //dormir 2 segundos para la imagen de carga tenga un efecto 
//["precio"]*$_SESSION["mi_carrito"][$_GET["indice"]]["cantidad"] es para recoger el total del producto
$restar=$_SESSION["mi_carrito"][$_GET["indice"]]["precio"]*$_SESSION["mi_carrito"][$_GET["indice"]]["cantidad"];


//aqui restamos el total del producto a eliminar del total que tenemos del total de carrito
$_SESSION['total']=$_SESSION['total']-$restar;


//unset($_SESSION["mi_carrito"][$_GET["indice"]]); 
/* ELIMINA EL CONTENIDO DEL ARRAY EN ESA POSICION LO MALO ESQUE AL RECORRER EL ARRAY MUESTRA UN ERROR PORQUE EN ESA POSICCION YA NO SE ENCUENTRA NADA (NULL) POR ELLO SE USO LO SIG*/
array_splice($_SESSION["mi_carrito"], $_GET["indice"], 1);/*CON ESTA ES QUE ELIMINA POR COMPLETO LA FILA Y ESTO HACE QUE LOS DEMAS QUE ESTEN ADELANTE SE MUEVA HACIA ATRAS ES DECIR SI ELIMANAMOS LA POCICION 3 EL 4 SE CONVERTIRA LA POSICION 3 Y EL 5 EN LA 4 Y ASI SUSECIVAMENTE*/  
/*$_SESSION["mi_carrito"], $_GET["indice"], 1  los parametros son el carrito en el indice  y en 1 es para elimnar la fila en esa posicion */ 
?>
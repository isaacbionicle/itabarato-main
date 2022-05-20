<?php 
session_start();
if (!isset($_SESSION['administrador'])) header('location:../index.html');
include('../../php/conexion.php');
$registros1=mysqli_query($conexion,"SELECT pedido FROM pedidos2");

//paginador
 $numero_total_registros=mysqli_num_rows($registros1);
 $TAMANO_PAGINA = 8;
        $pagina = false;

        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
	if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	}
	else {
		$inicio = ($pagina - 1) * $TAMANO_PAGINA;
	}
	$total_paginas = ceil($numero_total_registros / $TAMANO_PAGINA);
$registros2=mysqli_query($conexion,"SELECT fecha_pedido,estado,pedido FROM pedidos2 ORDER BY pedido DESC LIMIT ".$inicio."," .$TAMANO_PAGINA) or die ("Error al conectar con la tabla".mysql_error($conexion));
 // paginador

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administración: Estadistica</title>

<link rel="stylesheet" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/normalizar.css">
<link rel="stylesheet" href="../administracion.css">
<link rel="stylesheet" href="../../css/animate.css">

<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>

<!-- Start css3menu.com HEAD section -->
<link rel="stylesheet" href="../css.css">
<!-- End css3menu.com HEAD section -->

<!-- bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../javascript/bootstrap.min.js"></script>
<!-- bootstrap -->


<script>
$(function(){
	
	$.ajax({
		
			url:"ver_mensaje.php",
			
			success:function(respuesta){
				
				$("#respuesta").html(respuesta);
			
			}	
			
	});
	
});
setInterval("mostrar_mensaje()",3900);
function mostrar_mensaje(){
	$.ajax({
		
			
			url:"ver_mensaje.php",
			
			success:function(respuesta){
				
				
				$("#respuesta").html(respuesta);
			
			
			}	
			
	});
}

</script>

</head>
<body>

<!-- Start css3menu.com BODY section -->
<input class="menu-icon" type="checkbox" id="menu-icon" name="menu-icon"/>
  	<label for="menu-icon"></label>
  	<nav class="nav"> 		
  		<ul class="pt-5">
  			<li><a href="../pedidos/ver_pedidos.php">Pedidos</a></li>
  			<li><a href="../productos/mostrarproductos.php">Productos</a></li>
  			<li><a href="../productos/formaniadirproductos.php">Añadir productos</a></li>
			<li><a href="../categorias/formaniadircategorias.php">Categorias</a></li>
			<li><a href="../clientes/">Clientes</a></li>
			<li><a href="../pedidos/ver_estadistica.php">Estadisticas</a></li>
			<li><a href="../comentarios/mostrar_comentarios.php">Comentarios</a></li>
  		</ul>
  	</nav>

  	<div class="section-center">
  		
  	</div>
<!-- End css3menu.com BODY section -->


<div class="tcat"><strong>ESTADISTICA</strong></div>
<div class="mostrarcat">
<div id="respuesta"></div>
<form method="post" action="actualizar_pedidos.php">
	<div style="margin-bottom:15px; float:right">
    	<div style="float:left">
			
 			
			</select>
            <input type="hidden" name="tamano_pagina" value="<?php echo $TAMANO_PAGINA; ?>">
<input type="hidden" name="pagina" value="<?php echo $pagina; ?>">
        </div>

	</div>

<table class="table table-hover">
<tr>

</tr>

<?php
while($fila2=mysqli_fetch_array($registros2)){
	
	$registros3=mysqli_query($conexion,"SELECT id_cliente FROM pedidos WHERE pedido='$fila2[pedido]'");
	$fila3=mysqli_fetch_array($registros3);
	$registros4=mysqli_query($conexion,"SELECT nombre,apellidos FROM clientes WHERE id_cliente='$fila3[id_cliente]'");
	$fila4=mysqli_fetch_array($registros4);		
?>
   <tr class="active">
  

        <?php


        if($fila2["estado"]==0){
		?>
        	<td>

            </td>
        <?php
		}
        if($fila2["estado"]==1){
		?>
    		<td>
<!-- EST -->
<center><p style="height:70px;line-height:70px;" >Venta Mouses</p></center>
<center><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi1IZEJuJ7SPtFmJ7jYbE-n1xLv3lEkMBv4d8dh-N9bUHiqysiL0pyscper1jzB0_zel6aICXugeidSQ0OtX-eEyr2B4VBYbNCdTG9qWHH5S5umpia4-YfXLiqsDne-EJf-L6TzWYre_PIz5IyPCwNjLwiwlKGtgwnzENCvazv8RACiM2wiqXvAIUe4/s424/Sin%20título-3.jpg" ></center>
<center><p></p></center>
<center><p style="height:70px;line-height:70px;" >Venta Impresoras</p></center>
<center><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgnxduIZqurVmE-w3bMv3oYkWmH0RaceM7_r_Rfyljr_lD3jAeRPp0J5uM4vdL5-Rxr5zhQZnIa7WXBPWSPmAbDf6nxsGirJtUi4nTwlCAvS034mN1jzrUPfjRv7RicLu66c1PfMzZZP4eEmE0XjkOZXGcDjM8qTwRw4YKwcvQm0dVcVIFUKS4Oj0y_/s424/Sin%20título-1.jpg" ></center>
<center><p></p></center>
<center><p style="height:70px;line-height:70px;" >Venta Teclados</p></center>
<center><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgni6qxVDXVQmSkWXJ6WgNfyndpJ7lVQ5JwbTIqYF_fE3FD2R4IBQ3fxGg8CSnUT7jAAnhlqAUDS4nJQOf3zS_nfqdueEiIfC_uSfO5Zo7KNeJ_J6pWBmQvZaUtzeTdGa9R1Suq2ZaZeg5xFN6EjzPAZ6Z2xejX1A9pf0c8K-vfOYstwUUx6gzTShm2/s424/Sin%20título-2.jpg" ></center>
<center><p></p></center>
<center><p style="height:70px;line-height:70px;" >Venta Portatiles</p></center>
<center><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgyHDxAcC0AZZpwC3USPFlhlSgchPSrgJphF07h7cAMpXpHPCOSIBoX8XZeYRBODBVoORSFWI7pCanTY5gmKvB4kN23XQ7at7d2UarIYtVdADxPcuVt1KJwUSTFDAxzGoB9PrSCjDq_nwsiisNjUsYqnIGt98b8xxZITbQUD1ddSsWE8IPXvyFIEaWf/s424/Sin%20título-4.jpg" ></center>

<!-- EST F -->
                </div>
            </td>
        <?php
		}
        if($fila2["estado"]==2){
		?>
    		<td>
            	
                </div>
            </td>
        <?php
		}
		?>
        
    </tr>


<?php
}
cerrarconexion();
?>
</table>
</form>
</div>

<div class="centrar-pag">
<nav>
  <ul class="pagination"> 
<?php 

if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<li><a href="ver_pedidos.php?pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				
				echo '<li><a href="#"><div class="color-pag">'.$pagina.'</div></a></li>';
			else
				
				echo ' <li><a href="ver_pedidos.php?pagina='.$i.'">'.$i.'</a></li> ';
		}
		if ($pagina != $total_paginas)
			echo '<li><a href="ver_pedidos.php?pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	}
	echo '</p>';


?>
	</ul>
</nav>
</div>
<footer><p>Todos los derechos reservados ITA BARATO</p></footer>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle Pedido</h4>
      </div>
      <div class="modal-body">
      	<div id="div-results"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="pedido.js"></script>
</body>
</html>
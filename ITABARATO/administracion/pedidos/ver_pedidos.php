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
<title>Administración: Zona pedidos</title>

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
			<li><a href="../comentarios/mostrar_comentarios.php">Comentarios</a></li>
  		</ul>
  	</nav>

  	<div class="section-center">
  		
  	</div>
<!-- End css3menu.com BODY section -->


<div class="tcat"><strong>PEDIDOS</strong></div>
<div class="mostrarcat">
<div id="respuesta"></div>
<form method="post" action="actualizar_pedidos.php">
	<div style="margin-bottom:15px; float:right">
    	<div style="float:left">
			<select name="select" class="form-control">
 				<option value="0" selected>Preparación en Curso</option> 
  				<option value="1">Enviado</option>
  				<option value="2">Entregado</option>
			</select>
            <input type="hidden" name="tamano_pagina" value="<?php echo $TAMANO_PAGINA; ?>">
<input type="hidden" name="pagina" value="<?php echo $pagina; ?>">
        </div>
        <div style="float:left; margin-left:10px">
        	<button type="submit" class="btn btn-danger">Actualizar</button>
        </div>
	</div>

<table class="table table-hover">
<tr>
	<td></td>
	<td><b>Nº Pedido</b></td>
    <td><b>Cliente</b></td>
    <td><b>Fecha</b></td>
    <td><b>Detalles</b></td>
    <td><b>Estado</b></td>
    
</tr>

<?php
while($fila2=mysqli_fetch_array($registros2)){
	
	$registros3=mysqli_query($conexion,"SELECT id_cliente FROM pedidos WHERE pedido='$fila2[pedido]'");
	$fila3=mysqli_fetch_array($registros3);
	$registros4=mysqli_query($conexion,"SELECT nombre,apellidos FROM clientes WHERE id_cliente='$fila3[id_cliente]'");
	$fila4=mysqli_fetch_array($registros4);		
?>
   <tr class="active">
   	  
   	  <!-- casilla de peido-->
   		<td><input type="checkbox" name="<?php echo $fila2["pedido"]; ?>" value="<?php echo $fila2["pedido"]; ?>"></td>
    
<!-- pedido-->
    	<td><?php echo $fila2["pedido"]; ?></td>
    <!--cliente -->
        <td><?php echo $fila4["nombre"]." ".$fila4["apellidos"]; ?></td>
    <!--fecha de pedido -->
        <td><?php echo $fila2["fecha_pedido"]; ?></td>
    <!-- Detalle-->
   <td><button style="font-size:12px" onclick="ventana('<?php echo $fila3["id_cliente"]; ?>','<?php echo $fila2["pedido"]; ?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Ver</button></td>
        

        <?php


        if($fila2["estado"]==0){
		?>
        	<td>
            	<div style="background-color: #F69; width:170px; padding:4px; border:1px dashed #333333; border-radius:3px; color:#FFF; font-size:11px ">		       				Preparación en Curso..
                </div>
            </td>
        <?php
		}
        if($fila2["estado"]==1){
		?>
    		<td>
            	<div style="background-color: #F93; width:75px; padding:4px; border:1px dashed #333333; border-radius:3px; color:#FFF; font-size:11px ">		 					Enviado..
                </div>
            </td>
        <?php
		}
        if($fila2["estado"]==2){
		?>
    		<td>
            	<div style="background-color: #093; width:120px; padding:4px; border:1px dashed #333333; border-radius:3px; color:#FFF; font-size:11px ">
            		Entregado.
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
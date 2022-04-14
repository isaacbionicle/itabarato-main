<?php
if(isset($_GET["enviado"])){
?>
<script>
$(function(){
	
	alert("Comentario añadido correctamente");

});
</script>

<?php
}
if(isset($_GET["eliminado"])){
?>
<script>
$(function(){
	
	alert("Comentario eliminado correctamente");

});
</script>
<?php
}

$id_producto=$_GET['id_producto'];
$id_categoria=$_GET['id_categoria']; // paginador
if(isset($_GET["ordenar"])) $ordenar=$_GET["ordenar"]; // ordenar
$sql1="SELECT * FROM comentarios WHERE id_producto='$_GET[id_producto]'";
$registros7=mysqli_query($conexion,$sql1);
if(mysqli_num_rows($registros7)>=1){
	
	// paginador
	$numero_total_registros=mysqli_num_rows($registros7);
	$TAMANO_PAGINA = 5;
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
	
	$registros9=mysqli_query($conexion,"SELECT * FROM comentarios WHERE 	id_producto='$_GET[id_producto]' ORDER BY id_comentario DESC LIMIT ".$inicio."," .$TAMANO_PAGINA);
	
	// ordenar
	if(isset($_GET["ordenar"]) && $_GET["ordenar"]=="mas_reciente"){
	
		$registros9=mysqli_query($conexion,"SELECT * FROM comentarios WHERE 	id_producto='$_GET[id_producto]' ORDER BY id_comentario DESC LIMIT ".$inicio."," .$TAMANO_PAGINA);
	
	}
	
	if(isset($_GET["ordenar"]) && $_GET["ordenar"]=="mayor_puntuacion"){
	
		$registros9=mysqli_query($conexion,"SELECT * FROM comentarios WHERE 	id_producto='$_GET[id_producto]' ORDER BY puntuacion DESC LIMIT ".$inicio."," .$TAMANO_PAGINA);
	
	}
	
	if(isset($_GET["ordenar"]) && $_GET["ordenar"]=="menor_puntuacion"){
	
		$registros9=mysqli_query($conexion,"SELECT * FROM comentarios WHERE 	id_producto='$_GET[id_producto]' ORDER BY puntuacion ASC LIMIT ".$inicio."," .$TAMANO_PAGINA);
	
	}
	// ordenar
	// paginador

	
?>
	<div class="texto_valoraciones">VALORACIONES&nbsp;&nbsp;&nbsp;(Puntuación Media : <span style="color: #F6F"><?php valoracion_media($id_producto,$conexion); ?></span>)</div>
    
    <!-- ordenar -->
    <div class="input_ordenar">
    <form name="form1">
	<select onChange="f_ordenar('<?php echo $id_categoria; ?>','<?php echo $id_producto; ?>')" class="form-control" name="ordenar">
  	<option>Ordenar por...</option>
    <option value="mas_reciente">Ordenar por comentarios más recientes</option>
  	<option value="mayor_puntuacion">Ordenar de mayor a menor puntuación</option>
  	<option value="menor_puntuacion">Ordenar de menor a mayor puntuación</option>
	</select>
	</form>
    </div>
    <!-- ordenar -->
    
	<?php
	// aquí cambiamos $registros7 por $registros9 del paginador
	while($fila7=mysqli_fetch_array($registros9)){
	?>
    	
		<div class="main_comentarios">
		
			<div class="estrellas">
			<?php
			for($i=0;$i<$fila7["puntuacion"];$i++){
			?>
				<img width="35px" src="comentarios/imagenes/Estrella.png">
			<?php
			}
			?>
			</div>
            
            <!-- eliminar -->
            <?php
            if(isset($_SESSION["id_cliente"]) && $_SESSION["id_cliente"]==$fila7["id_cliente"]){
			?>
            	<div class="eliminar"><a href="comentarios/eliminar_comentario.php?id_cliente=<?php echo $fila7["id_cliente"]; ?>&id_producto=<?php echo $fila7["id_producto"]; ?>&id_categoria=<?php echo $fila7["id_categoria"]; ?>"><img width="25px" src="comentarios/imagenes/cerrar.png"></a></div>
            <?php
			}
			?>
            <!-- eliminar -->
            
            <div class="nombre_fecha">
			<?php echo utf8_encode($fila7["nombre"]); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha: <?php echo $fila7["fecha"]; ?>
            </div>
            <?php 
			if($fila7["url"]!=""){
			?>
            <!-- Start VideoLightBox.com BODY section -->
				<div class="videogallery">
				<a class="voverlay" href="<?php echo $fila7["url"]; ?>?autoplay=1&rel=0&enablejsapi=1&playerapiid=ytplayer"><img width="60px" src="comentarios/imagenes/play.png"></a>
				</div>
				<script src="comentarios/index_videolb/jquery.tools.min.js" type="text/javascript"></script>
				<script src="comentarios/index_videolb/videolightbox.js" type="text/javascript"></script>
				<!-- End VideoLightBox.com BODY section -->
            <?php 
			}
			?>
        	<?php 
			if($fila7["correo"]==1){
			?>
				<div class="correo">
					Para dudas referentes a este producto : 
				<?php
				$sql2="SELECT email FROM clientes WHERE id_cliente='$fila7[id_cliente]'";
				$registros8=mysqli_query($conexion,$sql2);
				$fila8=mysqli_fetch_array($registros8);
				echo "<strong>".utf8_encode($fila8["email"])."</strong>";
				?>
				</div>
        	<?php
			}
			?>
			<div class="comentario">
			<?php 
			echo utf8_encode($fila7["comentario"]);
			?>
			</div>
		</div>
        
	<?php
	}
	
// paginador
?>
<div style="margin-top:150px" class="centrar-pag">
<nav>
  <ul class="pagination"> 
<?php 

if(isset($_GET["ordenar"])){ // ordenar

if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<li><a href="detalleproducto.php?ordenar='.$ordenar.'&id_producto='.$id_producto.'&id_categoria='.$id_categoria.'&pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				
				echo '<li><a href="#"><div class="color-pag">'.$pagina.'</div></a></li>';
			else
				
				echo ' <li><a href="detalleproducto.php?ordenar='.$ordenar.'&id_producto='.$id_producto.'&id_categoria='.$id_categoria.'&pagina='.$i.'">'.$i.'</a></li> ';
		}
		if ($pagina != $total_paginas)
			echo '<li><a href="detalleproducto.php?ordenar='.$ordenar.'&id_producto='.$id_producto.'&id_categoria='.$id_categoria.'&pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	}
	echo '</p>';

} // ordenar

else{
	
if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<li><a href="detalleproducto.php?id_producto='.$id_producto.'&id_categoria='.$id_categoria.'&pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				
				echo '<li><a href="#"><div class="color-pag">'.$pagina.'</div></a></li>';
			else
				
				echo ' <li><a href="detalleproducto.php?id_producto='.$id_producto.'&id_categoria='.$id_categoria.'&pagina='.$i.'">'.$i.'</a></li> ';
		}
		if ($pagina != $total_paginas)
			echo '<li><a href="detalleproducto.php?id_producto='.$id_producto.'&id_categoria='.$id_categoria.'&pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	}
	echo '</p>';	

}
?>
	</ul>
</nav>
</div>
<?php
// paginador
	
}else{	
?>
	
    <div class="alert_rojo">
    	<div class="alert alert-danger" role="alert">
    Actualmente no existe ninguna valoración sobre este producto.
    	</div>
    </div>
	
<?php
}
?>
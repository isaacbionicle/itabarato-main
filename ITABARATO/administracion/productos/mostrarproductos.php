<?php 
session_start();
include('../../php/conexion.php');
include("funciones_productos.php");
?>

<?php if (isset($_SESSION['administrador'])){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda Online</title>


<link rel="stylesheet" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/normalizar.css">
<link rel="stylesheet" href="../administracion.css">
<link rel="stylesheet" href="interruptor_stock.css">

<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
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
function enchufe(id){
	var name=document.getElementsByName(id);
	for(var i=0;i<name.length;i++){
		
		if(name[i].checked)
		 name=name[i].value;
	
	}
	
	$.ajax({
			type:"POST",
			url:"interruptor.php",
			data:{"id_producto":id,"interruptor":name},
			
			beforeSend:function(){
				
				$("#carga").show("fast");
				
			},
			
			success:function(respuesta){
				
				$("#carga").hide("fast");
				$("#div-results2").html(respuesta);
				$("#myModal2").modal("toggle");
			
			}
			
		});
	

}
function eliminar(id){
	if(confirm("¿Confirma su eliminación?")){
		
		$.ajax({
			type:"POST",
			url:"eliminarproductos.php",
			data:'idproducto='+id
			
		});
		
		$("#"+id).hide("slow");
		
		}
	
	
	
	}

function ventana (id){
	$.ajax({
		type:"POST",
		url:"verproducto.php",
		data:'idproducto='+id,
		
		
		success: function(resp){
			
			$('#div-results').html(resp);
		
		}
	
	
	});
}

//------------------------------ stock ----------------------------------------- //
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

// interruptor

function interruptor(){
	
	$.ajax({
			
			url:"interruptor_stock.php"
			
		});

}

// interruptor
//------------------------------ stock ----------------------------------------- //

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

<!-- End css3menu.com BODY section -->

<!-- carga-->
<div class="ocultar absoluta" id="carga"><img src="../../imagenes/cargando2.gif"/></div>
<?php 
if(isset($_GET['alert'])){
?>
<div class="alert alert-success alert-dismissible" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 			    aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>Bien!</strong> El producto</strong> se ha actualizado correctamente.</p>
    </div>
<?php
}
?>
<div class="tcat"><strong>PRODUCTOS</strong></div>
<div class="mostrarcat">

<!-- interruptor -->
<?php
echo "<b>Activar / Desactivar envíos de email sobre aviso de stock.</b><br><br>";
mostrar_interruptor($conexion);
?>
<!-- interruptor -->

<?php
$total_registros=mysqli_query($conexion,"select count(*) as total from productos") or die ("Error al conectar con la tabla".mysqli_error($conexion));
$total_filas=mysqli_fetch_array($total_registros);
?>
<p class="fuente"><span class="color">Total :  </span><?php echo $total_filas['total']; ?> productos.</p>

<?php

 // paginador
 $registros0=mysqli_query($conexion,"select id_producto from productos") or die ("Error al conectar con la tabla".mysqli_error($conexion));
 $numero_total_registros=mysqli_num_rows($registros0);
 $TAMANO_PAGINA = 10;
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
$registros1=mysqli_query($conexion,"select * from productos order by nombre asc LIMIT ".$inicio."," .$TAMANO_PAGINA) or die ("Error al conectar con la tabla".mysql_error($conexion));
 // paginador
?>
 
<table class="table table-hover">
<?php
while ($fila1=mysqli_fetch_array($registros1)){
	$registros2=mysqli_query($conexion,"select nombre from imagenes where id_producto='$fila1[id_producto]' and prioridad=1");
	$fila2=mysqli_fetch_array($registros2);
?>
	<tr class="active" id="<?php echo $fila1['id_producto'];?>">
    
    <!-- --------------- stock ------------------------ --> 
        <?php 
		if($fila1["cantidad"]==-1) {
	?>
    		<td>
            <div style=" width:11px; height:11px; background-color:#6C0; border-radius:100px" data-toggle="tooltip" data-placement="top" title="<?php echo "Quedan infinitos productos"; ?>"></div>
            </td>
            
     <?php 
		}else if($fila1["cantidad"]==-2){
	?>		
    
			<td>
            <div style=" width:11px; height:11px; background-color: #999; border-radius:100px" data-toggle="tooltip" data-placement="top" title="<?php echo "Producto Desactivado"; ?>"></div>
            </td>
            
    <?php 
		}else if($fila1["cantidad"]>10 && $fila1["cantidad"]<=20){
	?>		
    
			<td>
            <div style=" width:11px; height:11px; background-color:#F90; border-radius:100px" data-toggle="tooltip" data-placement="top" title="<?php echo "Quedan ".$fila1["cantidad"]." productos"; ?>"></div>
            </td>
            
	<?php
		}else if($fila1["cantidad"]>0 && $fila1["cantidad"]<=10){
	?>
    
    		<td>
            <div style=" width:11px; height:11px; background-color: #FF0; border-radius:100px" data-toggle="tooltip" data-placement="top" title="<?php echo "Quedan ".$fila1["cantidad"]." productos"; ?>"></div>
            </td>
    
    <?php
		}else if($fila1["cantidad"]==0){
	?>
    
    		<td>
            <div style=" width:11px; height:11px; background-color: #F30; border-radius:100px" data-toggle="tooltip" data-placement="top" title="<?php echo "Quedan ".$fila1["cantidad"]." productos"; ?>"></div>
            </td>
    
    <?php
    	}else {
	?>	
		
        	<td>
            <div style=" width:11px; height:11px; background-color:#6C0; border-radius:100px" data-toggle="tooltip" data-placement="top" title="<?php echo "Quedan ".$fila1["cantidad"]." productos"; ?>"></div>
            </td>
        
	<?php	
		}
	?>
    
   <!-- --------------- stock ------------------------ --> 
   
    <td><img width="40px" src="imagenes/<?php if(mysqli_num_rows($registros2)!=0) echo utf8_encode($fila2['nombre']); else echo "no-disponible.jpg"; ?>"></td>
	<td><strong><?php echo utf8_encode($fila1['nombre']);?></strong></td>
    <td><button onclick="ventana('<?php echo $fila1['id_producto']; ?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Ver</button></td>
	<td><a href="formmodificarproductos.php?id_producto=<?php echo $fila1['id_producto']; ?>&pagina=<?php echo $pagina; ?>"><button type="button" class="btn btn-success">Editar</button></a></td>
	<td><a onclick="eliminar('<?php echo $fila1['id_producto']; ?>')"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
    
    <?php 
	
	$registros3=mysqli_query($conexion,"select inicio from productos where id_producto='$fila1[id_producto]'");
	$fila3=mysqli_fetch_array($registros3);
	
	?>
    <form>
    <td><input onclick="enchufe('<?php echo $fila1['id_producto']; ?>')" type="radio" name="<?php echo $fila1['id_producto']; ?>" value="activado" <?php if($fila3['inicio']==1) echo "checked" ?> />On</td>
    <td><input onclick="enchufe('<?php echo $fila1['id_producto']; ?>')" type="radio" name="<?php echo $fila1['id_producto']; ?>" value="desactivado" <?php if($fila3['inicio']==0) echo "checked" ?>/>Off</td>
    </form>
	</tr>
<?php		
}
 ?>
</table>
</div>
<!-- Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle producto</h4>
      </div>
      <div class="modal-body">
        <div id="div-results"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>

<!-- Modal2 -->
<div class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Información</h4>
      </div>
      <div class="modal-body">
        <div id="div-results2"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>

<div class="centrar-pag">
<nav>
  <ul class="pagination"> 
<?php 

if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<li><a href="mostrarproductos.php?pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				
				echo '<li><a href="#"><div class="color-pag">'.$pagina.'</div></a></li>';
			else
				
				echo ' <li><a href="mostrarproductos.php?pagina='.$i.'">'.$i.'</a></li> ';
		}
		if ($pagina != $total_paginas)
			echo '<li><a href="mostrarproductos.php?pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	}
	echo '</p>';


?>
	</ul>
</nav>
</div>
<footer><p>Todos los derechos reservados ITA BARATO</p></footer>
</body>
</html>
<?php 
cerrarconexion();
} 

else{
	
	header('location:../index.html');
	
}
?>
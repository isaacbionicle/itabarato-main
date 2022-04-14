<?php 
session_start(); 
if (isset($_SESSION['administrador']) && $_GET['id_producto']!=""){ 
include('../../php/conexion.php');
$registros=mysqli_query($conexion,"select id_producto,precio,descripcion,cantidad from productos where id_producto='$_GET[id_producto]'");

// cambiar orden imagenes
$registros2=mysqli_query($conexion,"SELECT nombre FROM imagenes WHERE id_producto='$_GET[id_producto]' && prioridad=1");
$fila2=mysqli_fetch_array($registros2);
$registros3=mysqli_query($conexion,"SELECT nombre FROM imagenes WHERE id_producto='$_GET[id_producto]' && prioridad=2");
$fila3=mysqli_fetch_array($registros3);
$registros4=mysqli_query($conexion,"SELECT nombre FROM imagenes WHERE id_producto='$_GET[id_producto]' && prioridad=3");
$fila4=mysqli_fetch_array($registros4);
// cambiar orden imagenes

cerrarconexion();
$fila=mysqli_fetch_array($registros);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda Online</title>
<link rel="stylesheet" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/normalizar.css">
<link rel="stylesheet" href="../administracion.css">

<!-- bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../javascript/bootstrap.min.js"></script>


<!-- bootstrap -->

<!-- cambiar orden imagenes -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
  #sortable li { margin: 20px 0px 0px 0px;height: 62px; }
  </style>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  
  
  $( function() {
    
    	$( "#droppable1" ).droppable({
      		drop: function( event, ui ) {
        	document.getElementById('player').play();
				$.ajax({
					
					type:"POST",
					url:"cambiar_orden_imagenes/sesion_prioridad_nueva.php",
					data:{"prioridad_nueva":1},
					
					success:function(resp){
				
						location.reload();
				
					}
		
				});
      }
    });
  } );
  
  $( function() {
    
    	$( "#droppable2" ).droppable({
      		drop: function( event, ui ) {
        	document.getElementById('player').play();
				$.ajax({
					
					type:"POST",
					url:"cambiar_orden_imagenes/sesion_prioridad_nueva.php",
					data:{"prioridad_nueva":2},
					
					success:function(resp){
				
						location.reload();
				
					}
		
				});
      }
    });
  } );
  
  $( function() {
    
    	$( "#droppable3" ).droppable({
      		drop: function( event, ui ) {
        	document.getElementById('player').play();
				$.ajax({
					
					type:"POST",
					url:"cambiar_orden_imagenes/sesion_prioridad_nueva.php",
					data:{"prioridad_nueva":3},
					
					success:function(resp){
				
						location.reload();
				
					}
		
				});
      }
    });
  } );
  
  
   function sesion_prioridad_vieja(prioridad_vieja,id){

	$.ajax({
					
		type:"POST",
		url:"cambiar_orden_imagenes/sesion_prioridad_vieja.php",
		data:{"prioridad_vieja":prioridad_vieja,"id":id}
			
	});
}

  </script>
  
<audio id="player" src="cambiar_orden_imagenes/cambio.mp3"></audio>
<!-- cambiar orden imagenes -->

</head>


<body>
<div class="tcat"><strong>ACTUALIZAR PRODUCTOS</strong></div>

<!-- cambiar orden imagenes -->

<div style="width:400px; margin: 60px auto 0px auto">
<p style=" text-align:center; font-weight:bold">CAMBIAR ORDEN DE LAS IMÁGENES</p>

<div id="droppable1" style="width:100%; height: 55px; background-color: #FFC; border:1px dotted lightgreen;">
  <p>Drop here</p>
</div>
<div id="droppable2" style=" margin-top:30px;width:100%; height: 55px; background-color: #FFC; border:1px dotted lightgreen;">
  <p>Drop here</p>
</div>
<div id="droppable3" style=" margin-top:30px;width:100%; height: 55px; background-color: #FFC; border:1px dotted lightgreen;">
  <p>Drop here</p>
</div>

<div style="margin-top:-245px">
<ul id="sortable">
  <li onmousedown="sesion_prioridad_vieja(1,<?php echo $_GET["id_producto"]; ?>)" style="cursor:pointer" class="ui-state-default"><div><img width="70px" height="60px" src="imagenes/<?php if(mysqli_num_rows($registros2)>0)echo $fila2['nombre']; else echo "no-disponible.jpg"; ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Imagen principal</div></li>
  <li onmousedown="sesion_prioridad_vieja(2,<?php echo $_GET["id_producto"]; ?>)" style="cursor:pointer" class="ui-state-default"><div><img width="70px" height="60px" src="imagenes/<?php if(mysqli_num_rows($registros3)>0)echo $fila3['nombre']; else echo "no-disponible.jpg"; ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Imagen secundaria</div></li>
  <li onmousedown="sesion_prioridad_vieja(3,<?php echo $_GET["id_producto"]; ?>)" style="cursor:pointer" class="ui-state-default"><div><img width="70px" height="60px" src="imagenes/<?php if(mysqli_num_rows($registros4)>0)echo $fila4['nombre']; else echo "no-disponible.jpg"; ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Imagen secundaria</div></li>
</ul>
</div>

</div>


<!-- cambiar orden imagenes -->

<div class="formulario">
<form class="form-horizontal"  method="post" action="modificarproductos.php">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Precio</label>
    <div class="col-sm-10">
      <input type="number" step="any" class="form-control" id="inputEmail3" placeholder="Nombre producto" name="precionuevo" value="<?php echo $fila['precio']; ?>">
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Descripción</label>
    <div class="col-sm-10">
<textarea onkeyup="validadodescripcion()" class="form-control" rows="3" placeholder="Descripción producto" name="descripcionnueva"><?php echo utf8_encode($fila['descripcion']); ?></textarea>
    </div>
  </div>
  
 <!-- stock -->
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
    <div class="col-sm-10">
      <input type="number" min="-2" class="form-control" id="cantidad" placeholder="Infinitos productos: -1 . Desactivar producto: -2" name="cantidad" value="<?php echo $fila["cantidad"]; ?>">
    </div>
</div>
<!-- stock -->

<input type="hidden" name="pagina" value="<?php echo $_GET["pagina"]; ?>">
  
<input type="hidden" name="id_producto" value="<?php echo $fila['id_producto']; ?>">

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
    </div>
  </div>
</form>
<?php 
} 

else{
	
	header('location:../index.html');
	
}
?>
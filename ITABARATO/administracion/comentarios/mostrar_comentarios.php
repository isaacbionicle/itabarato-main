<?php 
session_start();
if (!isset($_SESSION["administrador"])) header("location:../index.html");
include("../../php/conexion.php");
include("funciones_comentarios.php");

$sql1="SELECT id_comentario FROM comentarios";
$registros1=mysqli_query($conexion,$sql1);

//paginador
 $numero_total_registros=mysqli_num_rows($registros1);
 $TAMANO_PAGINA = 6;
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
 $registros2=mysqli_query($conexion,"SELECT id_comentario,fecha,comentario,puntuacion,id_cliente,id_producto,id_categoria,estado FROM comentarios ORDER BY id_comentario DESC LIMIT ".$inicio."," .$TAMANO_PAGINA) or die(mysqli_error($conexion));
// paginador
 
$numero_registro_comentario=numero_registro_comentario($TAMANO_PAGINA,$pagina,$conexion);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administración: Zona comentarios</title>

<link rel="stylesheet" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/normalizar.css">
<link rel="stylesheet" href="../administracion.css">
<link rel="stylesheet" href="../../css/animate.css">
<link rel="stylesheet" href="interruptor.css">
<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>

<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="../CSS3 Menu.css3prj_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
<!-- End css3menu.com HEAD section -->

<!-- bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../javascript/bootstrap.min.js"></script>
<!-- bootstrap -->


</head>
<body>
<div class="cabecera2"></div>

<div style=" text-align:center; margin-top:-75px; margin-bottom:10px">
<!-- Start css3menu.com BODY section -->
<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topmenu"><a href="../pedidos/ver_pedidos.php" style="width:157px;height:55px;line-height:55px;"><span style="margin-top:-15px">Pedidos</span></a></li>
	<li class="topmenu"><a href="../productos/mostrarproductos.php" style="width:170px;height:55px;line-height:55px;"><span style="margin-top:-15px">Productos</span></a>
	<ul>
		<li><a href="../productos/formaniadirproductos.php">Añadir Producto </a></li>
	</ul></li>
	<li class="topmenu"><a href="../categorias/formaniadircategorias.php" style="width:180px;height:55px;line-height:55px;"><span style="margin-top:-15px"><span style="margin-top:-15px">Categorias</span></a></li>
	<li class="topmenu"><a href="../clientes/" style="width:157px;height:55px;line-height:55px;"><span style="margin-top:-15px">Clientes</span></a></li>
	<li class="topmenu"><a href="../chat" style="width:158px;height:55px;line-height:55px;"><span style="margin-top:-15px">Chat</span></a></li>
    <li class="topmenu"><a class="pressed" href="#" style="width:190px;height:55px;line-height:55px;"><span style="margin-top:-15px">Comentarios</span></a></li>
</ul>
<!-- End css3menu.com BODY section -->
</div>

<div class="tcat"><strong>COMENTARIOS</strong></div>
<div class="mostrarcat">

<div id="respuesta"></div>
<!-- interruptor -->
<?php
mostrar_interruptor($conexion);
?>
<!-- interruptor -->
<form method="post" action="actualizar_comentario.php">
	<div style="margin-bottom:15px; float:right">
    	<div style="float:left">
			<select name="select" class="form-control">
 				<option value="0" selected>No Leido</option> 
  				<option value="1">Leido</option>
                <option value="2">Eliminar</option>
			</select>
            <input type="hidden" name="tamano_pagina" value="<?php echo $TAMANO_PAGINA; ?>">
			<input type="hidden" name="pagina" value="<?php echo $pagina; ?>">
            <input type="hidden" name="numero_registro_comentario" value="<?php echo $numero_registro_comentario; ?>">
        </div>
        <div style="float:left; margin-left:10px">
        	<button type="submit" class="btn btn-danger">Actualizar</button>
        </div>
	</div>
    
<table class="table table-hover">
<tr>
	<td><input onClick="marcar_todos()" type="checkbox" id="checkTodos"></td>
    <td><b>Correo</b></td>
    <td><b>Puntuación</b></td>
    <td><b>Fecha</b></td>
    <td><b>Comentario</b></td>
    <td><b>Producto</b></td>
    <td><b>Categoría</b></td>
    
</tr>

<?php

while($fila2=mysqli_fetch_array($registros2)){
	
	$registros3=mysqli_query($conexion,"SELECT email FROM clientes WHERE id_cliente='$fila2[id_cliente]'");
	$fila3=mysqli_fetch_array($registros3);
	
	$registros4=mysqli_query($conexion,"SELECT nombre FROM productos WHERE id_producto='$fila2[id_producto]'");
	$fila4=mysqli_fetch_array($registros4);
	
	$registros5=mysqli_query($conexion,"SELECT categoria FROM categorias WHERE id='$fila2[id_categoria]'");
	$fila5=mysqli_fetch_array($registros5);
	
?>
   <tr class="active">
   		<td><input class="seleccion" type="checkbox" name="<?php echo $numero_registro_comentario; ?>" value="<?php echo $numero_registro_comentario; ?>"></td>
    	<td><?php echo $fila3["email"]; ?></td>
        <td><?php echo $fila2["puntuacion"]; ?></td>
        <td><?php echo $fila2["fecha"]; ?></td>
        <td><button style="font-size:12px" onclick="ventana('<?php echo $fila2["id_comentario"]; ?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Ver</button></td>
        <td><?php echo utf8_encode($fila4["nombre"]); ?></td>
        <td><?php echo utf8_encode($fila5["categoria"]); ?></td>
        <?php
        if($fila2["estado"]==0){
		?>
        	<td>
            	<div style="background-color: #F00; width:100px; padding:4px; border:1px dashed #333333; border-radius:3px; color:#FFF; font-size:11px ">		       				No Leido.
                </div>
            </td>
        <?php
		}
        if($fila2["estado"]==1){
		?>
    		<td>
            	<div style="background-color: #0C3; width:75px; padding:4px; border:1px dashed #333333; border-radius:3px; color:#FFF; font-size:11px ">		 					Leido.
                </div>
            </td>
        <?php
		}
		?>
        
    </tr>
<?php

$numero_registro_comentario=$numero_registro_comentario-1;
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
			echo '<li><a href="mostrar_comentarios.php?pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				
				echo '<li><a href="#"><div class="color-pag">'.$pagina.'</div></a></li>';
			else
				
				echo ' <li><a href="mostrar_comentarios.php?pagina='.$i.'">'.$i.'</a></li> ';
		}
		if ($pagina != $total_paginas)
			echo '<li><a href="mostrar_comentarios.php?pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	}
	echo '</p>';

?>
	</ul>
</nav>
</div>
<footer><p>Todos los derechos reservados ITA BARATO</p></footer>
<!-- Modal -->
<div style=" margin-top:100px" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Comentario</h4>
      </div>
      <div class="modal-body">
      	<div id="ver-comentario"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="comentario.js"></script>
</body>
</html>
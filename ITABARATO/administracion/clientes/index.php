<?php 
session_start();
if (!isset($_SESSION['administrador'])) header('location:../index.html');
include('../../php/conexion.php');
$registros=mysqli_query($conexion,"SELECT * FROM clientes WHERE validado='1'");

//paginador
 $numero_total_registros=mysqli_num_rows($registros);
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
$registros1=mysqli_query($conexion,"select * from clientes WHERE validado='1' order by nombre asc LIMIT ".$inicio."," .$TAMANO_PAGINA) or die ("Error al conectar con la tabla".mysql_error($conexion));
 // paginador

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administración: Zona clientes</title>

<link rel="stylesheet" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/normalizar.css">
<link rel="stylesheet" href="../administracion.css">

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
	<li class="topmenu"><a class="pressed" href="#" style="width:157px;height:55px;line-height:55px;"><span style="margin-top:-15px">Clientes</span></a></li>
	<li class="topmenu"><a href="../chat" style="width:158px;height:55px;line-height:55px;"><span style="margin-top:-15px">Chat</span></a></li>
    <li class="topmenu"><a href="../comentarios/mostrar_comentarios.php" style="width:190px;height:55px;line-height:55px;"><span style="margin-top:-15px">Comentarios</span></a></li>
</ul>
<!-- End css3menu.com BODY section -->
</div>

<div class="tcat"><strong>CLIENTES</strong></div>

<div class="mostrarcat">
<table class="table table-hover">
<tr>
<td><b>Nombre</b></td><td><b>Apellidos</b></td><td><b>Email</b></td><td><b>Dirección</b></td><td><b>C.P.</b></td><td><b>Estado</b></td><td><b>Teléfono</b></td><td><b>Password</b></td>
</tr>
<?php 
$total_registros=mysqli_query($conexion,"select count(*) as total from clientes WHERE validado='1'") or die ("Error al conectar con la tabla".mysqli_error($conexion));
$total_filas=mysqli_fetch_array($total_registros);
?>
<p class="fuente"><span class="color">Total :  </span><?php echo $total_filas['total']; ?> clientes.</p>
<?php
$i=0;
while($fila=mysqli_fetch_array($registros1)){
	$i++;
	
	
?>
	
    <?php
	if(($i%2)==0){
	?>
    	<tr class="info" id="<?php echo $fila['id_cliente'];?>">
    <?php
	}
	?>
    <?php
	if(($i%2)==1){
	?>
    	<tr class="warning" id="<?php echo $fila['id_cliente'];?>">
    <?php
	}
	?>
    
    <td><?php echo utf8_encode($fila["nombre"]); ?></td><td><?php echo utf8_encode($fila["apellidos"]); ?></td><td><?php echo utf8_encode($fila["email"]); ?></td><td><?php echo utf8_encode($fila["direccion"]); ?></td><td><?php echo utf8_encode($fila["cp"]); ?></td><td><?php echo utf8_encode($fila["estado"]); ?></td><td><?php echo utf8_encode($fila["telefono"]); ?></td><td><?php echo utf8_encode($fila["password"]); ?></td>
    <td><a onclick="eliminar('<?php echo $fila['id_cliente']; ?>')"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
    
    </tr>
<?php
}
cerrarconexion();
?>
</table>
</div>

<div class="centrar-pag">
<nav>
  <ul class="pagination"> 
<?php 

if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<li><a href="index.php?pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				
				echo '<li><a href="#"><div class="color-pag">'.$pagina.'</div></a></li>';
			else
				
				echo ' <li><a href="index.php?pagina='.$i.'">'.$i.'</a></li> ';
		}
		if ($pagina != $total_paginas)
			echo '<li><a href="index.php?pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	}
	echo '</p>';


?>
	</ul>
</nav>
</div>

<footer><p>Todos los derechos reservados ITA BARATO</p></footer>

</body>
<script type="text/javascript" src="clientes.js"></script>
</html>
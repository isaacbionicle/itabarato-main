<?php 
session_start();
if (!isset($_SESSION['administrador'])) header('location:../index.html');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administración: Chat</title>

<link rel="stylesheet" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/normalizar.css">
<link rel="stylesheet" href="../administracion.css">

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
	<li class="topmenu"><a  class="pressed" href="#" style="width:158px;height:55px;line-height:55px;"><span style="margin-top:-15px">Chat</span></a></li>
    <li class="topmenu"><a href="../comentarios/mostrar_comentarios.php" style="width:190px;height:55px;line-height:55px;"><span style="margin-top:-15px">Comentarios</span></a></li>
</ul>
<!-- End css3menu.com BODY section -->
</div>
<div class="mostrarcat">

    <object type="text/html" data="../../chat/" width="900" height="600"></object> 
	
</div>

<footer><p>Todos los derechos reservados ITA BARATO</p></footer>

</body>
</html>
<?php
session_start();
include("php/conexion.php");
$form_path='formulario/formoid_files/formoid1/form.php'; require_once $form_path;
$registros1=mysqli_query($conexion,"SELECT * FROM categorias ORDER BY categoria ASC");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Acerca de IB</title>
<link rel="stylesheet" href="iconos/css/font-awesome.min.css">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/normalizar.css">
<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
<!-- End css3menu.com HEAD section -->
    
</head>

<body>
<header>
<div class="cabecera"></div>
<nav>
<!-- Start css3menu.com BODY section -->
<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul style="height:70px" id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topmenu"><a href="index.php" style="width:156px;height:53px;line-height:70px;"><img src="CSS3 Menu_files/css3menu1/home.png" alt=""/>INICIO</a></li>
	<li class="topmenu"><a href="#" style="width:172px;height:53px;line-height:70px;"><span>PRODUCTOS</span></a>
	<ul>
    <?php
	while ($fila1=mysqli_fetch_array($registros1)){
		
	?>
		<li><a href="mostrarproductos.php?id_categoria=<?php echo $fila1['id']; ?>"><?php echo utf8_encode($fila1['categoria']);?></a></li>
    <?php
	}
	?>
	</ul></li>
	<li class="topmenu"><a href="#" class="pressed" style="width:190px;height:53px;line-height:70px;"><img src="CSS3 Menu_files/css3menu1/001_05.png" alt=""/>Acerca de noso...</a></li>
	<li class="topmenu"><a href="#" style="height:53px;line-height:70px;"><span><img src="CSS3 Menu_files/css3menu1/register.png" alt=""/>ZONA PRIVADA</span></a>
	<ul>
		<li><a href="index.php">INICIAR SESIÓN</a></li>
		<li><a href="clientes/form_registro_clientes.php">REGISTRARSE</a></li>
	</ul></li>
</ul>
<!-- End css3menu.com BODY section -->
</nav>
    
<?php 
if(isset($_SESSION['nombre_cliente']) || isset($_COOKIE['nombre_cliente'])){
?>
<div style="max-width:920px; margin:20px auto -50px auto; padding-left:20px">
	
		<p style="font-family:'Ceviche One',cursive; font-size:24px"><a style=" 	 		text-decoration:none" href="clientes/zona_clientes"><span style="color:  		#F90">Bienvenido/a</span><span style="color:#FFF">
		<?php
			if(isset($_SESSION['nombre_cliente'])) 
			echo $_SESSION['nombre_cliente'];

			if(!isset($_SESSION['nombre_cliente']) && isset($_COOKIE['nombre_cliente'])) 
				echo $_COOKIE['nombre_cliente'];
		?>
		</span></a></p>
	
</div>
<?php
}
?>
  
</header>
<div class="main">
	<div style="margin-top:100px; margin-bottom:30px">
		{{Formoid}}
    </div>
</div>

<footer style="margin-top:-10px" class="wow bounceInDown" data-wow-duration="1.5s">
	<p>Todos los derechos reservados ITA BARATO</p>
</footer>

</body>
</html>
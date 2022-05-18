<?php
session_start();
if(!isset($_POST['buscar'])) header('location:index.php');
	include('php/conexion.php');
	$registros1=mysqli_query($conexion,"select * from categorias order by categoria asc");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Productos</title>
<link rel="stylesheet" href="iconos/css/font-awesome.min.css">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/normalizar.css">
<link rel="stylesheet" href="css/hover-min.css">
<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>

<!-- bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="javascript/bootstrap.min.js"></script>
<!-- bootstrap -->

<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
	<!-- End css3menu.com HEAD section -->
    
</head>

<body>

<header>
<div class="cabecera"></div>
<nav class="wow bounceInDown" data-wow-duration="1.5s">
<!-- Start css3menu.com BODY section -->
<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topmenu"><a href="index.php" style="width:196px;height:70px;line-height:70px;"><img src="CSS3 Menu_files/css3menu1/home.png" alt=""/>INICIO</a></li>
	<li class="topmenu"><a href="#" class="pressed" style="width:205px;height:70px;line-height:70px;"><span>PRODUCTOS</span></a>
	<ul>
    <?php
	while ($fila1=mysqli_fetch_array($registros1)){
		
	?>
		<li><a href="mostrarproductos.php?id_categoria=<?php echo $fila1['id']; ?>"><?php echo utf8_encode($fila1['categoria']);?></a></li>
    <?php
	}
	?>
	</ul></li>
	
	<li class="topmenu"><a href="#" style="height:70px;line-height:70px;"><span><img src="CSS3 Menu_files/css3menu1/register.png" alt=""/>ZONA PRIVADA</span></a>
	<ul>
		<li><a href="#" onclick="mostrar_ventana_modal()">INICIAR SESIÓN</a></li>
		<li><a href="clientes/form_registro_clientes.php">REGISTRARSE</a></li>
	</ul></li>
</ul>
<!-- End css3menu.com BODY section -->
</nav>

<div style="width:920px; margin:20px auto 0px auto;; padding-left:20px">
	<div  style="float:right; margin-bottom:20px">
	<form class="form1" action="buscador.php" method="post">
		<fieldset class="fieldset1">
			<input class="input1" type="search" name="buscar" placeholder="Buscar..."/>
			<button class="button1" type="submit">
				<i class="fa fa-search" aria-hidden="true"></i>
			</button>
			</fieldset>
	</form>
    </div>
    
    <?php 

if(isset($_SESSION['nombre_cliente']) || isset($_COOKIE['nombre_cliente'])){

?>
<div style="margin-bottom:-4px">
<p style="font-family:'Ceviche One',cursive; font-size:24px"><a style=" text-decoration:none" href="clientes/zona_clientes"><span style="color:#F90">Bienvenido/a</span><span style="color:#FFF">
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
    
</div>
<div style="clear:both"></div>

</header>

<div class="main">
<!-- Lógica buscador -->
<?php
if($_POST['buscar']!=""){
$buscar=mysqli_real_escape_string($conexion,$_POST['buscar']);/*NOS AYUDA A PREVENIR LA INYECCION DE CODIGO NO DECIADO (ELIMINAMOS LAS '')  */
$buscar=utf8_decode($buscar);
$registros2=mysqli_query($conexion,"SELECT id_producto,precio,nombre, id_categoria,categoria,id FROM productos INNER JOIN categorias on id_categoria=id WHERE nombre LIKE '%$buscar%' OR categoria LIKE '%$buscar%';");
	if(mysqli_num_rows($registros2)>0){

		while($fila2=mysqli_fetch_array($registros2)){
			$registros3=mysqli_query($conexion,"select nombre from imagenes where 	id_producto='$fila2[id_producto]' and prioridad=1");
			$fila3=mysqli_fetch_array($registros3);
?>
<!--MOSTRAR LOS PRODUCTOS -->
		<a href="detalleproducto.php?id_categoria=<?php echo $fila2['id_categoria']; ?>&id_producto=<?php echo $fila2['id_producto'];  ?>"><div style="border-top: 2px solid #69F; border-left: 2px solid #69F;border-right: 2px solid #69F; margin-top:15px" class="productosmain hvr-float-shadow"><img src="administracion/productos/imagenes/<?php if(mysqli_num_rows($registros3)>0)echo $fila3['nombre']; else echo "no-disponible.jpg"; ?>" width="100%" alt="portatil1"/><div class="precio"><?php 	echo "$".$fila2['precio']; ?></div><div style=" position:absolute; height:50px; width:100%; background-color:#333; top:10px; opacity:0.8;  padding:3px"><span style=" color:#FFF; font-size:17px; font-family:'Ceviche One',cursive;"><?php echo utf8_encode($fila2['nombre']); ?></span></div></div></a>
<?php
		}
	}
	else{
?>		
		<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Lo sentimos, no se ha encontrado ningún resultado</p>
    </div>
<?php	
	}
}
else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Lo sentimos, no se ha encontrado ningún resultado</p>
    </div>	
<?php
}
cerrarconexion();
?>
<!-- Lógica buscador -->
	<div class="limpiar"></div>

</div>

<footer style="margin-top:-10px" class="wow bounceInDown" data-wow-duration="1.5s">
	<p>Todos los derechos reservados Ita barato</p>
</footer>

<!-- ventana modal -->
<div style="margin-top:100px" class="modal fade" id="mostrar_ventana_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" id="i" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Inicio de Sesión</h4>
      </div>
      <div class="modal-body">
        <form name="form_inicio_sesion">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email:</label>
            <input type="text" name="email" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Password:</label>
            <input type="password" name="password" class="form-control" id="recipient-name">
          </div>
          
          
           <div class="checkbox">
    			<label>
      			<input type="checkbox" id="checkbox_recordar"> Recordar usuario.
    			</label>
 			</div>
          
          
        </form>
      </div>
      
     <!-- imagen de carga -->
      <center><div style="display:none;" id="carga"><img src="imagenes/cargando.gif"/></div></center>
      
      
      <div style="padding-left:10px; font-size:12px">
      	<a href="#" onclick="link_password()">He olvidado mi contraseña</a>
      </div>
      
      <div style="padding:13px; display:none" id="link_password">
      	<form name="form_olvido_password">
      		<div class="form-group">
            	<label for="recipient-name" class="control-label">Email:</label>
            	<input type="text" name="email" class="form-control" id="recipient-name">
          	</div>
      	</form>
        <button type="button" onclick="recuperar_password()" class="btn btn-success">Recuperar Contraseña</button>
      </div>
      
      <div class="modal-footer">
      
      <!-- aler contraseña no correcta -->
      
      <div style="display:none" id="alertlogin" class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <center>Email o password incorrecto</center>
    </div>

    
        <button type="button" onclick="validar_sesion()" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>

<!--carrito-->
<div id="b"  class="carrito">
	<div  style=" width:50px; height:120px; float:left; padding:4px; background-color:#333; border-radius:10px 0px 0px 10px; margin-left:-50px; cursor: pointer">
    		
    		<i style=" margin-top:33px; margin-left:200px; color:#f33; font-size:35px" class="fa fa-shopping-basket" aria-hidden="true"></i>  
      			
    </div>
    <div style="height:200px; padding:4px; overflow:auto" id="mostrar_compra">
        
    </div>
</div>
<!--carrito-->

<script type="text/javascript" src="clientes/inicio_de_sesion/inicio_de_sesion.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="compra/compra.js"></script>

</body>

</html>
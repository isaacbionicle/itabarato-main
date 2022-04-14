<?php
 session_start();
 //if(isset($_SESSION['nombre'])) echo $_SESSION['nombre'];


 include('php/conexion.php');

 //seleccionamos las categorias para agregarlos en el menu
 $registros1=mysqli_query($conexion,"select * from categorias order by categoria asc");

 
 $registros2=mysqli_query($conexion,"select id_producto, precio,id_categoria,cantidad from productos where inicio=1 AND cantidad!=-2 limit 0,12");
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ITA BARATO</title>
<link rel="stylesheet" href="iconos/css/font-awesome.min.css">

<!--HEADER,MAIN -->
<link rel="stylesheet" href="css/estilos.css"> 

<!--HOJA DE ESTILOS YA POR DEFECTO QUE TE NORMALIZA LA PG -->
<link rel="stylesheet" href="css/normalizar.css"> 

<!--ES PARA LOS PODRUCTOS AL PASAR EL RATON ARRIBA DE ELLOS TIEMBLEN (PRPIEDAD HOVER) -->
<link rel="stylesheet" href="css/hover-min.css">

<!--para las animaciones del header y main -->
<link rel="stylesheet" href="css/animate.css">


<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>

<!-- bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script> <!-- JQUERY--->
<script src="javascript/bootstrap.min.js"></script>


<!-- es un complemto del animate.css, lo usamos para el ,footer,slider y menu; en menu lo usamos para dar rebote de menu(incion,categoria,contacto) con   wow bounceInDown en header  -->
<script src="css/wow.min.js"></script>
<script>new WOW().init()</script>

<!-- IMPORTAMOS NUESTRO HEADER(SUS CARACTERISTICAS-->
	<link rel="stylesheet" href="CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
	
    
	<!-- IMPORTAMOS EL SLIDE-->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	
	
    
</head>
<body>
<header>
<?php
if(isset($_GET['alert']) && $_GET['alert']=="validado") {
?>
<div style="text-align:center; margin-bottom:1px" class="alert alert-success alert-dismissible" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 			    aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>Se ha completado su registro correctamente. Inicie sesión para poder comprar.</strong></p>
    </div>
<?php  
}
if(isset($_GET['compra_realizada'])) {
?>
	<div style="text-align:center; margin-bottom:1px" class="alert alert-success alert-dismissible" role="alert">
 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 			    aria-hidden="true">&times;</span></button>
    	<p style="color: #666; font-weight:bold" class="centrar">Compra realizada con éxito<br>Para más detalles métase en su zona privada y revise sus pedidos. Gracias :).</p>
    </div>
<?php
}
// paypal
if(isset($_GET['compra_cancelada'])) {
?>
	<div style="text-align:center; margin-bottom:1px" class="alert alert-danger alert-dismissible" role="alert">
 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 			    aria-hidden="true">&times;</span></button>
    	<p style="color: #666; font-weight:bold" class="centrar">Compra cancelada</p>
    </div>
<?php
}
// paypal
?>

                     <!-- CABECERA(HEADER) --->

<div class="cabecera"><a href="https://www.facebook.com/ITA-barato-206259336934630" target="_blank"><img  src="data1/images/logoitabarato.png" float="left"></a></div> <!--ESTE ES HEADER  -->

<nav class="wow bounceInDown" data-wow-duration="1.5s">  <!--NAVEGADOR  (Inicio,menu)
bounceInDown para que rebote y el el data es para la duracion el navegadro
 -->


<!-- AQUI COPIMOS EL HEADER QUE HICIMOS CON CSS3 MENU  (MENU DE OPCIONES)-->
<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul id="css3menu1" class="topmenu">

	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topmenu"><a class="pressed" href="#" style="width:196px;height:70px;line-height:70px;"><img src="CSS3 Menu_files/css3menu1/home.png" alt=""/>INICIO</a></li>
	<li class="topmenu"><a href="#" style="width:205px;height:70px;line-height:70px;"><span>PRODUCTOS</span></a>
	<ul>
    <?php
    //LA SENTENCIA DE FILA UNO ESTA AL INCIO  EN ESTE WHILE RECORREMOS LOS REGISTROS
	while ($fila1=mysqli_fetch_array($registros1)){
		
	?>
  <!--mostrarproductos.php ME MOSTRARA LOS PRODUCTOS CON LA CATEGORIA SELECCIONADA 
      echo utf8_encode($fila1['categoria'] ME SELECCIONARA EL ID DE LA CATEGORIA  
      utf8_encode($fila1['categoria'] ME MOSTRARA LA CATEGORIA 
   -->
		<li><a href="mostrarproductos.php?id_categoria=<?php echo $fila1['id']; ?>"><?php echo utf8_encode($fila1['categoria']);?></a></li>
    <?php
	}
	?>
	</ul></li>
	<li class="topmenu"><a href="contacto.php" style="width:220px;height:70px;line-height:70px;"><img />Acerca de IB</a></li>
	<li class="topmenu"><a href="#" style="height:70px;line-height:70px;"><span><img src="CSS3 Menu_files/css3menu1/register.png" alt=""/>SESIONES</span></a>
	<ul>
		<li><a href="#" onclick="mostrar_ventana_modal()">INICIAR SESIÓN</a></li>
		<li><a href="clientes/form_registro_clientes.php">REGISTRARSE</a></li>
	</ul></li>
</ul>
<!-- FIN  DE IMPORTACION  DEL HEADER -->

</nav>

<!--Search -->
<div style="max-width:920px; margin:20px auto 0px auto; padding-left:20px">
<div  style="float:right; margin-bottom:20px">
<form class="form1" action="buscador.php" method="post">
<fieldset class="fieldset1">
<input class="input1" type="search" name="buscar" placeholder="Buscar..."/>
<button class="button1" type="submit">

<!--Icono -->
<i class="fa fa-search" aria-hidden="true"></i>


</button>
</fieldset>
</form>
</div>
<?php 

if(isset($_SESSION['nombre_cliente']) || isset($_COOKIE['nombre_cliente'])){

?>
<div style="margin-bottom:-4px">
<p style="font-family:'Ceviche One',cursive; font-size:24px"><a style=" text-decoration:none" href="clientes/zona_clientes"><span style="color:#F90,">Bienvenido/a </span><span style="color:#FFF">
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

                                 <!--SLIDER  --->
<div class="slider wow bounceInUp" data-wow-duration="1.5s"> <!--wow es para el rebote -->
	<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>

		<li><img src="data1/images/las-mejores-ofertas.jpg" alt="lo mejor" title="lo mejor" id="wows1_0"/></li>
		<li><img src="data1/images/promocion.jpg" alt="promocion" title="promocion" id="wows1_1"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="lo mejor"><span><img src="data1/tooltips/lasmejoresofertas.jpg" alt="lo mejor"/>1</span></a>
		<a href="#" title="promocion"><span><img src="data1/tooltips/promocion.jpg" alt="promocion"/>2</span></a>
	</div></div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- FIN DE SLIDER -->
</div>




</header>

<!-- AQUI ESTA EL MAIN DONDE ESTARAN LOS PODRUCTOS-->
<div class="main">
<?php
while($fila2=mysqli_fetch_array($registros2)){
	$registros3=mysqli_query($conexion,"select nombre from imagenes where id_producto='$fila2[id_producto]' and prioridad=1");
		$fila3=mysqli_fetch_array($registros3);
?>
<a href="detalleproducto.php?id_categoria=<?php echo $fila2['id_categoria']; ?>&id_producto=<?php echo $fila2['id_producto']; ?>">

	<div id="i" class="productosmain hvr-buzz-out"> <!--hvr-buzz-out es la animacion que vibre el producto(hoover) usamos 
	hover-min.css-->

		<img src="administracion/productos/imagenes/<?php if(mysqli_num_rows($registros3)>0)echo $fila3['nombre']; else echo "no-disponible.jpg"; ?>" width="100%" alt="portatil1"><div class="precio"><?php echo "$".$fila2['precio']; ?></div></div></a>
<?php
} //CIERRE DE WHILE 
cerrarconexion();
?>
<div class="limpiar"></div>  <!--ESTE DIV ES EL DE LIMPIAR EL FLOAT LEFT DEL ULTIMO DIV  -->
</div>
<!--CIERRE DEL MAIN -->


<footer class="wow bounceInDown" data-wow-duration="1.5s"> <!--bounceInDown lo usamos para rebotar  -->
	<p>Todos los derechos reservados itabarato</p></footer>

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
<!--fin carrito-->

<!--  -> 
<!-- botton de chat-->
<div style="position:fixed;left:100%;margin-left:-150px;width: 150px;bottom:0px;">
<!-- mibew button --><a id="mibew-agent-button" href="/ITABARATO3.0/ITABARATO/chat/chat?locale=es" target="_blank" onclick="Mibew.Objects.ChatPopups['5bf218d0103bdf48'].open();return false;"><img src="/ITABARATO3.0/ITABARATO/chat/b?i=mibew&amp;lang=es" border="0" alt="" /></a><script type="text/javascript" src="/ITABARATO3.0/ITABARATO/chat/js/compiled/chat_popup.js"></script><script type="text/javascript">Mibew.ChatPopup.init({"id":"5bf218d0103bdf48","url":"\/ITABARATO3.0\/ITABARATO\/chat\/chat?locale=es","preferIFrame":true,"modSecurity":false,"forceSecure":false,"width":640,"height":480,"resizable":true,"styleLoader":"\/ITABARATO3.0\/ITABARATO\/chat\/chat\/style\/popup"});</script><!-- / mibew button -->

</div>
<!--fin  botton de chat-->


<script type="text/javascript" src="clientes/inicio_de_sesion/inicio_de_sesion.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="compra/compra.js"></script>
</body>
</html>

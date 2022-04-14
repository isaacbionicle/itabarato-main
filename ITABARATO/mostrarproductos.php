<?php
session_start();
 include('php/conexion.php');
 // paginador
 $registros0=mysqli_query($conexion,"select id_producto from productos where id_categoria='$_GET[id_categoria]'") or die ("Error al conectar con la tabla".mysqli_error($conexion));
 $numero_total_registros=mysqli_num_rows($registros0);
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
	/*
$registros1=mysqli_query($conexion,"select * from productos order by nombre asc LIMIT ".$inicio."," .$TAMANO_PAGINA) or die ("Error al conectar con la tabla".mysql_error($conexion));
	*/
 // paginador
 $registros1=mysqli_query($conexion,"select * from categorias order by categoria asc");
 if(isset($_GET['name']) && $_GET['name']=="mayormenor"){
 	$registros2=mysqli_query($conexion,"select id_producto, precio,cantidad from productos where id_categoria='$_GET[id_categoria]' AND cantidad!=-2 order by precio desc LIMIT ".$inicio."," .$TAMANO_PAGINA);
 }
 
 else{
	 
	$registros2=mysqli_query($conexion,"select id_producto, precio,cantidad from productos where id_categoria='$_GET[id_categoria]' AND cantidad!=-2 order by precio asc LIMIT ".$inicio."," .$TAMANO_PAGINA); 
	 
 }
 $registros4=mysqli_query($conexion,"select categoria from categorias where id='$_GET[id_categoria]'");
 $fila4=mysqli_fetch_array($registros4);
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
<script type="text/javascript">
function f_ordenar(id){
	
	var name=document.form1.ordenar.value;
	location.href="mostrarproductos.php?name="+name+"&id_categoria="+id;
	
}
</script>


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
	<li class="topmenu"><a href="contacto.php" style="width:220px;height:70px;line-height:70px;"><img alt=""/>Acerca de IB</a></li>
	<li class="topmenu"><a href="#" style="height:70px;line-height:70px;"><span><img src="CSS3 Menu_files/css3menu1/register.png" alt=""/>ZONA PRIVADA</span></a>
	<ul>
		<li><a href="#" onclick="mostrar_ventana_modal()">INICIAR SESIÓN</a></li>
		<li><a href="clientes/form_registro_clientes.php">REGISTRARSE</a></li>
	</ul></li>
</ul>
<!-- End css3menu.com BODY section -->
</nav>
</header>
<div class="main">

<div style="max-width:1000px">
<?php 

if(isset($_SESSION['nombre_cliente']) || isset($_COOKIE['nombre_cliente'])){

?>
<div style="margin-bottom:-4px; float:right">
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

<p class="fuente"><span style="color:red">Inicio</span><span style="color:#FFF"> -></span><span style="color:#F90"><?php echo utf8_encode($fila4['categoria']); ?></span></p>
<p>
</div>
</br>
<form name="form1">
<select onChange="f_ordenar('<?php echo $_GET['id_categoria']; ?>')" class="form-control" name="ordenar">
  <option>Ordenar por...</option>
  <option value="menormayor">Ordenar por precio de menor a mayor</option>
  <option value="mayormenor">Ordenar por precio de mayor a menor</option>
  
</select>
</form></p>
<?php
while($fila2=mysqli_fetch_array($registros2)){
		$registros3=mysqli_query($conexion,"select nombre from imagenes where 	id_producto='$fila2[id_producto]' and prioridad=1");
		$fila3=mysqli_fetch_array($registros3);
?>
<a href="detalleproducto.php?id_categoria=<?php echo $_GET['id_categoria']; ?>&id_producto=<?php echo $fila2['id_producto'];  ?>"><div class="productosmain hvr-float-shadow"><img src="administracion/productos/imagenes/<?php if(mysqli_num_rows($registros3)>0)echo $fila3['nombre']; else echo "no-disponible.jpg"; ?>" width="100%" alt="portatil1"/><div class="precio"><?php echo "$".$fila2['precio']; ?></div></div></a>
<?php
}
cerrarconexion();
?>
<div class="limpiar"></div>

<div class="centrar-pag">
<nav>
  <ul class="pagination"> 
<?php 
if(isset($_GET['name'])){

	if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<li><a href="mostrarproductos.php?name='.$_GET['name'].'&id_categoria='.$_GET['id_categoria'].'&pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				
				echo '<li><a href="#"><div class="color-pag">'.$pagina.'</div></a></li>';
			else
				
				echo ' <li><a href="mostrarproductos.php?name='.$_GET['name'].'&id_categoria='.$_GET['id_categoria'].'&pagina='.$i.'">'.$i.'</a></li> ';
		}
		if ($pagina != $total_paginas)
			echo '<li><a href="mostrarproductos.php?name='.$_GET['name'].'&id_categoria='.$_GET['id_categoria'].'&pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	}
	echo '</p>';
}

else{
	
	if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<li><a href="mostrarproductos.php?id_categoria='.$_GET['id_categoria'].'&pagina='.($pagina-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				
				echo '<li><a href="#"><div class="color-pag">'.$pagina.'</div></a></li>';
			else
				
				echo ' <li><a href="mostrarproductos.php?id_categoria='.$_GET['id_categoria'].'&pagina='.$i.'">'.$i.'</a></li> ';
		}
		if ($pagina != $total_paginas)
			echo '<li><a href="mostrarproductos.php?id_categoria='.$_GET['id_categoria'].'&pagina='.($pagina+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
	}
	echo '</p>';
}
	
	


?>
		</ul>
	</nav>
	</div>
</div>
<footer style="margin-top:-10px" class="wow bounceInDown" data-wow-duration="1.5s"><p>Todos los derechos reservados tiendaonline.com</p></footer>


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
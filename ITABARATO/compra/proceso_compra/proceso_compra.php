<?php
session_start();
if(!isset($_SESSION['nombre_cliente'])) { //Si no existe una session
	if(!isset($_COOKIE['nombre_cliente'])){//Y NO EXISTE UNA COOKIE
		//NOS DIRECCIONE A RESGISTRO DE CLIENTES
		header('location:../../clientes/form_registro_clientes.php');
	}
}
include('../../php/conexion.php');
$registros1=mysqli_query($conexion,"select * from categorias order by categoria asc");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Proceso de compra</title>
<link rel="stylesheet" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/normalizar.css">
<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
<!-- bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../javascript/bootstrap.min.js"></script>
<!-- bootstrap -->

<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="../../CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
	<!-- End css3menu.com HEAD section -->

</head>

<body>

<header>
<div class="cabecera"></div>
<nav>
<!-- Start css3menu.com BODY section -->
<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topmenu"><a href="../../index.php" style="width:196px;height:70px;line-height:70px;"><img src="../../CSS3 Menu_files/css3menu1/home.png" alt=""/>INICIO</a></li>
	<li class="topmenu"><a href="#" class="pressed" style="width:205px;height:70px;line-height:70px;"><span>PRODUCTOS</span></a>
	<ul>
    <?php
	while ($fila1=mysqli_fetch_array($registros1)){
		
	?>
		<li><a href="../../mostrarproductos.php?id_categoria=<?php echo $fila1['id']; ?>"><?php echo utf8_encode($fila1['categoria']);?></a></li>
    <?php
	}
	?>
	</ul></li>
	<li class="topmenu"><a href="#" style="width:220px;height:70px;line-height:70px;"><img src="CSS3 Menu_files/css3menu1/001_05.png" alt=""/>CONTACTO</a></li>
	</li>
</ul>
<!-- End css3menu.com BODY section -->
</nav>
    
<div style="max-width:920px; margin:20px auto 0px auto; padding-left:20px">

<?php 

if(isset($_SESSION['nombre_cliente']) || isset($_COOKIE['nombre_cliente'])){

?>
<div style="margin-bottom:-4px">
<p style="font-family:'Ceviche One',cursive; font-size:24px"><a style=" text-decoration:none" href="../../clientes/zona_clientes"><span style="color:#F90">Bienvenido/a</span><span style="color:#FFF">
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

</header>
<!--ID PRINCIPAL ES EL DIV DONDE CONTIENE LOS TRES DIV  -->
<div id="principal"  style="margin: 45px auto 45px auto;width:90%;max-width:1000px; min-height: 550px">


<!--DIV 1 QUE CONTIENE LO DE FORMAS DE ENVIO -->
	<div id="div1"  style="border: 1.5px solid #666;min-height: 450px;-webkit-box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.75);
box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.75);padding:12px">
		<div style="min-height:380px">
        	<p style="font-size:18px; font-weight:bold; color:#F30; margin-left:10px">FORMA DE ENVÍO</p>
        	<table style=" font-size:20px" class="table table-bordered">
            	<tr><td><input onClick="restar_envio()" id="envio1" type="radio" name="envio"></td><td>Recoger en tienda (Gratis)</td></tr>
                <tr><td><input onClick="sumar_envio()" id="envio2" type="radio" name="envio" ></td><td>Envío ($100+)</td></tr>
            </table>
        </div>
        <div>
			<a href="../../index.php">
			<button type="button" class="btn btn-warning">Seguir Comprando</button>
        	</a>
			<button onClick="esc_div1()" type="button" class="btn btn-warning">			Siguiente	</button>
        </div>
	</div>
<!--DIV2 ES QUE EL CONTIENE FORMAS DE PAGO -->
	<div id="div2"  style=" display:none;border: 1.5px solid #666;min-height: 450px;-webkit-box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.75);
box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.75);padding:15px">
		<div style="min-height:380px">
        	<p style="font-size:18px; font-weight:bold; color:#F30; margin-left:10px">FORMA DE PAGO</p>
        	<table style=" font-size:20px" class="table table-bordered">
            	<tr><td><input onClick="forma_pago('Efectivo')" id="pago1" type="radio" name="formapago"></td><td>Efectivo (Solo aplicable si ha escogido recogida en tienda)</td></tr>
                <tr><td><input onClick="forma_pago('Transferencia')" onMouseOver="datos_transferencia()" id="pago2" type="radio" name="formapago"></td><td>Transferencia Bancaria <div id="transferencia" style="margin-top:10px; font-size:13px; display:none" class="alert alert-warning" role="alert">4554855454 Jonathan Ramirez</div></td></tr>
                <tr><td><input onClick="forma_pago('Contrareembolso')" id="pago4" type="radio" name="formapago"></td><td>Pago Contrareembolso</td></tr>
                <tr><td><input onClick="forma_pago('Paypal')" id="pago3" type="radio" name="formapago"></td><td><img src="paypal.jpg" width="80px"></td></tr>
            </table>
        </div>
		<div>
			<button onClick="a_esc_div2()" type="button" class="btn btn-warning">Atrás</button>
			<button onClick="s_esc_div2()" type="button" class="btn btn-warning">Siguiente</button>
        </div>
	</div>
    
    <div id="div3"  style=" display:none;border: 1.5px solid #666;min-height: 450px;-webkit-box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.75);
box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.75);padding:15px">
		<div style="min-height:380px">
        	
            
            
             

<div id="mostrar_compra"></div>

            
            
            
        </div>
		<div>
			<button onClick="a_esc_div3()" type="button" class="btn btn-warning">Atrás</button>
				<a href="crear_pedido.php"><button onClick="s_esc_div3()" type="button" class="btn btn-warning">Finalizar</button></a>
        </div>
	</div>
    
</div>


<footer style="margin-top:-10px" class="wow bounceInDown" data-wow-duration="1.5s">
	<p>Todos los derechos reservados ITA BARATO</p>
</footer>


<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="proceso_compra.js"></script>
</body>

</html>
<?php
session_start();
if(isset($_SESSION['id_cliente']) || isset($_COOKIE['nombre_cliente'])) header('location:zona_clientes/index.php');
 include('../php/conexion.php');
 $registros1=mysqli_query($conexion,"select * from categorias order by categoria asc");
 cerrarconexion();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registro</title>
<link rel="stylesheet" href="../css/normalizar.css">
<link rel="stylesheet" href="clientes.css">
<link href='https://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
<!-- bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

<script src="../javascript/bootstrap.min.js"></script>
<!-- bootstrap -->


<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="../CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
	<!-- End css3menu.com HEAD section -->
</head>


<body>

<header>

</header>

<!-- alert enlace caducado-->
<?php
	if(isset($_GET['alert']) && $_GET['alert']=="enlacecaducado"){
?>
  <div style="text-align:center; margin:42px 0px -30px 0px" class="alert alert-danger alert-dismissible" id="emailrepetido" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>El tiempo para validar su correo ha caducado, por favor, vuelva a registrarse.</strong></p>
    </div>
<?php
	}
?>

<!-- alert debe estar registrado para poder comprar  -->
<div style="margin-top:30px">
	<div class="alert alert-success alert-dismissible" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span 			    aria-hidden="true">&times;</span></button>
    <p style="text-align:center"><strong>Registro</strong></p>
    </div>
</div>



<div class="main">

<!--REGISTRO lo sacamos de boostrap https://getbootstrap.com/docs/3.3/css/#forms-example

ONKEYUP NOS SIRVE QUE CADA VEZ QUE SE DEJA PRENCIONAR UNA TECLA DENTRO DE INPUT ME MANDE A VALIDAR 

ONCLICK ES PARECIDO DE ONKEYUP PERO LO USAMOS PARA EL SELECT(ESTADOS)

ONKEYPRESS NOS SIRVE CUANDO PRECIONAMOS UNA TECLA DENTRO DEL CAMPO(INPUT)

ONCHAGE LO USAMOS EN SELECT Y ES CUNADO ELEGIMOS UN ELEMENTO DEL SELECT

 -->
<form name="formregistro" action="registro_clientes.php" method="post">
  <div class="form-group">
    <label>Nombre*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadonombre()" type="tex" name="nombre" class="form-control" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label>Apellidos*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadoapellidos()" type="tex" name="apellidos" class="form-control"  placeholder="Apellidos">
  </div>
  <div class="form-group">
    <label>Email*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadoemail()" type="email" name="email" class="form-control"  placeholder="Email">
  </div>

<!-- alert email  https://getbootstrap.com/docs/4.0/components/alerts/-->
  <div class="alert alert-danger alert-dismissible ocultar" id="avisomail" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Email no valido.</p>
    </div>

  </br>

  <div class="form-inline">
   <div class="form-group">
    <label>Dirección*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadodireccion()" type="text" name="direccion" class="form-control"  placeholder="Dirección completa">
  </div>
  <div class="form-group">
    <label>C. P.*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadocp()" type="text" name="cp" class="form-control" >
  </div>
  	<label>Estado*</label>
  <select onChange="validadocampos()" onClick="validadoestado()" class="form-control" name="estado">
  <option value=""></option>
  <option value="Aguascalientes">Aguascalientes</option>
  <option value="Sinaloa">Sinaloa</option>
  <option value="CDMX">CDMX</option>
  <option value="Monterrey">Monterrey</option>
  <option value="Zacatecas">Zacatecas</option>
  <option value="SanLuisPotosi">San Luis Potosi</option>
  </select>
 </div>
  </br>
  
  <div class="form-group">
    <label>Teléfono</label>
    <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
  </div>
  <div class="form-group">
    <label>Contraseña*</label>
    <input onKeyPress="validadocampos()" onBlur="validadopassword1()" type="password" name="password1" class="form-control" placeholder="Contraseña">
  </div>
  <div class="form-group">
  
<!-- alert contraseñas no coinciden  https://getbootstrap.com/docs/4.0/components/alerts/-->

 <div class="alert alert-danger alert-dismissible ocultar" id="avisopassword2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Las contraseña no puede tener espacios en blanco y debe tener como mínimo 8 caracteres y un número</p>
    </div>
  
    <label>Repetir Contraseña*</label>
    <input onKeyPress="validadocampos()" onKeyUp="validadopassword2()" type="password" name="password2" class="form-control" placeholder="Contraseña">
  </div>
  
<!-- alert contraseñas no coinciden   https://getbootstrap.com/docs/4.0/components/alerts/-->

 <div class="alert alert-danger alert-dismissible ocultar" id="avisopassword" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Las contraseñas no coinciden</p>
    </div>

  <div class="checkbox">
    <label>
      <input onClick="validadoprivacidad()" type="checkbox" id="acepto" name="aceptar"> Acepto la política de privacidad.<a href="#">Leer</a>
    </label>
  </div>
  
<!-- alert campos vacios https://getbootstrap.com/docs/4.0/components/alerts/-->
  <div class="alert alert-danger alert-dismissible ocultar" id="avisocampos" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Debe rellenar todos los campos con * obligatoriamente</p>
    </div>
    
<!-- alert política de privacidad https://getbootstrap.com/docs/4.0/components/alerts/-->

 <div class="alert alert-danger alert-dismissible ocultar" id="avisoprivacidad" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Debe aceptar nuestra política de privacidad</p>
    </div>
 <!-- carga-->
<div class="ocultar" id="carga"><img src="../imagenes/cargando.gif"/></div>

<!-- aler exito-->
<div class="alert alert-success alert-dismissible ocultar" id="exito" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span 			    aria-hidden="true">&times;</span></button>
    <p style="text-align:center"><strong>Gracias por registrarse.</strong>Ya puede realizar compras</p>
   <a style="text-align:center" href="../index.php"><span>ir a Inicio</span></a>
    </div>
    
<!-- email repetido https://getbootstrap.com/docs/4.0/components/alerts/-->

  <div class="alert alert-danger alert-dismissible ocultar" id="emailrepetido" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>Este email ya se encuentra en nuestra base de datos.</strong></p>
    </div>
    


  <button type="button" onClick="validarformulario()" class="btn btn-default">Enviar</button>

</form> <!--CIERRE DE FORM -->

</div>
<footer><p>Todos los derechos reservados itabarato.com</p></footer>
</body>
<script type="text/javascript" src="registro_clientes.js"></script>
</html>

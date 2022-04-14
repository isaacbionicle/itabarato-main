<?php 
session_start(); 
include('../../php/conexion.php');
$registros=mysqli_query($conexion,"select * from categorias order by id desc");
cerrarconexion();
?>

<?php if (isset($_SESSION['administrador'])){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda Online</title>
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
<script>

function mostrar(){
	
	$("#imagenes").show("fast");	

}

function validarformulario(){
	
	if(document.formproductos.nombre.value==""){
		
		$("#avisonombre").show("fast");
		document.formproductos.nombre.style.border="1px solid red";
		
		}
		
	if(document.formproductos.precio.value==""){
		
		$("#avisoprecio").show("fast");
		document.formproductos.precio.style.border="1px solid red";
		
		}
		
	if(document.formproductos.descripcion.value==""){
		
		$("#avisodescripcion").show("fast");
		document.formproductos.descripcion.style.border="1px solid red";
		
		}
		
	if(document.formproductos.categoria.value==""){
		
		$("#avisocategoria").show("fast");
		document.formproductos.categoria.style.border="1px solid red";
		
		}
		
	if(document.formproductos.nombre.value!="" && document.formproductos.precio.value!="" && document.formproductos.descripcion.value!="" && document.formproductos.categoria.value!=""){
		
		var formData= new FormData($("#form")[0]);
		
		var nombre=document.formproductos.nombre.value;
		var precio=document.formproductos.precio.value;
		var descripcion=document.formproductos.descripcion.value;
		var categoria=document.formproductos.categoria.value;
		// stock
		var cantidad=$("#cantidad").val();
		// stock
		
		$.ajax({ 
		
			type:"POST",
			url:"aniadirproductos.php",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			
			beforeSend:function(){
			
			$("#errorimagen").hide("fast");	
			$("#nombrerepetido").hide("fast");
			$("#exito").hide("fast");	
			$("#carga").show("fast");	
				
			},
			
			success:function(resp){
				
			
			
				if(resp=="exito"){
				
					$("#carga").hide("fast");
					$("#nombrerepetido").hide("fast");
					$("#exito").show("slow");
					formproductos.reset();
				
				}
				
				if(resp=="nombrerepetido"){
				
					$("#carga").hide("fast");
					$("#exito").hide("fast");
					$("#nombrerepetido").show("slow");
					document.formproductos.nombre.style.border="1px solid red";
				
				}
				
				if(resp=="errorimagen"){
					
					$("#carga").hide("fast");
					$("#exito").hide("fast");
					$("#nombrerepetido").hide("fast");
					$("#errorimagen").show("slow");	
				
				
				}		
				
			
			}
			

		});
	
	}
	
}


// ZONA DE EXITO AL VALIDAR

function validadonombre(){
	
	$("#avisonombre").hide("slow");
	document.formproductos.nombre.style.border="1px solid green";
	
	}

function validadoprecio(){
	
	$("#avisoprecio").hide("slow");
	document.formproductos.precio.style.border="1px solid green";
	
	}
	
function validadodescripcion(){
	
	$("#avisodescripcion").hide("slow");
	document.formproductos.descripcion.style.border="1px solid green";
	
	}

</script>
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
		<li><a class="pressed" href="../productos/formaniadirproductos.php">Añadir Producto </a></li>
	</ul></li>
	<li class="topmenu"><a href="../categorias/formaniadircategorias.php" style="width:180px;height:55px;line-height:55px;"><span style="margin-top:-15px"><span style="margin-top:-15px">Categorias</span></a></li>
	<li class="topmenu"><a href="../clientes/" style="width:157px;height:55px;line-height:55px;"><span style="margin-top:-15px">Clientes</span></a></li>
	<li class="topmenu"><a href="../chat" style="width:158px;height:55px;line-height:55px;"><span style="margin-top:-15px">Chat</span></a></li>
    <li class="topmenu"><a href="../comentarios/mostrar_comentarios.php" style="width:190px;height:55px;line-height:55px;"><span style="margin-top:-15px">Comentarios</span></a></li>
</ul>
<!-- End css3menu.com BODY section -->
</div>

<div class="tcat"><strong>AÑADIR PRODUCTOS</strong></div>
<div class="formulario">
<form class="form-horizontal" name="formproductos" method="post" enctype="multipart/form-data" id="form">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      <input onkeyup="validadonombre()" type="text" class="form-control" id="inputEmail3" placeholder="Nombre producto" name="nombre">
    </div>
  </div>
  

    <div class="alert alert-danger alert-dismissible ocultar" id="avisonombre" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">No has añadido ningún nombre</p>
    </div>

<!-- campo precio -->   
    
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Precio</label>
    <div class="col-sm-10">
      <input onkeyup="validadoprecio()" type="number" step="0.1" min="0" class="form-control" id="inputEmail3" placeholder="Precio producto" name="precio">
    </div>
  </div>
  
    <div class="alert alert-danger alert-dismissible ocultar" id="avisoprecio" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">No has añadido ningún precio</p>
    </div>

<!-- campo descripción --> 

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Descripción</label>
    <div class="col-sm-10">
<textarea onkeyup="validadodescripcion()" class="form-control" rows="3" placeholder="Descripción producto" name="descripcion"></textarea>
    </div>
  </div>
  
    <div class="alert alert-danger alert-dismissible ocultar" id="avisodescripcion" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">No has añadido ninguna descripción</p>
    </div>
    
<!-- campo categoría -->

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Categoría</label>
    <div class="col-sm-10">
    <select onkeyup="validadocategoria()" class="form-control" name="categoria">
<?php while($fila=mysqli_fetch_array($registros)) { ?>
 <option value="<?php echo $fila['id']; ?>"><?php echo utf8_encode($fila['categoria']); ?></option>
<?php } ?>
</select>
    </div>
  </div>

    <div class="alert alert-danger alert-dismissible ocultar" id="avisocategoria" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">No has añadido ninguna categoría <a target="_blank" href="../categorias/formaniadircategorias.php">Añadir Categoría</a></p>
    </div>
    
 <!-- stock -->
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
    <div class="col-sm-10">
      <input type="number" min="-2" class="form-control" id="cantidad" name="cantidad" placeholder="Infinitos productos: -1 . Desactivar producto: -2">
    </div>
</div>
<!-- stock -->
    
<!-- campo imagenes -->
<div style=" margin-left: 40px; margin-top:20px; margin-bottom:20px"><button onclick="mostrar()" type="button" class="btn btn-success">Añadir alguna imagen</button></div>
<div style=" margin-left: 40px; margin-top: 20px; display:none;" id="imagenes">
<div class="form-group">
    <label for="exampleInputFile">Imagen 1 (principal)</label>
    <input type="file" name="imagen1">
    
  </div>
  
<div class="form-group">
    <label for="exampleInputFile">Imagen 2 (secundaria)</label>
    <input type="file" name="imagen2">
    
  </div>
  
<div class="form-group">
    <label for="exampleInputFile">Imagen 3 (secundaria)</label>
    <input type="file" name="imagen3">
    <p class="help-block">Solo se admiten archivos .jpg, .jpeg, ,gif y .png menores de 1MByte </p>
  </div>
</div>
 
<!-- carga -->
<center><img class="ocultar" src="../../imagenes/cargando.gif" id="carga"></center>
<!-- exito -->

<div class="alert alert-success alert-dismissible ocultar" role="alert" id="exito">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 			    aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>Bien!</strong> El producto se ha añadido correctamente.</p>
    </div>
    
<!-- nombrerepetido -->

<div class="alert alert-danger alert-dismissible ocultar" role="alert" id="nombrerepetido">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">Este nombre ya existe en nuestra base  de datos</p>
    </div>
    
<!-- errorimagen -->

<div class="alert alert-danger alert-dismissible ocultar" role="alert" id="errorimagen">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">La imagen tiene una extensión erronea o sobrepasa el tamaño permitido</p>
    </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button onclick="validarformulario()"  type="button" class="btn btn-primary">Añadir</button>
    </div>
  </div>
</form>
</div>

<footer><p>Todos los derechos reservados ITA BARATO</p></footer>

</body>
</html>
<?php 
} 

else{
	
	header('location:../index.html');
	
}
?>
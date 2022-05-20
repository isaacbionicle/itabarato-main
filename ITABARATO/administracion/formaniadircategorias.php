<?php 
session_start(); 
?>

<?php if (isset($_SESSION['administrador'])){ ?>  <!--si esta logiado el administrador podra hacer  -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda Online</title>
<link rel="stylesheet" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/normalizar.css">
<link rel="stylesheet" href="../administracion.css">

<!-- Start css3menu.com HEAD section -->
<link rel="stylesheet" href="../css.css">
<!-- End css3menu.com HEAD section -->

<!-- bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
<!--http://code.jquery.com/jquery-2.1.4.min.js" ES IMPORTANTE TENER INTERNET -->
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../javascript/bootstrap.min.js"></script>
<!-- bootstrap -->

<!--METODO DE ELIMINAR javascript -->
<script>
function eliminar(id){//parametro id de la categoria eliminar

	if(confirm("Se eliminará la categoria con todos los productos, ¿Confirma su eliminación?")){

		
		/*location.href="eliminarcategorias.php?idcategoria="+id; TIENE LA MISMA FUNCIONALIDAD QUE LA PARTE DE ABAJO PERO 
		LO MALO ESQUE SE RECARGA LA PAGINA */
		
		$.ajax({
			type:"POST",  //TIPO PUEDE SER GET Y POST 
			url:"eliminarcategorias.php",  //PAGINA 
			data:'idcategoria='+id // EL PARAMETRO (ID DE CATEGORIA) QUE VAMOS A PASAR A LA PAGINA ANTERIOR
			
		});
		// $("#"+id) SIGNIFICA QUE ELEGIMOS LA FILA A TARVES DE SU ID 
		//hide("slow") Y CON ESTO LO OCULTAMOS
		//SLOW DESAPARESCA DESPACIO
		$("#"+id).hide("slow");
		
		}
	
	
	
	}

</script>

</head>

<body>


<!-- Start css3menu.com BODY section -->
<input class="menu-icon" type="checkbox" id="menu-icon" name="menu-icon"/>
  	<label for="menu-icon"></label>
  	<nav class="nav"> 		
  		<ul class="pt-5">
		  <li><a href="../pedidos/ver_pedidos.php">Pedidos</a></li>
  			<li><a href="../productos/mostrarproductos.php">Productos</a></li>
  			<li><a href="../productos/formaniadirproductos.php">Añadir productos</a></li>
			<li><a href="../categorias/formaniadircategorias.php">Categorias</a></li>
			<li><a href="../clientes/">Clientes</a></li>
			<li><a href="../pedidos/ver_estadistica.php">Estadisticas</a></li>
			<li><a href="../comentarios/mostrar_comentarios.php">Comentarios</a></li>
  		</ul>
  	</nav>
<!-- End css3menu.com BODY section -->
</div>

<?php 

if(isset($_GET['alert'])) { //SI EXISTE  EL ALERT (MANDADO DESDE ANIADIRCATEGORIA)
$alert=$_GET['alert'];//Guardamos el valor recibido en una variable 

	switch ($alert){
		
	    case 1:
		
?>
<!--es un alert sacado de boostrap https://getbootstrap.com/docs/3.3/components/

ALERT DE QUE SE HA AÑADIDO CORRECTAMENTE -->

	<div class="alert alert-success alert-dismissible" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 			    aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>Bien!</strong> La categoría <strong><?php echo utf8_encode($_GET['categoria']);  ?></strong> se ha añadido correctamente.</p>
    </div>
    
<?php
		break;
	//EN CASO DE QUE NO SE HAYA INSERTADO EL ALERT VALDRA 2
		case 2:
?>
		<!--es un alert sacado de boostrap https://getbootstrap.com/docs/3.3/components/ -->

	<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">No has añadido ninguna categoría</p>
    </div>
<?php	
		break;
		//ALERT(OBTENIDO DESDE ANIADIRCATEGORIA.PHP) VA A A VALER 3 CUANDO YA EXISTA LA CATEGORIA EN LA BD 
		case 3:
?>
<!--NOS AYUD ATANO EN AñADIR UN CATEGORIA COMO EN MODIFICAR YA QUE NO PODEMOS TENER DOS CATEGORIAS IGUALES EN LA BD -->
<!--es un alert sacado de boostrap https://getbootstrap.com/docs/3.3/components/ -->

<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">La categoría <strong><?php echo utf8_encode($_GET['categoria']); ?></strong> ya existe en nuestra base de datos</p>
    </div>

<?php 
	    break;
		
	    case 4:
?>
 <!--PARTE DE MODIFICACION-DE-CATEGORIAS CASE 4 PARA INDICAR QUE  SE HA ACTUALIZADO UNA CATEGORIA  -->
<!--es un alert sacado de boostrap https://getbootstrap.com/docs/3.3/components/ -->

<div class="alert alert-success alert-dismissible" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 			    aria-hidden="true">&times;</span></button>
    <p class="centrar"><strong>Bien!</strong> La categoría <strong><?php echo utf8_encode($_GET['categoriavieja']);     ?></strong> se ha actualizado correctamente por <strong><?php echo utf8_encode($_GET['categorianueva']); ?></strong> .</p>
    </div>

<?php 
	    break;
	
	    case 5:

?>
 <!--PARTE DE MODIFICACION-DE-CATEGORIAS CASE 5  QUE NO SE ESCRIBIO NADA EN LA PARTE DEL FORMULARIO ESTABA VACIO EL CAMPO DEL NUEVO NOMBRE DE LA CATEGORIA A MODIFICAR  -->
<!--es un alert sacado de boostrap https://getbootstrap.com/docs/3.3/components/ -->
	<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span   aria-hidden="true">&times;</span></button>
    <p class="centrar">No has actualizado ninguna categoría</p>
    </div>
    
   

<?php 
	    break;
	
	}
	
}

?>
<div class="tcat"><strong>AÑADIR CATEGORIAS</strong></div>
<div class="formulario">
<form class="form-horizontal" method="post" action="aniadircategorias.php" >
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Categoria</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Categoria" name="categoria">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Añadir</button>
    </div>
  </div>
</form>
</div>

<!-- Mostrar Categorias --->
<div class="mostrarcat">
<?php
 include('../../php/conexion.php');

 //Seleccionamos todas las categorias
 $registros=mysqli_query($conexion,"select * from categorias order by id desc");

 cerrarconexion();//cerramos la conexion poruqe registros ya contiene todos los valores
?>
<!--https://getbootstrap.com/docs/3.3/css/#tables la TABLA la sacamos de boostrap -->
<table class="table table-hover">
<?php
while ($fila=mysqli_fetch_array($registros)){//fila va obtener  cada fila es decir el id,categoria(nombre)
?>
	<!--class active es para cuando pase el cursor por ensima se sombrie el renglon  
		Cada tr tendra un id definido por el mismo id de la categoria estos nos va ayudar en la parte de eliminar por ejemplo      (ajax)-->
	<tr class="active" id="<?php echo $fila['id']; ?>">

	<td><strong><?php echo utf8_encode($fila['categoria']);?></strong></td>
	
  <!-- nos dirigimos a fromodificarcategoria y pasamos por paramtetro la categoria -->
	<td><a href="formmodificarcategorias.php?categoriavieja=<?php echo utf8_encode($fila['categoria']); ?>">	
		<!--boton para editar -->
		<button type="button" class="btn btn-success">Editar</button></a></td>

<!-- $fila['id'] mandamos el id de la categoria al metodo eliminar que esta al incio de esta pagina-->
	<td><a onclick="eliminar('<?php echo $fila['id']; ?>')">  
         <!-- boton para elimnar-->
		<button type="button" class="btn btn-danger">Eliminar</button></a></td>

	</tr>
<?php
}
 ?>
</table>
</div>

<footer><p>Todos los derechos reservados Itabaratoags</p></footer>

</body>
</html>
<?php 
} 

else{// en caso de que no este logiado
	
	header('location:../index.html'); //redireccionar al index de administracion
	
}
?>


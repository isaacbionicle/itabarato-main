<?php 
session_start(); 
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

<!-- bootstrap -->
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../javascript/bootstrap.min.js"></script>


<!-- bootstrap -->


</head>

<body>
<div class="tcat"><strong>ACTUALIZAR CATEGORIAS</strong></div>
<div class="formulario">

<!--Formulario para modificar categoria -->
<form class="form-horizontal" method="post" action="modificarcategorias.php" >
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Categoria</label>
    <div class="col-sm-10">

      <!-- $_GET['categoriavieja'] es la que pasamos por parametro  desde el formanidircategoria(la obtenemos) y se mostrara en el input-->
      <input type="text" class="form-control" id="inputEmail3" placeholder="<?php echo $_GET['categoriavieja'] ?>" name="categorianueva"> <!--y pasaremos a modificarcategorias.php la categorianueva -->
      <!-- name categoriavieja lo mandaresmo tambien la  categoriavieja-->
      <input type="hidden" name="categoriavieja" value="<?php echo $_GET['categoriavieja'] ?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
  </div>
</form>
</div>
</body>
</html>
<?php 
} 

else{
	
	header('location:../index.html');
	
}
?>
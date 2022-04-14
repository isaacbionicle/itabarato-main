<?php
// interruptor
$sql10="SELECT estado FROM interruptor";
$registro10=mysqli_query($conexion,$sql10);
$fila10=mysqli_fetch_array($registro10);
if($fila10["estado"]==1){
// interruptor

include("comentarios/funciones_comentarios.php");
if(isset($_COOKIE["id_cliente"])){
	$_SESSION["id_cliente"]=$_COOKIE["id_cliente"];	
}
if(isset($_SESSION["id_cliente"]) && producto_comprado($_SESSION["id_cliente"],$fila3["nombre"],$conexion)==true && valoracion_repetida($_SESSION["id_cliente"],$_GET["id_producto"],$conexion)==false){
?>
<div class="centrar_boton">
	<button type="button" onClick="mostrar_formulario()" class="btn btn-warning btn-lg">Valorar Producto</button>
</div>

<div id="formulario" class="centrar_formulario">
	<form method="post" action="comentarios/aniadir_comentario.php">
	<p class="clasificacion">
    <input id="radio1" name="estrellas" value="5" type="radio"><!--
    --><label class="c_label" for="radio1">★</label><!--
    --><input id="radio2" name="estrellas" value="4" type="radio"><!--
    --><label class="c_label" for="radio2">★</label><!--
    --><input id="radio3" name="estrellas" value="3" type="radio"><!--
    --><label class="c_label" for="radio3">★</label><!--
    --><input id="radio4" name="estrellas" value="2" type="radio"><!--
    --><label class="c_label" for="radio4">★</label><!--
    --><input id="radio5" name="estrellas" value="1" type="radio" checked="checked"><!--
    --><label class="c_label" for="radio5">★</label>
    </p>
    <label><input type="checkbox" name="correo" value="si" checked="checked"> Deseo mostrar mi correo para recibir preguntas sobre este producto.</label><br><br>
    <label for="exampleInputText">Puedes poner la url de un video de youtube sobre este producto.</label>
    <input type="text" class="form-control" id="exampleInputText" name="url" placeholder="https://www.youtube.com/..."><br>
    <textarea class="form-control" name="comentario" rows="5" minlength="20" maxlength="500" placeholder="Descripción obligatoria, mínimo 20 caracteres, máximo 500 caracteres" required></textarea><br>
	<input type="hidden" name="id_producto" value="<?php echo $_GET['id_producto']; ?>">
	<input type="hidden" name="id_categoria" value="<?php echo $_GET['id_categoria']; ?>">

    <button type="submit" class="btn btn-success">Enviar</button>
	</form>
</div>

<?php 
}
else {
?>

	<div style=" margin-top:140px" class="alert alert-warning" role="alert">Para Valorar este producto debes estar previamente registrado y además haber comprado dicho producto. Solo se podrá valorar una vez cada producto.</div>
	</div>
    
<?php
}
include("comentarios/mostrar_comentarios.php");
}
?>


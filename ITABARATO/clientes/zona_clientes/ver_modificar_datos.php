<?php
session_start();
include('../../php/conexion.php');
sleep(1);
if(isset($_SESSION['nombre_cliente'])){
	
$registros=mysqli_query($conexion,"SELECT * FROM clientes WHERE id_cliente='$_SESSION[id_cliente]'");
$fila=mysqli_fetch_array($registros);
	?>
    <div style=" margin:60px auto 0px auto; max-width:600px">
    <form name="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input style="color: #F90" type="text" name="nombre" value="<?php echo utf8_encode($fila['nombre']); ?>" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Apellidos</label>
    <input style="color: #F90" type="text" name="apellidos" value="<?php echo utf8_encode($fila['apellidos']); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input style="color: #F90" type="text" name="email" value="<?php echo utf8_encode($fila['email']); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Dirección</label>
    <input style="color: #F90" type="text" name="direccion" value="<?php echo utf8_encode($fila['direccion']); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">C. P.</label>
    <input style="color: #F90" type="text" name="cp" value="<?php echo utf8_encode($fila['cp']); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Estado</label>
    <input style="color: #F90" type="text" name="estado" value="<?php echo utf8_encode($fila['estado']); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Teléfono</label>
    <input style="color: #F90" type="text" name="telefono" value="<?php echo utf8_encode($fila['telefono']); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input style="color: #F90" type="text" name="password" value="<?php echo utf8_encode($fila['password']); ?>" class="form-control" id="exampleInputPassword1">
    
    <input type="hidden" name="id_cliente" value="<?php echo $fila['id_cliente']; ?>">
    <div style=" display:none;margin-top:10px" id="alert" class="alert alert-success alert-dismissible" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span 			    aria-hidden="true">&times;</span></button>
    <p style="text-align:center"><strong>Datos actualizados correctamente</p>
    </div>
  </div>
  <img id="carga2" style=" display:none" src="../../imagenes/cargando.gif">
  <button type="button" onclick="actualizar_datos()" name="actualizar"  class="btn btn-default">Actualizar</button>
</form>
	</div>
	<?php
	
	}

else if(!isset($_SESSION['nombre_cliente']) && isset($_COOKIE['nombre_cliente'])){
	 
	$email=utf8_decode($_COOKIE['email_cliente']); 
	$password=utf8_decode($_COOKIE['password_cliente']);
	$registros=mysqli_query($conexion,"SELECT * FROM clientes WHERE email='$email' AND password='$password'");
	if(mysqli_num_rows($registros)==0) header('location:../../index.php');
	
	else{
	$fila=mysqli_fetch_array($registros);
	?>
    <div style=" margin:60px auto 0px auto; max-width:600px">
    <form name="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input style="color: #F90" type="text" name="nombre" value="<?php echo utf8_encode($fila['nombre']); ?>" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Apellidos</label>
    <input style="color: #F90" type="text" name="apellidos" value="<?php echo utf8_encode($fila['apellidos']); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input style="color: #F90" type="text" name="email" value="<?php echo utf8_encode($fila['email']); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Dirección</label>
    <input style="color: #F90" type="text" name="direccion" value="<?php echo utf8_encode($fila['direccion']); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">C. P.</label>
    <input style="color: #F90" type="text" name="cp" value="<?php echo utf8_encode($fila['cp']); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Estado</label>
    <input style="color: #F90" type="text" name="estado" value="<?php echo utf8_encode($fila['estado']); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Teléfono</label>
    <input style="color: #F90" type="text" name="telefono" value="<?php echo utf8_encode($fila['telefono']); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input style="color: #F90" type="text" name="password" value="<?php echo utf8_encode($fila['password']); ?>" class="form-control" id="exampleInputPassword1">
    <input type="hidden" name="id_cliente" value="<?php echo $fila['id_cliente']; ?>">
   <div style=" display:none;margin-top:10px" id="alert" class="alert alert-success alert-dismissible" role="alert">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span 			    aria-hidden="true">&times;</span></button>
    <p style="text-align:center"><strong>Datos actualizados correctamente</p>
    </div>
  </div>
  <img id="carga2" style=" display:none" src="../../imagenes/cargando.gif">
  <button type="button" onclick="actualizar_datos()" name="actualizar" class="btn btn-default">Actualizar</button>
</form>
	</div>
	<?php
	
	}
}

else	header('location:../../index.php');

cerrarconexion();
?>
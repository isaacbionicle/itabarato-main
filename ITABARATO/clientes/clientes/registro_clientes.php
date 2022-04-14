<?php 
include('../php/conexion.php');
include('../php/funciones.php');

	sleep(2);
if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email']) && isset($_POST['direccion']) && isset($_POST['provincia']) && isset($_POST['cp']) && isset($_POST['password'])){
	
	$nombre=mysqli_real_escape_string($conexion,$_POST['nombre']);
	$apellidos=mysqli_real_escape_string($conexion,$_POST['apellidos']);
	$email=mysqli_real_escape_string($conexion,$_POST['email']);
	$direccion=mysqli_real_escape_string($conexion,$_POST['direccion']);
	$provincia=mysqli_real_escape_string($conexion,$_POST['provincia']);
	$cp=mysqli_real_escape_string($conexion,$_POST['cp']);
	$telefono=mysqli_real_escape_string($conexion,$_POST['telefono']);
	$password=mysqli_real_escape_string($conexion,$_POST['password']);
	
//------------------------------------------------------//
	
	$nombre=ucwords($nombre);
	$apellidos=ucwords($apellidos);
	
	
	$nombre=utf8_decode($nombre);
	$apellidos=utf8_decode($apellidos);
	$email=utf8_decode($email);
	$direccion=utf8_decode($direccion);
	$provincia=utf8_decode($provincia);
	$cp=utf8_decode($cp);
	$telefono=utf8_decode($telefono);
	$password=utf8_decode($password);
	

//Insertamos los datos en nuestra tabla clientes//
$registros=mysqli_query($conexion,"SELECT email FROM clientes WHERE email='$email'");
	if(mysqli_num_rows($registros)==0){

	mysqli_query($conexion,"INSERT INTO clientes (nombre,apellidos,email,direccion,cp,provincia,telefono,password) VALUES ('$nombre','$apellidos','$email','$direccion','$cp','$provincia','$telefono','$password')");

// metemos datos en la tabla codigos
$codigo=generarCodigo(10);
$fecha=time();

$registros2=mysqli_query($conexion,"SELECT id_cliente FROM clientes WHERE email='$email'");
$fila2=mysqli_fetch_array($registros2);

mysqli_query($conexion,"INSERT INTO codigos(codigo,fecha_antigua,id_cliente) VALUES ('$codigo','$fecha','$fila2[id_cliente]')");
	

	//enviar email

	$para = $email;	
    $titulo = 'Alta cliente';
     
    $mensaje = '<html>'.
    	'<body><h1>Hola '.$nombre.'</h1>'.
    	'<hr>'.
    	'Gracias por darse de alta en tiendaonline.com<br><br>'.
		'Para verificar su cuenta haga click en el siguiente enlace <a href="http://localhost/clientes/validar.php?codigo='.$codigo.'&id_cliente='.$fila2['id_cliente'].'">Click aquí</a>'.
    	'</body>'.
    	'</html>';
		
    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$cabeceras .= 'From: Admin<admin@tiendaonline.com>';
	
    $enviado = mail($para, $titulo, $mensaje, $cabeceras);
     
    	if ($enviado) echo "exito";
    
		
	
	}else echo "emailrepetido";
	
cerrarconexion();
}
?>
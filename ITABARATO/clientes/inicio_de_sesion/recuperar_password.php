<?php 
if(isset($_POST['email'])){
	include('../../php/conexion.php');
	sleep(2);
	$email=mysqli_real_escape_string($conexion,$_POST['email']);
	$email=utf8_decode($email);
	$registros=mysqli_query($conexion,"SELECT nombre,email,password FROM clientes WHERE email='$email' AND validado='1'");
	
		if(mysqli_num_rows($registros)==0)	echo "fracaso";
	
		else { 
		
			$fila=mysqli_fetch_array($registros);
			$para = $email;	
    		$titulo = 'Envío password';
     
    		$mensaje = '<html>'.
    		'<body><h1>Hola '.$fila['nombre'].'</h1>'.
    		'<hr>'.
    		'Su contraseña es : '.$fila['password'].'<b></b>'.
    		'</body>'.
    		'</html>';
		
    		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
    		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$cabeceras .= 'From: Admin<admin@tiendaonline.com>';
	
    		$enviado = mail($para, $titulo, $mensaje, $cabeceras);
			echo "exito";
		
		}
} 
else header("location:../../index.php");
cerrarconexion();

?>
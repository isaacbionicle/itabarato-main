<?php 
session_start();
session_destroy();
setcookie("nombre_cliente","",time()-300,"/");
setcookie("password_cliente","",time()-300,"/");
setcookie("email_cliente","",time()-300,"/");
header("location:../../index.php");
?>
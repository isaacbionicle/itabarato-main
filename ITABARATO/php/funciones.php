<?php 
function generarCodigo($longitud){
	
$codigo="";
$caracteres="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
$max=strlen($caracteres)-1;

for($i=0;$i<$longitud;$i++){
	
$codigo.=$caracteres[rand(0,$max)]; 	

}

return $codigo;	
	
}

?>
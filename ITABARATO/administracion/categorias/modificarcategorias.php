<?php 
session_start(); 


if(isset($_SESSION['administrador'])){

	if($_POST['categorianueva']!=""){//si  escribimos algo en el formulario de formaniadircategoria entra 
	 include('../../php/conexion.php');
	 
	 //$_POST['categorianueva'] y $_POST['categoriavieja'] Las tomamos desde el form
	 $categorianueva=utf8_decode($_POST['categorianueva']);//guardamos en una variable la categoria nueva
	 $categoriavieja=utf8_decode($_POST['categoriavieja']);//guardamos en una variable la categoria vieja
	
	 	//hacemos un consulta para saber si no existe ya una categoria en la bd con la que vamos actualizar
	 //esto para no tener modificar una categoria y al modifcarla ya la categoria ya exista 
	 $registros=mysqli_query($conexion,"select categoria from categorias where categoria='$categorianueva'");


	 	if(mysqli_num_rows($registros)==0){//si no entonces pasamos a actualizar 
	 		//cambiamos el nombre de la categoria vieja por la nueva es decir un nuevo nombre a la categoria 
	 	 mysqli_query($conexion,"update categorias set categoria='$categorianueva' where categoria='$categoriavieja'");
	 	 cerrarconexion();//cerramos conexion

	 	 /*mandamos un alert con valor de 4 en el cual mostrara que se modifico correctamente y tambein mandamos 
	 	 el nombre de catgoriavieja y el de la categoria nueva */
	 	 header('location:formaniadircategorias.php?alert=4&categoriavieja='.$categoriavieja.'&categorianueva='.$categorianueva);
	 	}
		else{//si ya se encuentra en la bd la categoria 
			/*mandamos un aletr con valor de 3 el cual dira que no ya se encuentra una categoria con ese nombre y mandamos el nombre de la categoria nueva*/
			header('location:formaniadircategorias.php?alert=3&categoria='.$categorianueva);
			
			}
	
	}
	else if ($_POST['categoria']==""){ //si no escribimos nada nos retorna al formulario de añadir categoria
		//madamos un alert de que no se escribio nada 
		 header('location:formaniadircategorias.php?alert=5');
		}

}
else {
		
		header('location:../index.html');
		
		}
	

?>
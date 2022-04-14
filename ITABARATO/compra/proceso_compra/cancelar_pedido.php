<?php 

if (isset($_GET['success']) && $_GET['success'] == 'false') {

	header('Location: ../../index.php?compra_cancelada');	

}

?>
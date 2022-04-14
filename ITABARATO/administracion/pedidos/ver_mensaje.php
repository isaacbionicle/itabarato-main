<?php
session_start();
if (!isset($_SESSION['administrador'])) header('location:../index.html');
include('../../php/conexion.php');
$registros5=mysqli_query($conexion,"SELECT COUNT(estado) as pedidos_nuevos FROM pedidos2 WHERE estado='0'");
$fila5=mysqli_fetch_array($registros5);
if($fila5["pedidos_nuevos"]>0){
?>
<div class="animated infinite bounce" style="background-color:#F9F; width: 220px; padding:7px; border-radius:3px; color:#FFF; font-size:13px">Bien!!! Tiene <?php echo "<b><span style='color:#f03'>".$fila5["pedidos_nuevos"]."</span></b>"; ?> pedidos nuevos.
</div>
<?php
}
?>
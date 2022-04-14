<?php
session_start();
if (!isset($_SESSION['administrador'])) header('location:../index.html');
include('../../php/conexion.php');
$registros=mysqli_query($conexion,"SELECT COUNT(estado) as comentarios_nuevos FROM comentarios WHERE estado='0'");
$fila=mysqli_fetch_array($registros);
if($fila["comentarios_nuevos"]>0){
?>
<div style="background-color: #F90; width: 190px; padding:7px; border-radius:3px; color:#FFF; font-size:13px; margin-bottom:10px">Hay <?php echo "<b><span style='color:#f03'>".$fila["comentarios_nuevos"]."</span></b>"; ?> Comentarios Nuevos.
</div>
<?php
}
?>
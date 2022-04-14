<?php 

function numero_registro_comentario($TAMANO_PAGINA,$pagina,$conexion){
	
	$registros=mysqli_query($conexion,"SELECT COUNT(*) AS numero_comentarios FROM comentarios");
	$fila=mysqli_fetch_array($registros);
	$numero_comentarios=$fila["numero_comentarios"];
	$numero_registro_comentario=$numero_comentarios-($TAMANO_PAGINA *($pagina-1));
	return $numero_registro_comentario;
	
}

function mostrar_interruptor($conexion){
	
	$sql="SELECT estado FROM interruptor";
	$registro=mysqli_query($conexion,$sql);
	$fila=mysqli_fetch_array($registro);
	if($fila["estado"]==1){
		
	?>
        
        <input onChange="interruptor()" class="tgl tgl-ios" id="cb2" type="checkbox" checked/>
<label class="tgl-btn" for="cb2"></label>
        
    <?php	
	
	}
	
	else{
		
	?>
		
		<input onChange="interruptor()" class="tgl tgl-ios" id="cb2" type="checkbox"/>
<label class="tgl-btn" for="cb2"></label>

	<?php
	
	}
    	
}

?>
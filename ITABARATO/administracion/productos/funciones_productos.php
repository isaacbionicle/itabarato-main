<?php 

function mostrar_interruptor($conexion){
	
	$sql="SELECT estado FROM interruptor_stock";
	$registro=mysqli_query($conexion,$sql);
	$fila=mysqli_fetch_array($registro);
	if($fila["estado"]==1){
		
	?>
    
    	<input onChange="interruptor()" class="tgl tgl-flip" id="cb5" type="checkbox" checked/>
    <label class="tgl-btn" data-tg-on="ON" for="cb5"></label>
      
        
    <?php	
	
	}
	
	else{
		
	?>
		
		<input onChange="interruptor()" class="tgl tgl-flip" id="cb5" type="checkbox"/>
        <label class="tgl-btn" data-tg-off="OFF" for="cb5"></label>

	<?php
	
	}
    	
}

?>
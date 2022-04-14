function eliminar(id){
	if(confirm("¿Confirma su eliminación?")){
		
		$.ajax({
			type:"POST",
			url:"eliminar_clientes.php",
			data:'id_cliente='+id
			
		});
		
		$("#"+id).hide("slow");
		
		}
	
	
	
	}
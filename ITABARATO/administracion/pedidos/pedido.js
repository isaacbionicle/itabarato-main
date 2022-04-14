function ventana(id_cliente,pedido){
		
		$.ajax({
			
			type:"POST",
			url:"ver_pedido.php",
			data:{"id_cliente":id_cliente,"pedido":pedido},
			
			success:function(respuesta){
						
				$("#div-results").html(respuesta);
			}
			
		});
	
}
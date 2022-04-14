function ventana(id_comentario){
		
		$.ajax({
			
			type:"POST",
			url:"detalle_comentario.php",
			data:{"id_comentario":id_comentario},
			
			success:function(respuesta){
						
				$("#ver-comentario").html(respuesta);
			}
			
		});
	
}

//-----------------------------------------------------------------------
$(function(){
	
	$.ajax({
		
			url:"alerta_comentario.php",
			
			success:function(respuesta){
				
				$("#respuesta").html(respuesta);
			
			}	
			
	});
	
});

setInterval("mostrar_mensaje()",3900);

function mostrar_mensaje(){
	$.ajax({
		
			
			url:"alerta_comentario.php",
			
			success:function(respuesta){
				
				
				$("#respuesta").html(respuesta);
			
			
			}	
			
	});
}

//-----------------------------------------------------------

function marcar_todos(){
	   
		if( $('#checkTodos').prop('checked') ){
			
			
     		$(".seleccion").prop("checked",true);
			
		}
		else{
			
			$(".seleccion").prop("checked",false);
			
		}
	}
	
//---------------------------------------------------------

function interruptor(){
	
	$.ajax({
			
			url:"interruptor.php"
			
		});

}
function ver_modificar_datos(){
	
	$("#botones").animate({margin:"-5px auto 0px auto"},"fast");
	
	
	$.ajax({
		
			
			url:"ver_modificar_datos.php",
			
			beforeSend:function(){
				
				$("#div_pedidos").hide("fast");
				$("#carga").show("fast");
				
				
			},
			
			success:function(respuesta){
				
				$("#carga").hide("fast");
				$("#div_respuesta").html(respuesta);
				$("#div_respuesta").show("slow");
			
			
			}
		
		
		
		
	});
}
	
function actualizar_datos(){
	
	var nombre=document.form.nombre.value;
	var apellidos=document.form.apellidos.value;
	var email=document.form.email.value;
	var direccion=document.form.direccion.value;
	var estado=document.form.estado.value;
	var cp=document.form.cp.value;
	var telefono=document.form.telefono.value;
	var password=document.form.password.value;
	var id_cliente=document.form.id_cliente.value;
	
	$.ajax({
			type:"POST",
			url:"actualizar_datos.php",
			data:{"nombre":nombre,"apellidos":apellidos,"email":email,"direccion":direccion,"estado":estado,"cp":cp,"telefono":telefono,"password":password,"id_cliente":id_cliente},
			
			beforeSend:function(){
				
				$("#alert").hide("fast");
				$("#carga2").show("fast");
				
			},
			
			success:function(){
				
				
				$("#carga2").hide("slow");
				$("#alert").show("slow");
			
			
			}
			
		});
	
	
}

//------------------------------- PEDIDOS -------------------------------------//

function ver_pedidos(){
	
	$("#botones").animate({margin:"-5px auto 0px auto"},"fast");
	
	
	$.ajax({
		
			
			url:"ver_pedidos.php",
			
			beforeSend:function(){
				
				$("#div_respuesta").hide("fast");
				$("#carga").show("fast");
				
				
			},
			
			success:function(respuesta){
				
				$("#carga").hide("fast");
				$("#div_pedidos").html(respuesta);
				$("#accordion").accordion({heightStyle:"content"});
				$("#div_pedidos").show("slow");
			
			}
		
		
		
		
	});
}
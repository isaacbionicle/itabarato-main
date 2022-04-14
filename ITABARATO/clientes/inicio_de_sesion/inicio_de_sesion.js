function mostrar_ventana_modal(){
	
	
	$("#mostrar_ventana_modal").modal("toggle");	
	
	
}

function validar_sesion(){
	
	// zona ajax
	
	if($('#checkbox_recordar').prop('checked') ) var crear_cookie="true";
	else 							  			 var crear_cookie="false";
	
	var email=document.form_inicio_sesion.email.value;
	var password=document.form_inicio_sesion.password.value;
	
	
	$.ajax({
			type:"POST",
			url:"clientes/inicio_de_sesion/validar_sesion.php",
			data:{"email":email,"password":password,"crear_cookie":crear_cookie},
			
			beforeSend:function(){
				
				$("#alertlogin").hide("fast");
				$("#carga").show("fast");
				
				
			},
			
			success:function(resp){
				
				if(resp=="exito"){
				
					$("#carga").hide("fast");
					location.href="clientes/zona_clientes/index.php";
					
				
				}
				
				if(resp=="fracaso"){
				
					$("#carga").hide("fast");
					$("#alertlogin").show("fast");
					$("#mostrar_ventana_modal").effect( "shake",{times:15},1000 );
					
				
				}
				
			
			
			}
			
		});
	
	
	// zona ajax
	
}

function link_password(){
	
	
	$("#link_password").toggle("slow");


}

function recuperar_password(){
	
	// zona ajax
	var email=document.form_olvido_password.email.value;
	$.ajax({
			type:"POST",
			url:"clientes/inicio_de_sesion/recuperar_password.php",
			data:{"email":email},
			
			beforeSend:function(){
				

				$("#carga").show("fast");
				
				
			},
			
			success:function(resp){
				
				if(resp=="exito"){
				
					$("#carga").hide("fast");
					alert("Hemos enviado un correo con su contraseña");
					
				
				}
				
				if(resp=="fracaso"){
				
					$("#carga").hide("fast");
					alert("El correo no existe en nuestra base de datos");
					
				
				}
				
			
			
			}
			
		});
	
	
	// zona ajax
	
}


function validarformulario(){
	
	
	if(document.formregistro.nombre.value=="" || document.formregistro.apellidos.value=="" || document.formregistro.email.value=="" || document.formregistro.direccion.value=="" || document.formregistro.cp.value=="" || document.formregistro.provincia.value=="" || document.formregistro.password1.value=="" || document.formregistro.password2.value==""){
		
		$("#avisocampos").show("slow");
		
			// Pintar borde de rojo
		
			if(document.formregistro.nombre.value==""){
		
				document.formregistro.nombre.style.border="2px solid red";
		
			}
			
			if(document.formregistro.apellidos.value==""){
		
				document.formregistro.apellidos.style.border="2px solid red";
		
			}
			
			if(document.formregistro.email.value==""){
		
				document.formregistro.email.style.border="2px solid red";
		
			}
			
			if(document.formregistro.direccion.value==""){
		
				document.formregistro.direccion.style.border="2px solid red";
		
			}
			
			if(document.formregistro.cp.value==""){
		
				document.formregistro.cp.style.border="2px solid red";
		
			}
			
			if(document.formregistro.provincia.value==""){
		
				document.formregistro.provincia.style.border="2px solid red";
		
			}
			
			if(document.formregistro.password1.value==""){
		
				document.formregistro.password1.style.border="2px solid red";
		
			}
			
			if(document.formregistro.password2.value==""){
		
				document.formregistro.password2.style.border="2px solid red";
		
			} 
			
			// Pintar borde de rojo
		
		}
		
	if( !$('#acepto').prop('checked') ){
		
		$("#avisoprivacidad").show("slow");
	}
	
	
	if(document.formregistro.nombre.value!="" && document.formregistro.apellidos.value!="" && document.formregistro.email.value!="" && document.formregistro.direccion.value!="" && document.formregistro.cp.value!="" && document.formregistro.provincia.value!="" && document.formregistro.password1.value!="" && document.formregistro.password2.value!=""){
	
	if($('#acepto').prop('checked') ){
		
		if(validadoemail() && validadopassword2() && validadopassword1()){
	
	// zona ajax
	var nombre=document.formregistro.nombre.value;
	var apellidos=document.formregistro.apellidos.value;
	var email=document.formregistro.email.value;
	var direccion=document.formregistro.direccion.value;
	var provincia=document.formregistro.provincia.value;
	var cp=document.formregistro.cp.value;
	var telefono=document.formregistro.telefono.value;
	var password=document.formregistro.password1.value;
	
	
	$.ajax({
			type:"POST",
			url:"registro_clientes.php",
			data:{"nombre":nombre,"apellidos":apellidos,"email":email,"direccion":direccion,"provincia":provincia,"cp":cp,"telefono":telefono,"password":password},
			
			beforeSend:function(){
				
				$("#emailrepetido").hide("fast");
				$("#exito").hide("fast");
				$("#carga").show("fast");
				
			},
			
			success:function(resp){
				
				if(resp=="exito"){
				
					$("#carga").hide("fast");
					$("#emailrepetido").hide("fast");
					$("#exito").show("slow");
					
				
				}
				
				if(resp=="emailrepetido"){
				
					$("#carga").hide("fast");
					$("#exito").hide("fast");
					$("#emailrepetido").show("slow");
				
				}
				
			
			
			}
			
		});
	
	
	// zona ajax
			}
		}
	}

	
}


// ZONA DE EXITO AL VALIDAR

function validadonombre(){
	
	document.formregistro.nombre.style.border="2px solid green";
	
	}
	
function validadoapellidos(){
	
	document.formregistro.apellidos.style.border="2px solid green";
	
	}
	
function validadoemail(){
	
	
     var correo=document.formregistro.email.value;
	expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (expr.test(correo) ){
		
		document.formregistro.email.style.border="2px solid green";
		$("#avisomail").hide("slow");
		return true;
	
	}
	
	else{
		
		document.formregistro.email.style.border="2px solid red";
		$("#avisomail").show("slow");
		return false;
	
	}   
	
	}
	
function validadodireccion(){
	
	document.formregistro.direccion.style.border="2px solid green";
	
	}
	
function validadocp(){
	
	document.formregistro.cp.style.border="2px solid green";
	
	}
	
function validadoprovincia(){
	
		document.formregistro.provincia.style.border="2px solid green";
	
	}
	
function validadopassword1(){
	
	var password_larga=true;
	var no_tiene_espacio=true;
	var tiene_numero=false;
	var password=document.formregistro.password1.value;
	var numero_caracteres=password.length;
	if(numero_caracteres<8) password_larga=false;
	var i=0;
	for(i;i<numero_caracteres;i++){
		
		if(password.charAt(i)==" ")	no_tiene_espacio=false;
		
		if(password.charAt(i)=="0" || password.charAt(i)=="1" || password.charAt(i)=="2" || password.charAt(i)=="3" || password.charAt(i)=="4" || password.charAt(i)=="5" || password.charAt(i)=="6" || password.charAt(i)=="7" || password.charAt(i)=="8" || password.charAt(i)=="9")
		
		tiene_numero=true;
	
	}
	
	if(!tiene_numero || !no_tiene_espacio || !password_larga){ 
	
		document.formregistro.password1.style.border="2px solid red"
		$("#avisopassword2").show("slow");
		return false;
		
		}
	
	else {
		
		$("#avisopassword2").hide("slow");
		document.formregistro.password1.style.border="2px solid green";
		return true;
		
	}
	
		
		
}
	
// ZONA PASSWORD

function validadopassword2(){
	
	if(document.formregistro.password1.value!=document.formregistro.password2.value){
		
		document.formregistro.password2.style.border="2px solid red";
		$("#avisopassword").show("slow");
		return false;
		
	}
	
	else{
		
		document.formregistro.password2.style.border="2px solid green";
		$("#avisopassword").hide("slow");
		return true;
	}
	

}

// ZONA POLITICA DE PRIVACIDAD

function validadoprivacidad(){
	
	if( $('#acepto').prop('checked') ){
		
		$("#avisoprivacidad").hide("slow");
	}
	
	
}

function validadocampos(){
	
	if(document.formregistro.nombre.value!="" && document.formregistro.apellidos.value!="" && document.formregistro.email.value!="" && document.formregistro.direccion.value!="" && document.formregistro.cp.value!="" && document.formregistro.provincia.value!="" && document.formregistro.password1.value!="" && document.formregistro.password2.value!=""){
		
		$("#avisocampos").hide("slow");
	}
	
	
}

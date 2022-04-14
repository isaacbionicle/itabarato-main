

function validarformulario(){
	
	//FUNCION  QUE ME INDICA QUE SI LOS ALGUNO DE LOS CAMPOS ESTA VACIO
	if(document.formregistro.nombre.value=="" || document.formregistro.apellidos.value=="" || document.formregistro.email.value=="" || document.formregistro.direccion.value=="" || document.formregistro.cp.value=="" || document.formregistro.estado.value=="" || document.formregistro.password1.value=="" || document.formregistro.password2.value==""){
		
		$("#avisocampos").show("slow");
		
			// Pintar borde de rojo 
		
			if(document.formregistro.nombre.value==""){//si el campo nombre esta vacio
		//pintamos el borde de rojo
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
			
			if(document.formregistro.estado.value==""){
		
				document.formregistro.estado.style.border="2px solid red";
		
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
	

	//                                   AJAX
	//se va ejecutar si todo lo del formulario esta correcto en otras palabras se hara el registro si esta todo correcto
	if(document.formregistro.nombre.value!="" && document.formregistro.apellidos.value!="" && document.formregistro.email.value!="" && document.formregistro.direccion.value!="" && document.formregistro.cp.value!="" && document.formregistro.estado.value!="" && document.formregistro.password1.value!="" && document.formregistro.password2.value!=""){
	//tabien debe estar checado la politica de privacidad
	if($('#acepto').prop('checked') ){
		//adicionalemnte debe estar validado el mail y los paswword
		if(validadoemail() && validadopassword2() && validadopassword1()){
	
	// zona ajax

	//recogemos los valores de los campos del form de registro
	var nombre=document.formregistro.nombre.value;
	var apellidos=document.formregistro.apellidos.value;
	var email=document.formregistro.email.value;
	var direccion=document.formregistro.direccion.value;
	var estado=document.formregistro.estado.value;
	var cp=document.formregistro.cp.value;
	var telefono=document.formregistro.telefono.value;
	var password=document.formregistro.password1.value;
	
	
	$.ajax({
			type:"POST", //tipo post 
			url:"registro_clientes.php",//pagina que se pasaran las variables

 			//variables 
			data:{"nombre":nombre,"apellidos":apellidos,"email":email,"direccion":direccion,"estado":provincia,"cp":cp,"telefono":telefono,"password":password},
			
			//antes de que se ejecute   se acomapaña con el metodo  sleep que esta en registro_clientes.php
			//EXPLICACION. MIENTRAS SE EJECUTA SE MOSTRARA LO SIGUIENTE
			beforeSend:function(){
				//EN CASO DE QUE ESTE ACTIVADO EMAILREPETIDO ESCONDER
				$("#emailrepetido").hide("fast");
				//MENSAJE DE EXITO ESCONDIDO
				$("#exito").hide("fast");
				//IMAGEN GIFT DE CARGA MOSTRAR EN SUCCESS HAY SE MOSTRARA YA HECHA LA OPERACION
				$("#carga").show("fast");
				
			},
			//Despues de que se ejecute    se acomapaña con el metodo  sleep que esta en registro_clientes.php
			success:function(resp){
				
				if(resp=="exito"){
				
					$("#carga").hide("fast");
					$("#emailrepetido").hide("fast");
					$("#exito").show("slow");
					
				
				}
				//CE
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
//LO QUE HACEMOS ES QUE PINTAMOS EL BORDE VERDE CUANDO SE DETECTA QUE SE ESTA ESCRIBIENDO EN LSO INPUT DE FORM REGISTRO

function validadonombre(){
	
	document.formregistro.nombre.style.border="2px solid green";
	
	}
	
function validadoapellidos(){
	
	document.formregistro.apellidos.style.border="2px solid green";
	
	}
	
function validadoemail(){
	
	
     var correo=document.formregistro.email.value;//en una variable guardamos el email que  ingresemos el el form registro clie

     //exprecion regular que dice que entre texto1 y texto2 debe haber una @ y un .
	expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
    if (expr.test(correo) ){//analiza el correo con la expresion 
		
		//pentamo el borde de verde
		document.formregistro.email.style.border="2px solid green";
		//escondemos el aviso de email en caso de que exista slow la forma que se mostrara lentamente 
		$("#avisomail").hide("slow");
		return true;
	
	}
	
	else{
		//en caso que no se pintara el vorde de rojo
		document.formregistro.email.style.border="2px solid red";
		//y mostramos el alert de avisomail en form registro clientes 
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
	
function validadoestado(){//validamos estado
	
		document.formregistro.estado.style.border="2px solid green";
	
	}
	
function validadopassword1(){
	
	var password_larga=true;
	var no_tiene_espacio=true;
	var tiene_numero=false;
	var password=document.formregistro.password1.value;
	var numero_caracteres=password.length; //obtenemos la longitud del password
	
	if(numero_caracteres<8) password_larga=false; //si la paswword es menor a 8 caracteres
	
	var i=0;
	for(i;i<numero_caracteres;i++){//recorremos toda la contraseña
		
		//si el caracter es igual a espacio decimos marcamos no tiene espacio como false
		if(password.charAt(i)==" ")	no_tiene_espacio=false;
		
		//si la contraseña almenos tiene un num  
		if(password.charAt(i)=="0" || password.charAt(i)=="1" || password.charAt(i)=="2" || password.charAt(i)=="3" || password.charAt(i)=="4" || password.charAt(i)=="5" || password.charAt(i)=="6" || password.charAt(i)=="7" || password.charAt(i)=="8" || password.charAt(i)=="9")
		//la contraseña si tiene un num y por lo tanto es una contrseña fuerte
		tiene_numero=true;
	
	}
	
	if(!tiene_numero || !no_tiene_espacio || !password_larga){ 
	//si no tiene un num el password o es  menor a 8 caracteres  y si tiene espacios
	   
	   //ponemos el borde del  input  password1 en rojo
		document.formregistro.password1.style.border="2px solid red"
		//mostramos el mensaje  en form
		$("#avisopassword2").show("slow");
		return false;
		
		}
	
	else {
		//y ssi todo esta correcto en caso de que este el aviso de que algo esta mal LO ESCONDEREMOS 
		$("#avisopassword2").hide("slow");

		//ponemos el borde del  input  password1 en verde
		document.formregistro.password1.style.border="2px solid green";
		return true;
		
	}
	
		
		
}
	
// ZONA PASSWORD

function validadopassword2(){
	//ME VALIDA SI LAS CONSTRASEñAS SON IGUALES SI NO LO SON
	if(document.formregistro.password1.value!=document.formregistro.password2.value){
		//PINTARA EL PASSWORD 2 EN ROJO
		document.formregistro.password2.style.border="2px solid red";

		//ROLE (ALERT EN FORM REGISTRO) MOSTRAREMOS EL AVISOPASSPORD  DE MANERA LENTA(SLOW)
		$("#avisopassword").show("slow");
		return false;
		
	}
	
	else{//SIN SON IGUALES
		//PINTARA EL INPUT DE FORM REGISTRO EN VERDE
		document.formregistro.password2.style.border="2px solid green";
		//EN CASO DE QUE EL AVISO ESTE LO OCULTARA YA QUE AQUI LAS CONTRASEñAS SON IGUALES
		$("#avisopassword").hide("slow");
		return true;
	}
	

}

// ZONA POLITICA DE PRIVACIDAD

function validadoprivacidad(){
	
	if( $('#acepto').prop('checked') ){//SI EL CHECBOX ESTA CHECADO 
		//ENTONCES ESCONDEME EL AVISODEPRIVACIDAD EN CASO DE QUE ESTUBIERA EL MENSAJE
		$("#avisoprivacidad").hide("slow");
	}
	
	
}

function validadocampos(){
	//SI TODOS LOS INPUT DE FORM REGISTRO CONTIENEN ALGO 
	if(document.formregistro.nombre.value!="" && document.formregistro.apellidos.value!="" && document.formregistro.email.value!="" && document.formregistro.direccion.value!="" && document.formregistro.cp.value!="" && document.formregistro.estado.value!="" && document.formregistro.password1.value!="" && document.formregistro.password2.value!=""){
		//OCULTAMOS AVISO DE CAMPOS
		$("#avisocampos").hide("slow");
	}
	
	
}

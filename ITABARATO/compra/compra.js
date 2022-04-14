//----------------------- stock ---------------------------//
function comprobar_stock(cantidad){
	
	var id_producto=document.formu_compra.id_producto.value;
	var cantidad_producto=document.formu_compra.cantidad_producto.value;
	
	$.ajax({
					
		type:"POST",
		url:"compra/comprobar_stock.php",
		data:{"id_producto":id_producto,"cantidad_producto":cantidad_producto},
	
			success:function(respuesta){
				
				if(respuesta=="exito"){
				
					volar();
				
				}else{
					
					
					swal({
  						title: '¡Imposible!',
  						text: 'Quedan '+cantidad+' unidades en nuestros almacenes. Gracias.',
  						type: 'error',
  						confirmButtonText: 'De acuerdo'
					})				
					//alert("Debe elegir una cantidad menor ya que no hay suficiente stock para este producto en nuestros almacenes. Gracias.");
					
				}
				
			}
				
	});
		
}
//----------------------- stock ---------------------------//

function volar(){
	
	$("#a").effect('transfer', { to: $('#b') }, 500,aniadir_productos);
	
	
}



function aniadir_productos(){
	//pasamos las variables de cada producto 
	var nombre_producto=document.formu_compra.nombre_producto.value;
	var precio_producto=document.formu_compra.precio_producto.value;
	var cantidad_producto=document.formu_compra.cantidad_producto.value;
	// stock
	var id_producto=document.formu_compra.id_producto.value;
	// stock
     //
     ///effect es para traasferir un div a en este caso el produto se vea que se transporta al carrito
	$("#b").effect("bounce",900);
	document.getElementById('player').play();
	
	$.ajax({
					
		type:"POST", ///metodo post
		url:"compra/mostrar_compra.php", //se enviara al mostrar compra
		//data trae las variables
		data:{"nombre_producto":nombre_producto,"precio_producto":precio_producto,"cantidad_producto":cantidad_producto,"id_producto":id_producto},
			
		success:function(respuesta){
				
			$("#mostrar_compra").html(respuesta);
			$("#mostrar_compra").show("fast");
			
		}
			
	});
		 /*esto de abajo ees lo mismo que de $.ajax {
		 	...
		 }	*/	
	//$("#mostrar_compra").load("compra/mostrar_compra.php");

	
	
}


//Esat funcion se ejecuta al cargar la pagina es para que siempre muestre los prodcutos 
$(function(){
     
     	$.ajax({
			
			url:"compra/mostrar_compra.php",
			
			success:function(respuesta){
				
				$("#mostrar_compra").html(respuesta);
				$("#mostrar_compra").show("fast");
			
			
			}
			
			
		});
		
     
	 
});


function eliminar_producto(indice){//parametro tiene ele indice de donde se encuentra el producto elimar del carrito
	
		
		$.ajax({
			
			url:"compra/eliminar.php",
			data:{"indice":indice},// Aqui esta el idice o la pocicion del producto a elimar del carrtio que mandamos a elminar.php
			
			beforeSend:function(){//Antes de que se ejecute mostraremos la imane de carga
				
				$("#n"+indice).show("fast"); //n y el indice(id) se los mandamos desde mostrar_compra.php lo mostramos rapido
				//el id nos sirve para que la imgen de carga aparesca a un costado del producto que se decea eliminar del carrito
				
				
			},

			
			
			success:function(respuesta){

				//$("#mostrar_compra").load("compra/mostrar_compra.php");
				//Esto es lo mismo que lo de abajo  $("#mostrar_compra").html(respuesta); $("#mostrar_compra").show("fast");
				
				$.ajax({
			
					url:"compra/mostrar_compra.php",
					
			
					success:function(respuesta){
						
						
						$("#mostrar_compra").html(respuesta);
						$("#mostrar_compra").show("fast");
						
					}			
				});		
			
			}
			
			
		});
	
	
	
	}




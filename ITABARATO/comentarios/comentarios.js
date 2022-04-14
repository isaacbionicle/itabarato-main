function mostrar_formulario(){
	
	$("#formulario").fadeToggle("fast");
	
}

function f_ordenar(id_categoria,id_producto){
	
	var ordenar=document.form1.ordenar.value;
	location.href="detalleproducto.php?ordenar="+ordenar+"&id_categoria="+id_categoria+"&id_producto="+id_producto;
	
}

window.onload=function(){
	
	var pos=window.name || 0;
	window.scrollTo(0,pos);
	
}
window.onunload=function(){
	
	window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
	
}


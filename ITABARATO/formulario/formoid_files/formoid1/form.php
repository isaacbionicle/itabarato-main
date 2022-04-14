<?php

define('EMAIL_FOR_REPORTS', 'itabaratoags@gmail.com');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Gracias por contactar con nosotros, en breve recibirá una respuesta.');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

define('_DIR_', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once _DIR_ . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-metro-cyan.css" type="text/css" />
<div style=" margin: 150px auto 0px auto; width: 550px">
<span style=" display:block;"  class="alert alert-success"><?php echo FINISH_MESSAGE; ?></span>
</div>
<?php else: ?>

<!-- FROMULARIO DE CONTACTO QUE SE CAMBIO POR EL ACERCA DE NOSOTROS 	
<form enctype="multipart/form-data" class="formoid-metro-cyan" style="background-color:#ffffff;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#66666;max-width:600px;min-width:150px" method="post">
	<div class="title"><h2>Formulario de Contacto</h2></div>
	<div class="element-multiple<?php frmd_add_class("multiple"); ?>"><label class="title">Departamento<span class="required">*</span></label><div class="large"><select data-no-selected="Ningún departamento seleccionado" name="multiple[]" multiple="multiple" required="required">
		<option value="Información">Información</option>
		<option value="Envíos">Envíos</option>
		<option value="Servicio Técnico">Servicio Técnico</option></select></div></div>
	<div class="element-name<?php frmd_add_class("name"); ?>"><label class="title">Nombre y Apellidos<span class="required">*</span></label><span class="nameFirst"><input  type="text" size="8" name="name[first]" required="required"/><label class="subtitle">Nombre</label></span><span class="nameLast">
		<input  type="text" size="14" name="name[last]" required="required"/><label class="subtitle">Apellidos</label></span></div>
	<div class="element-email<?php frmd_add_class("email"); ?>"><label class="title">Email<span class="required">*</span></label><input class="large" type="email" name="email" value="" required="required"/></div>
	<div class="element-file<?php frmd_add_class("file1"); ?>"><label class="title">Enviar Archivo</label><label class="large" ><div class="button">Elegir Archivo</div><input type="file" class="file_input" name="file1" /><div class="file_text">Ningún archivo seleccionado</div></label></div>
	<div class="element-phone<?php frmd_add_class("phone"); ?>"><label class="title">Teléfono</label><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="phone"  value=""/></div>
	<div class="element-rating<?php frmd_add_class("rating1"); ?>"><label class="title">Rating Tienda</label><div class="rating"><input type="radio" class="rating-input" id="rating1-5" name="rating1" value="5" /><label for="rating1-5" class="rating-star"></label><input type="radio" class="rating-input" id="rating1-4" name="rating1" value="4" /><label for="rating1-4" class="rating-star"></label><input type="radio" class="rating-input" id="rating1-3" name="rating1" value="3" /><label for="rating1-3" class="rating-star"></label><input type="radio" class="rating-input" id="rating1-2" name="rating1" value="2" /><label for="rating1-2" class="rating-star"></label><input type="radio" class="rating-input" id="rating1-1" name="rating1" value="1" /><label for="rating1-1" class="rating-star"></label></div></div>
	<div class="element-textarea<?php frmd_add_class("textarea"); ?>"><label class="title">Comentario<span class="required">*</span></label><textarea class="medium" name="textarea" cols="20" rows="5" required="required"></textarea></div>
<div class="submit"><input type="submit" value="Enviar"/></div></form>
<script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-metro-cyan.js"></script>
-->
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-metro-cyan.css" type="text/css" />

<!-- Stop Formoid form-->
<div style="text-align: center;">
<p>La empresa fue constituida a finales del año 2018 en la ciudad de Aguascalientes. Dedicándose al comercio de Computo, Electrónica y Tecnología.
</p>
<p>
Misión

Ofrecemos a nuestros clientes una mejor relación costo / beneficio, procurando incrementar su competitividad, innovación y mejora continua, distinguiéndonos por ofrecer un servicio de calidad, sustentabilidad en el negocio, oportunidades para el desarrollo profesional, personal de sus colaboradores y una contribución positiva a la sociedad, siempre basados en la razón y pasión por nuestro trabajo.
</p>
<p>
Visión

Ser una empresa plenamente identificada en México como seria, profesional y responsable, que brinde el servicio de soluciones en tecnologías de información, distinguiéndose por su honestidad, profesionalismo, calidad, sustentabilidad en el negocio y respeto por su tiempo.</p>

</div>


<?php endif; ?>



<?php frmd_end_form(); ?>
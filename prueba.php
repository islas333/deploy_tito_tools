<?php

	// Humbert Islas
	// islas333@gmail.com
	// Cualquier duda o comentario contactar al correo

	/*==================================================
	=            Variables de configuración            =
	==================================================*/

	include "include/funciones.php";

	$bdname = "basededatos";
	$db = cargarMongo($bdname);

	$rutaDeploy = "";
	$rutaMaster = "";

?>

<!--====================================
=            Inicio de HTML            =
=====================================-->

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Deploy Humberto</title>

	<link rel="stylesheet" href="css/uikit.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/uikit.min.js"></script>
	<script src="js/uikit-icons.min.js"></script>
	<script src="js/scripts.js"></script>

</head>
<body>
	<div class="uk-container deploy-home">

		<br>
		<h2 class="uk-heading-divider">Deploy VISOR</h2>

		<h3 class="uk-heading-divider">Parametros iniciales</h3>
		<div class="uk-alert-primary" uk-alert>
		    <a class="uk-alert-close" uk-close></a>
		    <p>Configuración de los parametros iniciales</p>
		</div>
		<div uk-grid>
			<div class="uk-width-1-1">
				<label class="uk-form-label" for="form-stacked-text">Define el PATH de origen</label>
		        <div class="uk-form-controls">
		            <input class="uk-input" id="path-proyecto" type="text" placeholder="Define el path a revisar, ejemplo /var/www/html/tu_proyecto" value="/var/www/html/deploy/carpeta_proyecto/">
		        </div>
			</div>
			<div class="uk-width-1-1">
				<label class="uk-form-label" for="form-stacked-text">Define el PATH donde se realizara el deploy</label>
		        <div class="uk-form-controls">
		            <input class="uk-input" id="path-deploy" type="text" placeholder="Define el path a revisar, ejemplo /var/www/html/deploy/" value="/var/www/html/deploy/deploy3">
		        </div>
			</div>
		</div>

		<h3 class="uk-heading-divider">Depuración de archivos</h3>
		<div class="uk-alert-warning" uk-alert>
		    <a class="uk-alert-close" uk-close></a>
		    <p>Depuración de los archivos (Eliminación de repetidos)</p>
		</div>
		<div class="uk-grid-divider uk-child-width-expand@s uk-text-center" uk-grid>
			<div>
				<h4><span>PASO 1</span></h4>
				<p>Agregar la lista sin depurarcion de files repetidos</p>
			</div>
			<div>
				<h4><span>PASO 2</span></h4>
				<p>Pegar la lista de archivos filtrados en el text de abajo</p>
			</div>
			<div>
				<h4><span>NOTA IMPORTANTE</span></h4>
				<p> *********** </p>
			</div>
		</div>


		<br>
		<h3 class="uk-heading-divider">Pegar lista de archivos</h3>
		<div uk-grid>
			<div class="uk-width-1-1">
				<textarea class="uk-textarea" rows="5" placeholder="Pegar files AQUI (separados por ',') para depurarción" id="lista-files-depurar"></textarea>
			</div>
			<div class="uk-width-1-1 uk-text-center">
				<button class="uk-button uk-button-secondary" id="verificar-files-depurar" page-depurar="depurarFiles.php">DEPURAR LISTA DE ARCHIVOS</button>
			</div>
		</div>

		<br>
		<h3>Ver lista de archivos filtrados</h3>
		<div class="uk-grid-divider uk-child-width-expand@s uk-text-center" uk-grid>
			<div id="msnNumFiles"></div>
			<div id="msnNumFilesUnique"></div>
		</div>
		<div uk-grid>
			<div class="uk-width-1-1">

				<ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade">
				    <li><a href="#">Archivos encontrados sin problema</a></li>
				    <li><a href="#">Archivos no encontrados (con conflicto)</a></li>
				    <li><a href="#">Archivos Repetidos</a></li>
				    <li><a href="#">Copiar lista para hacer el deploy</a></li>
				</ul>

				<ul class="uk-switcher uk-margin">
				    <li><div class="uk-width-1-1" id="integridadFiles" uk-alert></div></li>
				    <li><div class="uk-width-1-1" id="integridadFilesNot" uk-alert></div></li>
				    <li><div class="uk-width-1-1" id="verRepetidos" uk-alert></div></li>
				    <li><div class="uk-width-1-1" id="listaDeploy" uk-alert></div></li>
				</ul>

			</div>
		</div>

		<h3 class="uk-heading-divider">Registros de archivos para la generación de copia para el Deploy</h3>
		<div class="uk-alert-danger" uk-alert>
		    <a class="uk-alert-close" uk-close></a>
		    <p>Registro de archivos para hacer la copia para el deploy</p>
		</div>


		<div class="uk-grid-divider uk-child-width-expand@s uk-text-center" uk-grid>
		    <div>
		    	<h4 class="uk-heading-line uk-text-center"><span>PASO 1</span></h4>
		    	<p>Agregar en el text-box tu lista de archivos</p>
		    </div>
		    <div>
		    	<h4 class="uk-heading-line uk-text-center"><span>PASO 2</span></h4>
		    	<p>Verificar que todos los Files y Carpetas esten correctos</p>
		    </div>
		    <div>
		    	<h4 class="uk-heading-line uk-text-center"><span>PASO 3</span></h4>
		    	<p>Si todos los archivos se verificaron correctamente, tu deploy esta listo</p>
		    </div>
		</div>


		<br>
		<h3 class="uk-heading-divider">Pegar lista de archivos</h3>
		<div uk-grid>
			<div class="uk-width-1-1">
				<textarea class="uk-textarea" rows="5" placeholder="Pegar files AQUI (separados por ',')" id="lista-files"></textarea>
			</div>
			<div class="uk-width-1-1">
				<label class="uk-form-label" for="form-stacked-text">Define el PATH de inicio</label>
		        <div class="uk-form-controls">
		            <input class="uk-input" id="path-proyecto" type="text" placeholder="Define el path a revisar, ejemplo /var/www/html/tu_proyecto" value="/var/www/html/deploy/carpeta_proyecto/">
		        </div>
			</div>
			<div class="uk-width-1-1">
				<label class="uk-form-label" for="form-stacked-text">Define el PATH donde se realizara el deploy</label>
		        <div class="uk-form-controls">
		            <input class="uk-input" id="path-deploy" type="text" placeholder="Define el path a revisar, ejemplo /var/www/html/deploy/" value="/var/www/html/deploy/deploy34">
		        </div>
			</div>
			<div class="uk-width-1-1 uk-text-center">
				<button class="uk-button uk-button-secondary" id="verificar-files" page="verificarFiles.php">HACER COPIA DE ARCHIVOS</button>
			</div>
		</div>


		<br>
		<h3 class="uk-heading-divider">Registros de acciones</h3>
		<div class="uk-alert-success" uk-alert>
		    <a class="uk-alert-close" uk-close></a>
		    <p>Resultado de los archivos copiados en la carpeta de Deploy</p>
		</div>
		<div uk-grid>
			<div class="uk-width-1-1">

				<ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade">
				    <li><a href="#">Acciones</a></li>
				    <li><a href="#">Array original</a></li>
				    <li><a href="#">Array Unico</a></li>
				</ul>

				<ul class="uk-switcher uk-margin">
				    <li><div class="uk-width-1-1" id="msnTest" uk-alert></div></li>
				    <li><div class="uk-width-1-1" id="msnArrayOriginal" uk-alert></div></li>
				    <li><div class="uk-width-1-1" id="msnArrayUnico" uk-alert></div></li>
				</ul>

			</div>
		</div>

	<br>
	<br>
	<hr class="uk-divider-icon">
	<br>

	</div>





</body>
</html>

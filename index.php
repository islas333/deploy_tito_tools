<?php
	/*=======================================
	=            Configuraciones            =
	=======================================*/
	/**
	
		TODO:
		- Humberto Islas
		- islas333@gmail.com
		- El script permite revisar la existencia de archivos de una carpeta raiz, los copia a una carpeta asignada
		- Es necesario configurar la capera de origen y la carpeta de destino
		- El script te describe que archivos estan repetidos y te muestra el nombre de los mismos
		- Es importante que existan las carpetas de destino si los archivos de origen estan dentro de una carpeta
		-
		- Al final del script te retorna el texto depurado para el correspondiente ADD y COMMIT para hacer el push a GITHUB
	
	 */
	
	
	

	// $archivos = array("admin/js/custom.js","admin/admin_bloques_pyme_home.php","admin/admin_bloques_pyme_home.php","admin/admin_bloques_pyme_home.php","admin/add_mensaje_bloque_pyme_home.php","admin/include_modales_pyme_home.php","admin/show_bloques_pyme_home.php","admin/upload_imagen_pyme_home.php","admin/js/custom.js");
	echo "<h2>Array Original</h2>";
	$archivos = array(
		"customer/pyme_home.php",
		"admin/show_bloques_pyme_home.php",
		"admin/add_mensaje_bloque_primario.php",
		"admin/add_mensaje_bloque_pyme_home.php",
		"admin/add_mensaje_bloque_default.php",
		"admin/js/custom.js",
		"admin/upload_archivos_multinacional.php",
		"admin/add_editor_froala.php",
		"admin/add_cadena.php",
		"admin/admin_cadenas.php",
		"admin/editar_cadenas.php",
		"admin/eliminar_cadena.php",
		"customer/pyme_home.php",
		"admin/show_bloques_pyme_home.php",
		"admin/add_mensaje_bloque_primario.php",
		"admin/js/custom.js",
		"admin/includes/header.inc.php",
		"admin/admin_bloques_pyme_home.php",
		"customer/includes/header.inc.php",
		"admin/add_mensaje_bloque_default.php",
		"admin/add_mensaje_bloque_primario.php",
		"admin/add_mensaje_bloque_pyme_home.php",
		"admin/ver_facturas_listo.php",
		"admin/reporte_plataforma.php",
		"admin/reporte_plataforma.php",
		"admin/reportes.php",
		"admin/descargar_autorizacion_firmada_liquidadas.php",
		"admin/includes/footer.inc.php",
		"admin/terminos_admin_banco.pdf",
		"admin/admin_cama_accounts.php",
		"admin/add_batch_campana.php",
		"customer/proyeccionVentas.php",
		"customer/index_general.php",
		"customer/includes/header.inc.php",
		"customer/disponer_credito_descuento.php",
		"customer/crear_pdf_disposiciones_descuento.php",
		"admin/productos_proceso.php",
		"admin/seleccionar_iconos_pasos.php",
		"admin/crear_producto.php",
		"admin/admin_xml.php",
		"admin/add_paso_producto.php",
		"admin/js/custom.js",
		"admin/add_icon_paso.php",
		"customer/validacion_paso.php",
		"customer/index_general.php",
		"customer/pyme_home.php",
		"customer/correcciones_general.php",
		"customer/corregir_general.php",
		"customer/paso_contador_general.php",
		"admin/correcciones_realizadas_general.php",
		"admin/pdf_observaciones_realizadas.php",
		"admin/enviar_correciones.php",
		"customer/add_auth_general.php",
		"customer/style.css",
		"customer/documentos_precargados.php",
		"admin/crear_mapeo_campos_expediente.php",
		"customer/desembolso.php",
		"admin/cambia_status.php",
		"customer/desembolso_sin_facturas.php",
		"admin/admin_xml.php",
		"customer/pyme_xml.php",
		"customer/js/custom.js",
		"customer/upload_generico.php",
		"customer/mifiel_widget.php",
		"customer/descargar_doc_formalizacion_firmado.php",
		"includes/codigo_logeo.php",
		"customer/includes/header.inc.php",
		"customer/del_documento_general.php",
		"admin/desembolso_general.php",
		"admin/notificaciones_multinacional.php",
		"admin/includes/header_multinacional.inc.php",
		"admin/desembolso_multinacional.php",
		"admin/desembolso_general.php",
		"admin/admin_xml.php",
		"admin/aprobar_factura.php",
		"admin/aprobar_pago.php",
		"admin/rechazar_factura.php",
		"admin/descargar_autorizacion_firmada_aprobadas.php",
		"admin/descargar_autorizacion_firmada_rechazadas.php",
		"admin/descargar_autorizacion_firmada_liquidadas.php",
		"admin/usuarios.php",
		"admin/facturacion.php",
		"admin/js/custom.js",
		"customer/disponer_credito.php",
		"customer/disponer_credito_descuento.php",
		"customer/desembolso.php",
		"customer/desembolso_sin_facturas.php",
		"customer/crear_pdf_disposiciones.php",
		"admin/admin_cama_codigos.php",
		"admin/add_nuevo_codigo.php",
		"admin/editar_codigo.php",
		"admin/js/custom.js",
		"includes/codigo_logeo.php",
		"customer/pyme_home.php",
		"admin/images/visor-icon.png"
		);
	$cadenaCommit = "SPRINT 29 DEPLOY";

	echo "<pre>";
		print_r($archivos);
	echo "</pre>";

	echo '<hr color="blue" size=3>';
	echo "Numero de archivo antes de duplicados: " . count($archivos);
	echo '<hr color="blue" size=3>';
	$nuevoArraySinDuplicados = array_unique($archivos);
	echo "Numero de archivo quitando duplicados: " . count($nuevoArraySinDuplicados);
	echo '<hr color="blue" size=3>';
	echo "<pre>";
	$verRepetidos = array_count_values($archivos);
	// var_dump($verRepetidos);
	foreach ($verRepetidos as $key => $value) {
		if ($value > 1) {
			echo "<pre>";
			echo "Repetido el archivo: ". $key . " #".$value;
			echo "</pre>";
		}
	}
	// print_r(!array_diff($nuevoArraySinDuplicados, $archivos));
	echo "</pre>";
	echo '<hr color="blue" size=3>';

	// COnfigurar las rutas de origen y de destino
	$rutaOrigen = '/var/www/html/dev.visor.io/';
	$rutaDestino = '/var/www/html/tito/prueba_push/';
	$ultimoElemento = end($nuevoArraySinDuplicados);

	$contadorSi = 1;
	$contadorNo = 1;
	foreach ($nuevoArraySinDuplicados as $value) {
		if (file_exists($rutaOrigen.$value)) {
			// copy($rutaOrigen.$value, $rutaDestino.$value);
			// echo "<pre>";
			$copiadosExisto .= $contadorSi." archivo copiado con exito-> ".$rutaOrigen.$value."<br>";
			chmod($rutaDestino.$value,0777);
			$cadenaAdd .= ($ultimoElemento !== $value)?$value." ":$value;
			// echo "</pre>";
			$flagExec = 1;
			$contadorSi++;
		} else {
			// echo "<pre>";
			$corruptoCopiar .= $contadorNo." Revisar archivo: " . $value ."<br>";
			// echo "dato corrupto-> ".$value;
			// echo "</pre>";
			$flagExec2 = 0;
			$contadorNo++;
		}
	}

	echo '<hr color="blue" size=3>';
	echo '<h3>Datos no encontrados:</h3>';
	echo $corruptoCopiar;
	echo '<hr color="blue" size=3>';
	echo '<h3>Datos copiados con exito:</h3>';
	echo $copiadosExisto;
	echo '<hr color="blue" size=3>';
	// if ($flagExec == 1) {
	// 	exec ("find /var/www/html/tito/proyecto/admin -type d -exec chmod 0777 {} +");
	// 	echo "Asignacion de permiso a los archivos copiados 777	status ok";
	// }
	echo '<hr color="blue" size=3>';
	echo '<hr color="blue" size=3>';
	echo "<h3>Cadena de add, commit y push para GIT</h3>";
	echo "git add ".$cadenaAdd;
	echo '<hr color="blue" size=3>';
	echo 'git commit -m "'.$cadenaCommit.'"';
	echo "<br>";
	echo "prueba de comando en bash";
	echo '<hr color="blue" size=3>';

	// Pruebas para hacer push desde php
	// $salida = shell_exec('ls -lart /var/www/html/tito/proyecto/admin');
	// $salida = shell_exec('git pull origin master /var/www/html/proyecto_original/');
	// echo "<pre>$salida</pre>";
?>
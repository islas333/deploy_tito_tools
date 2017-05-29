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
		"admin/admin_xml.php",
		"admin/js/custom.js",
		"admin/add_usuario.php",
		"admin/reporte_plataforma.php",
		"admin/productos_proceso.php",
		"admin/agregar_descripcion.php",
		"admin/proceso_solicitud.php",
		"admin/admin_cama_accounts.php",
		"admin/add_batch_campana.php",
		"admin/check_idc.php",
		"admin/edit_pagina.php",
		"admin/admin_bloques_pyme_home.php",
		"customer/pyme_xml.php",
		"customer/includes/header.inc.php",
		"customer/pyme_home.php",
		"customer/index_general.php",
		"customer/includes/sidebar_herramientas.inc.php",
		"customer/herramientas.php",
		"customer/desembolso.php",
		"admin/admin_cama_datoscampañas.php",
		"admin/js/custom.js",
		"admin/edit_datos_campanas.php",
		"admin/del_docs_campanas.php",
		"admin/cargarDatosCampana.php",
		"admin/admin_cama_accounts.php",
		"admin/admin_cama_codigos.php",
		"admin/admin_cama_home.php",
		"admin/admin_cama_orders.php",
		"admin/admin_cama_reports.php",
		"admin/admin_cama_uploads.php",
		"admin/add_batch_campana.php",
		"admin/add_pyme_campana.php",
		"customer/documentos_precargados.php",
		"customer/images/folder.jpg",
		"customer/images/file.png",
		"customer/images/arrowdown.png",
		"customer/images/arrowright.png",
		"admin/cron_prefill_listo.php",
		"customer/desembolso.php",
		"admin/desembolso_general.php",
		"admin/desembolso_multinacional.php",
		"admin/crear_producto.php",
		"admin/productos_proceso.php",
		"admin/templates.php",
		"admin/editor_froala.php",
		"admin/editor_email_banco.php",
		"admin/editor_email_pyme.php",
		"admin/templates_tips.php",
		"admin/notificaciones.php",
		"admin/load_asignar.php",
		"admin/load_ver.php",
		"admin/admin_xml.php",
		"admin/firma_banco.php",
		"admin/descargar_formalizacion_firmada_contrato.php",
		"admin/admin_cama_reports.php",
		"admin/cambia_status.php",
		"admin/admin_proceso.php",
		"admin/listar_documentos.php",
		"admin/clientes.php",
		"admin/load_estatus_busqueda.php",
		"admin/buscar.php",
		"customer/index_general.php",
		"customer/pyme_xml.php",
		"customer/validacion_paso.php",
		"customer/upload_generico.php",
		"customer/js/custom.js",
		"customer/descargar_doc_formalizacion_firmado.php",
		"admin/cambiar_permisos.php",
		"admin/enviar_correciones.php",
		"admin/aprobar_factura.php",
		"admin/aprobar_pago.php",
		"admin/rechazar_factura.php",
		"admin/cargarDatosCampana.php",
		"admin/edit_datos_campanas.php",
		"admin/includes/functions.inc.php",
		"customer/calcular_facturas.php",
		"customer/desembolso.php",
		"customer/disponer_credito.php",
		"customer/includes/functions.inc.php",
		"admin/cargarDatosCampana.php",
		"admin/edit_datos_campanas.php",
		"admin/includes/functions.inc.php",
		"customer/includes/functions.inc.php",
		"admin/desembolso_general.php",
		"admin/desembolso_multinacional.php",
		"admin/cargarDatosCampana.php",
		"admin/admin_cama_datoscampañas.php",
		"admin/edit_datos_campanas.php",
		"admin/js/custom.js",
		"admin/js/custom.js",
		"customer/desembolso.php",
		"customer/disponer_credito.php",
		"customer/disponer_credito_descuento.php",
		"customer/includes/functions.inc.php",
		"mcn/add_campana.php",
		"mcn/add_datos_metricas.php",
		"mcn/add_detalles_grafico.php",
		"mcn/add_detalles_metrica.php",
		"mcn/add_logo_mcn.php",
		"mcn/add_usuario_conveyor.php",
		"mcn/home.php",
		"mcn/includes/header.inc.php",
		"mcn/index.php",
		"mcn/logo_mcn.php",
		"mcn/micuenta.php",
		"mcn/nueva_dimensiones.php",
		"mcn/recovery.php",
		"mcn/recuperacion.php",
		"mcn/upload_files_detalle_metrica.php",
		"mcn/upload_files_metrica.php",
		"mcn/upload_files_popups.php",
		"mcn/upload_images_detalle_metrica.php",
		"mcn/upload_images_metrica.php",
		"mcn/upload_images_popups.php",
		"mcn/ver_detalles_grafico.php",
		"mcn/verificacion_email.php",
		"mcn/add_datos_metricas.php",
		"mcn/detalle_campana.php",
		"mcn/load_grafico_usuario.php",
		"mcn/load_metricas.php",
		"mcn/add_campana.php",
		"mcn/add_datos_metricas.php",
		"mcn/add_detalles_grafico.php",
		"mcn/add_detalles_metrica.php",
		"mcn/css/main.css",
		"mcn/custom_graph.php",
		"mcn/detalle_campana.php",
		"mcn/graficos.php",
		"mcn/includes/header.inc.php",
		"mcn/js/custom.js",
		"mcn/load_grafico_usuario.php",
		"mcn/load_graficos.php",
		"mcn/ver_detalles_grafico.php",
		"mcn/add_detalles_metrica.php",
		"mcn/admin_usuarios.php",
		"mcn/logo_mcn.php",
		"mcn/admin_usuarios.php",
		"mcn/dashboard_usuarios.php",
		"mcn/graficos.php",
		"mcn/load_graficos.php",
		"mcn/load_metricas.php",
		"mcn/ver_detalles_grafico.php",
		"mcn/home.php",
		"mcn/includes/header.inc.php",
		"admin/notificaciones.php",
		"customer/pyme_xml.php",
		"customer/pyme_home.php",
		"customer/desembolso.php",
		"customer/index_general.php",
		"customer/index_general_original.php",
		"customer/pyme_home.php",
		"signup.php",
		"add_token_based_signup.php",
		"admin/view_multinacional.php",
		"admin/includes/header.inc.php",
		"admin/creacion_catalogos.php",
		"admin/includes/homologar_datos_sexo.php",
		"customer/pyme_xml.php",
		"admin/add_batch_cascadacobro.php",
		"admin/includes/functions.inc.php",
		"listo/upload_archivos.php",
		"customer/includes/listo_signup.php",
		"customer/listo_pyme_home.php",
		"admin/includes/functions.inc.php",
		"admin/view_multinacional.php",
		"admin/upload_archivos_multinacional.php",
		"admin/mifiel_multinacional.php",
		"admin/descargar_firma_multinacional.php",
		"admin/add_batch_limite.php",
		"admin/add_limite_credito.php",
		"admin/aprobar_factura.php",
		"admin/aprobar_pago.php",
		"admin/descargar_autorizacion_firmada.php",
		"admin/descargar_autorizacion_firmada_aprobadas.php",
		"admin/descargar_autorizacion_firmada_csv.php",
		"admin/descargar_autorizacion_firmada_liquidadas.php",
		"admin/descargar_autorizacion_firmada_rechazadas.php",
		"admin/descargar_firma_multinacional.php",
		"admin/descargar_formalizacion_firmada_contrato.php",
		"admin/firma_banco.php",
		"admin/rechazar_factura.php",
		"customer/includes/functions.inc.php",
		"customer/descargar_doc_formalizacion_firmado.php",
		"customer/mifiel_documento.php",
		"customer/upload_generico.php",
		"admin/mifiel_widget.php",
		"admin/mifiel_widget_csv.php",
		"admin/mifiel_widget_facturas_aprobadas.php",
		"admin/mifiel_widget_facturas_liquidadas.php",
		"admin/mifiel_widget_facturas_rechazadas.php",
		"admin/mifiel_widget_firmabanco.php",
		"customer/mifiel_widget.php",
		"admin/admin_bloques_pyme_home.php",
		"signup.php",
		"customer/pyme_home.php",
		"admin/admin_bloques_pyme_home.php",
		"admin/admin_paginas.php"
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
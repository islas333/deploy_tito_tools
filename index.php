<?php
	$archivos = array("admin/js/custom.js","admin/admin_bloques_pyme_home.php","admin/admin_bloques_pyme_home.php","admin/admin_bloques_pyme_home.php","admin/add_mensaje_bloque_pyme_home.php","admin/include_modales_pyme_home.php","admin/show_bloques_pyme_home.php","admin/upload_imagen_pyme_home.php","admin/js/custom.js");
	$cadenaCommit = "Titulo para el commit";

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


	$rutaAbsoluta = '/var/www/html/proyecto_para_copiar/';
	$rutaMover = '/var/www/html/tito/proyecto_a_pegar/';
	$ultimoElemento = end($nuevoArraySinDuplicados);

	foreach ($nuevoArraySinDuplicados as $value) {
		if (file_exists($rutaAbsoluta.$value)) {
			copy($rutaAbsoluta.$value, $rutaMover.$value);
			echo "<pre>";
			echo "Archivo copiado con exito-> ".$rutaAbsoluta.$value;
			chmod($rutaMover.$value,0777);
			$cadenaAdd .= ($ultimoElemento !== $value)?$value." ":$value;
			echo "</pre>";
			$flagExec = 1;
		} else {
			echo "<pre>";
			echo "dato corrupto-> ".$value;
			echo "</pre>";
			$flagExec2 = 0;
		}
	}

	echo '<hr color="blue" size=3>';
	if ($flagExec == 1) {
		exec ("find /var/www/html/tito/proyecto/admin -type d -exec chmod 0777 {} +");
		echo "Asignacion de permiso a los archivos copiados 777	status ok";
	}
	echo '<hr color="blue" size=3>';
	echo "Cadena de add, commit y push para GIT ";
	echo '<hr color="blue" size=3>';
	echo "git add ".$cadenaAdd;
	echo '<hr color="blue" size=3>';
	echo 'git commit -m "'.$cadenaCommit.'"';
	echo "<br>";
	echo "prueba de comando en bash";
	echo '<hr color="blue" size=3>';
	// $salida = shell_exec('ls -lart /var/www/html/tito/proyecto/admin');
	$salida = shell_exec('git pull origin master /var/www/html/proyecto_original/');
	echo "<pre>$salida</pre>";
?>
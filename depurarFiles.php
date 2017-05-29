<?php
	
	$data = trim($_POST['data']);
	$pathProyecto = trim($_POST['pathProyecto']);
	$cleanlistfiles = explode(",", $data);

	foreach ($cleanlistfiles as $valueFiles) {
		$listfiles[] = trim($cleanlistfiles);
	}


	$mensajeNumeroFiles = 
	'
		<h4>"Numero de archivo antes de duplicados"</h4>
		'.count($cleanlistfiles).'
	';

	$mensajeNumeroUnico = 
	'
		<h4>"Numero de archivo quitando duplicados"</h4>
		'.count(array_unique($cleanlistfiles)).'
	';
	$nuevoArraySinDuplicados = array_unique($cleanlistfiles);


	// Repetidos
	$verRepetidos = array_count_values($cleanlistfiles);
	// var_dump($verRepetidos);
	$msnRepetidos = '<h4>"Archivos repetidos"</h4>';
	foreach ($verRepetidos as $key => $value) {
		if ($value > 1) {
			$msnRepetidos .= "Repetido el archivo: ". $key . " #".$value;
			$msnRepetidos .= "<br>";
		}
	}

	// Revisar integridad de los Files
	$msnIntegridad = '<h4>"Archivos verificados"</h4>';
	$msnIntegridadNot = '<h4>"Archivos no existente en el proyecto"</h4>';
	$msnListaDeploy = '<h4>"LISTA DEPURADA PARA DEPLOY"</h4>';
	$contadorSi = 1;
	$contadorNo = 1;
	foreach ($nuevoArraySinDuplicados as $dataFiel) {
		if (file_exists($pathProyecto.$dataFiel)) {
			$msnIntegridad .= $contadorSi." -> ".$dataFiel."<br>";
			$msnListaDeploy .= $dataFiel.",";
			$copiadosExisto .= $contadorSi." archivo copiado con exito-> ".$rutaOrigen.$dataFiel."<br>";
			$cadenaAdd .= ($ultimoElemento !== $dataFiel)?$dataFiel." ":$dataFiel;
			$flagExec = 1;
			$contadorSi++;
		} else {
			$msnIntegridadNot .= $contadorNo." -> ".$dataFiel."<br>";
			$corruptoCopiar .= $contadorNo." Revisar archivo: " . $dataFiel ."<br>";
			$flagExec2 = 0;
			$contadorNo++;
		}
	}


	$argumentos = array(
		"test"=>$listfiles,
		"numeroArchivos"=>$mensajeNumeroFiles,
		"numeroUnico"=>$mensajeNumeroUnico,
		"verRepetidos"=>$msnRepetidos,
		"integridadFiles"=>$msnIntegridad,
		"integridadFilesNot"=>$msnIntegridadNot,
		"listaDeploy"=>$msnListaDeploy,
	);
	echo json_encode($argumentos);

?>
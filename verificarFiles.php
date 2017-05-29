<?php

	include "include/funciones.php";

	$data = trim($_POST['data']);
	$pathProyecto = trim($_POST['pathProyecto']);
	$pathDeploy = trim($_POST['pathDeploy']);
	$listfiles = explode(",", $data);

	if ($pathProyecto == "") {
		$msnError .= "Path proyecto vacio";
		die("Path proyecto vacio");
	}
	if ($pathDeploy == "") {
		$msnError .= "Path deploy vacio";
		die("Path deploy vacio");
	}

	// echo "<pre>";
	// var_dump($listfiles);
	// echo "</pre>";

	$nuevoArraySinDuplicados = array_unique($listfiles);
	

	$n = 0;
	foreach ($listfiles as $rutas) {

		$listaOriginal .= "[".$n."] => ".$rutas."<br>";
		$listaOriginalA[] = $rutas;

		$separados = explode("/", $rutas);
		

		for ($i=0; $i < count($separados); $i++) {
			$rutatmp .= $separados[$i]."/";
			// echo $pathProyecto.$rutatmp;
			if (is_dir($pathProyecto.$rutatmp) && $separados[$i] != "") {
				$ruta .= $separados[$i]."/";
				mkdir($pathDeploy.$ruta, 0777, true);
				chmod($pathDeploy.$ruta, 0777);
			}
		}

		

		if (is_file($pathProyecto.$rutas)) {
			if (copy($pathProyecto.$rutas, $pathDeploy.$rutas)) {
				chmod($pathDeploy.$rutas, 0777);
				$logRegistro[] = $rutas;
			} else {
			    $msnError .= "Error al copiar... ".$pathProyecto.$rutas;
			}
		}
		
		unset($ruta);
		unset($rutatmp);
		$n++;

	}

	$n=0;
	// natsort($logRegistro);
	foreach ($logRegistro as $dataUnica) {
		$listaUnicas .= "[".$n."] => ".$dataUnica."<br>";
		$listaUnicasA[] = $dataUnica;
		$n++;
	}


	for ($x=0; $x < count($listaOriginalA); $x++) { 
		$test .= ($listaOriginalA[$x] == $listaUnicasA[$x]) ? "" : $listaUnicasA[$x].$listaOriginalA[$x];
	}

	// $test = array_diff($listaUnicasA, $listaOriginalA);
	// print_r($test);
	// echo "<pre>";
	// print_r($logRegistro);
	// echo "</pre>";

	$argumentos = array(
		"test"=>$test,
		"arrayOriginal"=>$listaOriginal,
		"arrayUnico"=>$listaUnicas,
		"errores"=>$msnError
	);
	echo json_encode($argumentos);

?>
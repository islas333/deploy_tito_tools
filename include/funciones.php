<?php
	
	/*=================================
	=            Funciones            =
	=================================*/
	
	function cargarMongo($bdname) {

		// Esto no sirve de nada

		$conexion = new MongoClient( "mongodb://localhost" );
		$dbs = $conexion->listDBs();

		foreach ($dbs['databases'] as $key => $value) {
			$listDbs[] = $value['name'];
		}

		if (in_array($bdname, $listDbs)) {
			$db = $conexion->$bdname;
			return $db;
		} else {
			die("No existe la base de datos");
		}

	}

	function verificarRutas($separados,$pathProyecto,$pathDeploy) {
		echo $contarRutas = count($separados);

		if (condition) {
			# code...
		}

		for ($i=0; $i < $contarRutas; $i++) { 
			echo $i;
		}
	}

?>
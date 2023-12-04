<?php 
	
	class gestorPeliculasModel{

		public function gestorPeliculas($tabla){
			$consulta = new Consulta();
			$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo WHERE tipo='DVD' ORDER BY fecha DESC LIMIT 100";
			$resultado = $consulta -> ver_registros($sql);
			return $resultado;
		}

		public function cantidadTab($tabla){
			$consulta = new Consulta();
			$sql = "SELECT codigo FROM $tabla";
			$resultado = $consulta -> ver_registros($sql);
			return $resultado;
		}

		public function gestorTrailers($tabla){
			$consulta = new Consulta();
			$sql = " SELECT trailer FROM $tabla WHERE tipo='DVD' ORDER BY fecha DESC LIMIT 100";
			$resultado = $consulta -> ver_registros($sql);
			return $resultado;
		}
		public function cardShowModel($tabla, $codigoCard){
			$consulta = new Consulta();
			$sql = " SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo WHERE codigo='$codigoCard'";
			$resultado = $consulta -> ver_registros($sql);
			return $resultado;
		}
	}



 ?>
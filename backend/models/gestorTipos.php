<?php 
	
	class gestorTiposModel{

		public function gestorTipos($tabla){
			$consulta = new Consulta();
			$sql = "SELECT * FROM $tabla";
			$resultadoGenero = $consulta -> ver_registros($sql);
			return $resultadoGenero;
		}
	}

 ?>
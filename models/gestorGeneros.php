<?php 
	
	class gestorGenerosModel{

		public function gestorGeneros($tabla){
			$consulta = new Consulta();
			$sql = "SELECT * FROM $tabla";
			$resultadoGenero = $consulta -> ver_registros($sql);
			return $resultadoGenero;
		}

		public function generoFiccion($tabla, $genero){
			$consulta = new Consulta();
			$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo WHERE genero='$genero' LIMIT 50 ";
			$resultadoGenero = $consulta -> ver_registros($sql);
			
			return $resultadoGenero;
		}
		public function alfabeticoModel($tabla)
		{
			$consulta = new Consulta();
			$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo ORDER BY nombrePelicula LIMIT 50";
			$resultado = $consulta ->ver_registros($sql);

			return $resultado;
		}
		public function antiguasModel($tabla)
		{
			$consulta = new Consulta();
			$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo ORDER BY fecha ASC LIMIT 50";
			$resultado = $consulta ->ver_registros($sql);

			return $resultado;
		}
		public function nuevasModel($tabla)
		{
			$consulta = new Consulta();
			$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo ORDER BY fecha DESC LIMIT 50";
			$resultado = $consulta ->ver_registros($sql);

			return $resultado;
		}






		public function alfabeticoGeneroModel($tabla, $genero)
		{
			$consulta = new Consulta();
			if ($genero == "Descargas") {
				$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo WHERE tipo='$genero' ORDER BY nombrePelicula LIMIT 50 ";
			}else{
				$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo WHERE genero='$genero' ORDER BY nombrePelicula LIMIT 50 ";
			}
			
			$resultado = $consulta ->ver_registros($sql);

			return $resultado;
		}
		public function nuevasGeneroModel($tabla, $genero)
		{
			$consulta = new Consulta();
			if ($genero == "Descargas") {
				$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo WHERE tipo='$genero' ORDER BY fecha DESC LIMIT 50 ";
			}else{
				$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo WHERE genero='$genero' ORDER BY fecha DESC LIMIT 50 ";
			}
			
			$resultado = $consulta ->ver_registros($sql);

			return $resultado;
		}
		public function antiguosGeneroModel($tabla, $genero)
		{	
			$consulta = new Consulta();
			if ($genero == "Descargas") {
				$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo WHERE tipo='$genero' ORDER BY fecha ASC LIMIT 50 ";
			}else{
				$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo WHERE genero='$genero' ORDER BY fecha ASC LIMIT 50 ";
			}
			
			
			$resultado = $consulta ->ver_registros($sql);

			return $resultado;
		}

		public function cantidadListaModel($tabla, $cantidad , $tab)
		{
			if ($tab == "todas") {
				$consulta = new Consulta();
				$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo ORDER BY nombrePelicula LIMIT $cantidad,30";
				$resultado = $consulta ->ver_registros($sql);

				return $resultado;
			}
			else{
				$consulta = new Consulta();
				if ($tab == "Descargas") {
					$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo WHERE tipo='$tab' ORDER BY nombrePelicula LIMIT $cantidad,30";
				}else{
					$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo WHERE genero='$tab' ORDER BY nombrePelicula LIMIT $cantidad,30";
				}

				$resultado = $consulta ->ver_registros($sql);

				return $resultado;
			}
		}
			
		}
	

 ?>
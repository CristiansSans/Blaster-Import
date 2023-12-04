<?php 
	
	class gestorGenerosModel{

		public function gestorGeneros($tabla){
			$consulta = new Consulta();
			$sql = "SELECT * FROM $tabla";
			$resultadoGenero = $consulta -> ver_registros($sql);
			return $resultadoGenero;
		}

		public function editarGeneros($tabla , $tabla2, $datosModels){

			$nombre = $datosModels['nombre'];
			$fondo = $datosModels['fondo'];
			$icono = $datosModels['icono'];
			$nombreCriminal = $datosModels['nombreCriminal'];

			$consulta = new Consulta();
			$sql = "UPDATE $tabla SET nombre='$nombre', fondo='$fondo', icono='$icono' WHERE nombre='".$nombreCriminal."' ";
			$resultadoGenero = $consulta -> actualizar_registro($sql);
			$sql2 = "UPDATE $tabla2 SET genero='$nombre' WHERE genero='".$nombreCriminal."' ";
			$resultadoGenero2 = $consulta -> actualizar_registro($sql2);
			
			if ($resultadoGenero) {
				$resultadoGenero = "ok";
			}
			return $resultadoGenero;
		}
		public function generoEliminadoModel($tabla, $nombre){
			$consulta = new Consulta();
			$sql = "DELETE FROM $tabla WHERE nombre='$nombre'";
			$resultadoGenero = $consulta -> borrar_registro($sql);
			return $resultadoGenero;
		}
		public function CrearGeneroModel($tabla, $datosModel){
			$nombre = $datosModel['nombre'];
			$icono = $datosModel['icono'];
			$fondo = $datosModel['fondo'];

			$consulta = new Consulta();
			$sql = "INSERT INTO $tabla ( nombre, fondo, icono) values ( '$nombre', '$fondo', '$icono')";
			$resultadoGenero = $consulta -> nuevo_registro($sql);
			if ($resultadoGenero) {
				$resultadoGenero = "ok";
			}
			return $resultadoGenero;
		}

	}

 ?>
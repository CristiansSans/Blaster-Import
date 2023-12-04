<?php 
	
	class gestorPeliculasModel{

		public function gestorPeliculas($tabla){
			$consulta = new Consulta();
			$sql = "SELECT * FROM $tabla order by fecha DESC , codigo DESC ";
			$resultadoGenero = $consulta -> ver_registros($sql);
			return $resultadoGenero;
		}

		public function editarPelis($tabla , $codigo){
			$consulta = new Consulta();
			$sql= "SELECT * FROM $tabla WHERE codigo=$codigo ";
			$resultado = $consulta -> ver_registros($sql);
			return $resultado;
		}
		public function editarPelisFormulario($tabla, $datosModel){
			$codigo = $datosModel["codigo"];
			$codigoCriminal = $datosModel["codigoCriminal"];
			$nombrePelicula = $datosModel["nombrePelicula"];
			$genero = $datosModel["genero"];
			$cantidad = $datosModel["cantidad"];
			$cinavia = $datosModel["cinavia"];
			$discos = $datosModel["discos"];
			$lenguaje = $datosModel["lenguaje"];
			$clasificacion = $datosModel["clasificacion"];
			$tipo = $datosModel["tipo"];
			$caratula = $datosModel["caratula"];
			$trailer = $datosModel["trailer"];
			$pelicula = $datosModel["pelicula"];
			$fecha = $datosModel["fecha"];
			$peso = $datosModel["peso"];

			$consulta = new Consulta();
			$sql= "UPDATE $tabla SET codigo='$codigo', nombrePelicula='$nombrePelicula', genero='$genero', cantidad='$cantidad', tipo='$tipo', caratula='$caratula', trailer='$trailer', pelicula='$pelicula', fecha='$fecha',peso='$peso', cinavia='$cinavia', lenguaje='$lenguaje', clasificacion='$clasificacion', discos='$discos' WHERE codigo='".$codigoCriminal."' ";
			$resultado = $consulta -> actualizar_registro($sql);

			if ($resultado) {
				$resultado = "ok";
			}else{
				$resultado = "error";
			}
			return $resultado;
		}

		public function gestorPeliculasVentas($tabla){
			$consulta = new Consulta();
			$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo";
			$resultado = $consulta -> ver_registros($sql);
			return $resultado;
		}
		public function gestorPeliculasDescarga($tabla){
			$consulta = new Consulta();
			$sql = "SELECT * FROM $tabla INNER JOIN tipos ON $tabla.tipo = tipos.nombreTipo WHERE tipo='Descargas'";
			$resultado = $consulta -> ver_registros($sql);
			return $resultado;
		}
		public function vistaVendida($tabla){
			$consulta = new Consulta();
			$sql = "SELECT * FROM $tabla order by id DESC";
			$resultado = $consulta -> ver_registros($sql);
			return $resultado;
		}

		public function vistaVendidaInpu($tabla){
			$consulta = new Consulta();
			$sql = "SELECT sum(precio) FROM $tabla";
			$resultado = $consulta -> ver_registros($sql);
			return $resultado;
		}

		public function ventasDia($tabla, $codigo , $nombre, $precio, $inspector, $cedula){
			$consulta = new Consulta();
			$sql = "INSERT INTO $tabla (id,codigo, nombre, precio,cliente) VALUES ('Null','$codigo', '$nombre', '$precio', '$cedula')";
			$resultado = $consulta -> nuevo_registro($sql);
			if ($inspector == true) {
				$sql2 = "UPDATE peliculas SET cantidad= cantidad - 1 WHERE codigo='".$codigo."' ";
				$resultado2 = $consulta -> actualizar_registro($sql2);
			}
			if ($resultado) {
				$resultado = "ok";
			}
			return $resultado;
		}

		public function borrarPelis($tabla , $codigo){
			$consulta = new Consulta();
			$sql = "DELETE FROM $tabla WHERE codigo=$codigo";
			$resultado = $consulta -> borrar_registro($sql);
			return $resultado;
		}
		public function tipoEditadoModel($tabla , $tabla2 , $tipo, $precio, $tipoAnterior){
			$consulta = new Consulta();
			$sql = "UPDATE $tabla SET nombreTipo='$tipo', precioTipo='$precio' WHERE nombreTipo='".$tipoAnterior."' ";
			$resultado = $consulta -> actualizar_registro($sql);

			$sql2 = "UPDATE $tabla2 SET tipo='$tipo' WHERE tipo='".$tipoAnterior."' ";
			$resultadoGenero2 = $consulta -> actualizar_registro($sql2);
			return $resultado;
		}
		public function tipoCreadoModel($tabla , $tipo, $precio){
			$consulta = new Consulta();
			$sql = "INSERT INTO $tabla (nombreTipo, precioTipo) VALUES ('$tipo', '$precio')";
			$resultado = $consulta -> nuevo_registro($sql);
			return $resultado;
		}
		public function tipoEliminadoModel($tabla , $tipo){
			$consulta = new Consulta();
			$sql = "DELETE FROM $tabla WHERE id=$tipo";
			$resultado = $consulta -> borrar_registro($sql);
			return $resultado;
		}
		public function eliminarVentas(){
			$consulta = new Consulta();
			$sql = "DELETE FROM venta";
			$resultado = $consulta -> borrar_registro($sql);
			return $resultado;
		}
		public function quitarModel($tabla, $codigo){
			$consulta = new Consulta();
			$sql = "UPDATE $tabla SET cantidad= cantidad + 1 WHERE codigo='".$codigo."' ";
			$resultado = $consulta -> actualizar_registro($sql);
			return $resultado;
		}
		public function quitarDosModel($tabla, $codigo){
			$consulta = new Consulta();
			$sql = "UPDATE $tabla SET cantidad= cantidad - 1 WHERE codigo='".$codigo."' ";
			$resultado = $consulta -> actualizar_registro($sql);
			return $resultado;
		}

		public function gestorArchi($archivo){

			$culito = split(',', $archivo);

			foreach ($culito as $row => $item) {
				$ubicacion = "E:/xampp/htdocs/Blasterimport-master/Blaster/backend/views/media/peliculas/".$item;

				if (file_exists($ubicacion)) {
					$respuesta = "si";
				}
				else{
					$respuesta = "no";
					break;
				}
			}
			
			return $respuesta;
		}
	}

 ?>
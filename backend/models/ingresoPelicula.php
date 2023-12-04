<?php

class IngresoPeliculaModel{

	public function VerificacionModel(){
		$consulta = new Consulta();
		$tabla = 'peliculas';
		$sql = "SELECT * $tabla WHERE";
	}

	public function ingresoModel($datosModel){

		$consulta = new Consulta();
		$codigo = $datosModel["codigo"];
		$nombrePelicula = $datosModel["nombrePelicula"];
		$genero = $datosModel["genero"];
		$cantidad = $datosModel["cantidad"];
		$tipo = $datosModel["tipo"];
		$cinavia = $datosModel["cinavia"];
		$discos = $datosModel["discos"];
		$clasificacion = $datosModel["clasificacion"];
		$lenguaje = $datosModel["lenguaje"];
		$caratula = $datosModel["caratula"];
		$trailer = $datosModel["trailer"];
		$pelicula = $datosModel["pelicula"];
		$fecha = $datosModel["fecha"];
		$peliculaSize = $datosModel['peso'];
		$peliculaSizeGb = $peliculaSize / 1000000000;
		$tabla = 'peliculas';


		$sql="INSERT INTO $tabla ( codigo, nombrePelicula, genero, cantidad, tipo, caratula, trailer, pelicula, fecha, peso, cinavia,lenguaje,clasificacion,discos) values ( '$codigo', '$nombrePelicula', '$genero', '$cantidad', '$tipo', '$caratula', '$trailer', '$pelicula', '$fecha', '$peliculaSizeGb', '$cinavia', '$lenguaje', '$clasificacion', '$discos')";
		
		$resultado = $consulta -> nuevo_registro($sql);
		
		return $resultado;
	}

	public function gestorTiposModel($tabla){

		$consulta = new Consulta();
		$sql = "SELECT * FROM $tabla";
		$resultado = $consulta -> ver_registros($sql);
		return $resultado;
	}
	public function gestorGenerosModel($tabla){

		$consulta = new Consulta();
		$sql = "SELECT * FROM $tabla";
		$resultado = $consulta -> ver_registros($sql);
		return $resultado;
	}

} 
?>

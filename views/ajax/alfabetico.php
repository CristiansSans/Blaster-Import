<?php 
	require('../../models/conexion.php');
	require('../../models/consulta.php');
	require('../../models/gestorGeneros.php');
	require('../../controllers/gestorGeneros.php');
	/**
	* 
	*/
	class Ajax
	{
		
		public function alfabetico()
		{
			$genero = new gestorGenerosController();

			$respuesta = $genero -> generoFiccionController($_POST['nombrePelicula']);

			
			
			header('Content-Type: application/json');


			echo json_encode($respuesta, JSON_FORCE_OBJECT);
		}
		
	}
	if (isset($_POST['nombrePelicula'])) {
		$ajax = new Ajax();
		$ajax -> generoFiccion();

	}

 ?>
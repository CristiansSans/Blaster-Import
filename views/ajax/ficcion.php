<?php 
	require('../../models/conexion.php');
	require('../../models/consulta.php');
	require('../../models/gestorGeneros.php');
	require('../../controllers/gestorGeneros.php');
	require('../../models/gestordescargas.php');
	require('../../controllers/gestordescargas.php');
	require('../../models/gestorPeliculas.php');
	require('../../controllers/gestorPeliculas.php');
	/**
	* 
	*/
	class Ajax
	{
		
		public function generoFiccion()
		{
			$genero = new gestorGenerosController();

			$respuesta = $genero -> generoFiccionController($_POST['genero']);

			
			
			header('Content-Type: application/json');


			echo json_encode($respuesta, JSON_FORCE_OBJECT);
		}
		public function alfabetico()
		{
			$genero = new gestorGenerosController();

			$respuesta = $genero -> alfabeticoController();

			
			
			header('Content-Type: application/json');


			echo json_encode($respuesta, JSON_FORCE_OBJECT);
		}
		public function antiguas()
		{
			$genero = new gestorGenerosController();

			$respuesta = $genero -> antiguasController();

			
			
			header('Content-Type: application/json');


			echo json_encode($respuesta, JSON_FORCE_OBJECT);
		}
		public function nuevas()
		{
			$genero = new gestorGenerosController();

			$respuesta = $genero -> nuevasController();

			
			
			header('Content-Type: application/json');


			echo json_encode($respuesta, JSON_FORCE_OBJECT);
		}
		public function alfabeticoGenero()
		{
			$genero = new gestorGenerosController();

			$respuesta = $genero -> alfabeticoGeneroController($_POST['generoOrden']);

			
			
			header('Content-Type: application/json');


			echo json_encode($respuesta, JSON_FORCE_OBJECT);
		}
		public function nuevasGenero()
		{
			$genero = new gestorGenerosController();

			$respuesta = $genero -> nuevasGeneroController($_POST['generoOrden']);

			
			
			header('Content-Type: application/json');


			echo json_encode($respuesta, JSON_FORCE_OBJECT);
		}
		public function antiguasGenero()
		{
			$genero = new gestorGenerosController();

			$respuesta = $genero -> antiguosGeneroController($_POST['generoOrden']);

			
			
			header('Content-Type: application/json');


			echo json_encode($respuesta, JSON_FORCE_OBJECT);
		}
		public function ingresoDescargas(){
			$descarga = new gestorDescargaController();
			$respuesta = $descarga -> ingresoDescargasController($_POST['cedulaDescarga']);
			
				header('Content-Type: application/json');

				echo json_encode($respuesta);

						
		}
		public function ingresoDescarga(){
			$descarga = new gestorDescargaController();
			$respuesta = $descarga -> descargar($_POST['cedulaDescargas']);
			
				header('Content-Type: application/json');

				echo json_encode($respuesta);

						
		}

		public function agregarLista()
		{
			$descarga = new gestorGenerosController();
			$respuesta = $descarga -> cantidadListaController($_POST['cantidadLista'],$_POST['tab']);
			
				header('Content-Type: application/json');

				echo json_encode($respuesta);
		}
		public function todasPeliculasAjax()
		{
			$todas = new gestorPeliculasController();
			$respuesta = $todas -> todasPeliculas();
			
				header('Content-Type: application/json');

				echo json_encode($respuesta);
		}
		public function todosLosTrailersAjax()
		{
			$todas = new gestorPeliculasController();
			$respuesta = $todas -> todasTrailers();
			
				header('Content-Type: application/json');
				echo json_encode($respuesta);
		}
		public function CardShow()
		{
			$card = new gestorPeliculasController();
			$respuesta = $card -> cardShowController($_POST['CodigoCard']);
			
				header('Content-Type: application/json');
				echo json_encode($respuesta);
		}
		public function filtroDescarga()
		{
			$card = new gestorPeliculasController();
			$respuesta = $card -> filtroDescargaController($_POST['tipo']);
			
				header('Content-Type: application/json');
				echo json_encode($respuesta);
		}
		public function seriesDescargas()
		{
			$card = new gestorPeliculasController();
			$respuesta = $card -> seriesDescargasController($_POST['seriesDescargas']);
			
				header('Content-Type: application/json');
				echo json_encode($respuesta);
		}

		
		
	}
	if (isset($_POST['genero'])) {
		$ajax = new Ajax();
		$ajax -> generoFiccion();

	}elseif(isset($_POST['alfabetico'])){
		$ajax = new Ajax();
		$ajax -> alfabetico();
	}elseif(isset($_POST['antiguas'])){
		$ajax = new Ajax();
		$ajax -> antiguas();
	}elseif(isset($_POST['nuevas'])){
		$ajax = new Ajax();
		$ajax -> nuevas();
	}elseif(isset($_POST['alfabeticoGenero'])){
		$ajax = new Ajax();
		$ajax -> alfabeticoGenero();
	}elseif(isset($_POST['nuevasGenero'])){
		$ajax = new Ajax();
		$ajax -> nuevasGenero();
	}elseif(isset($_POST['antiguoGenero'])){
		$ajax = new Ajax();
		$ajax -> antiguasGenero();
	}elseif (isset($_POST['cedulaDescarga'])) {
		$ajax = new Ajax();
		$ajax -> ingresoDescargas();
	}elseif (isset($_POST['cantidadLista'])) {
		$ajax = new Ajax();
		$ajax -> agregarLista();
	}elseif (isset($_POST['todasLasPeliculas'])) {
		$ajax = new Ajax();
		$ajax -> todasPeliculasAjax();
	}elseif (isset($_POST['todosLosTrailers'])) {
		$ajax = new Ajax();
		$ajax -> todosLosTrailersAjax();
	}elseif (isset($_POST['CodigoCard'])) {
		$ajax = new Ajax();
		$ajax -> CardShow();
	}elseif (isset($_POST['cedulaDescargas'])) {
		$ajax = new Ajax();
		$ajax -> ingresoDescarga();
	}elseif (isset($_POST['tipo'])) {
		$ajax = new Ajax();
		$ajax -> filtroDescarga();
	}elseif (isset($_POST['seriesDescargas'])) {
		$ajax = new Ajax();
		$ajax -> seriesDescargas();
	}



 ?>
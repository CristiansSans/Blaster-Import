<?php 
	
	class gestorGenerosController{

		public function vistaGeneros(){
			$resultadoGenero = gestorGenerosModel::gestorGeneros("generos");
			
			foreach ($resultadoGenero as $row => $item) {
				
				?>
				<button class="categorias activo <?php echo $item['nombre']; ?>"><?php echo $item['nombre'] ?><i class="<?php echo $item['icono'];  ?>"></i> <input class="fondoGenero" type="text" hidden value="<?php echo $item['fondo']; ?>"></button>
				<?php
				
			}
		}

		public function generoFiccionController($genero)
		{
			
			$resultado = gestorGenerosModel::generoFiccion("peliculas", $genero);

			return $resultado;
			
		}
		public function alfabeticoController()
		{

			$resultado = gestorGenerosModel::alfabeticoModel("peliculas");

			return $resultado;
		}
		public function antiguasController()
		{

			$resultado = gestorGenerosModel::antiguasModel("peliculas");

			return $resultado;
		}
		public function nuevasController()
		{

			$resultado = gestorGenerosModel::nuevasModel("peliculas");

			return $resultado;
		}







		public function alfabeticoGeneroController($genero)
		{

			$resultado = gestorGenerosModel::alfabeticoGeneroModel("peliculas", $genero);

			return $resultado;
		}
		public function nuevasGeneroController($genero)
		{

			$resultado = gestorGenerosModel::nuevasGeneroModel("peliculas", $genero);

			return $resultado;
		}
		public function antiguosGeneroController($genero)
		{

			$resultado = gestorGenerosModel::antiguosGeneroModel("peliculas", $genero);

			return $resultado;
		}

		public function cantidadListaController($cantidad, $tab)
		{

			$resultado = gestorGenerosModel::cantidadListaModel("peliculas", $cantidad,$tab);

			return $resultado;
		}
	}
	
 ?>
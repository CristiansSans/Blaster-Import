<?php
	
	class gestorPeliculasController{

		public function vistaCarousel(){
			$resultado = gestorPeliculasModel::gestorPeliculas("peliculas");

			foreach ($resultado as $row => $item) {

				?>  
				<a class="carousel-item <?php echo $item['codigo'] ?>" onclick="openCity(event, '<?php echo $item['codigo'] ?>')" ><img src="backend/views/media/caratulas/<?php echo $item['caratula'] ?>" alt=""></a> 
				<?php 
			}
		}
		public function vistaCantidad(){

			$resultado = gestorPeliculasModel::cantidadTab("peliculas");
			foreach ($resultado as $row => $item) {

				?>  <div class="tabButt"></div>
				<?php
					}	 
			}

		public function vistaLista(){

			$resultado = gestorPeliculasModel::gestorPeliculas("peliculas");
			$i = 0;
			foreach ($resultado as $row => $item) {

				if ($i == 0) {
					$i++;
				?>  <div class="tabButt">
				<button class="tablinks"  onclick="openCity(event, '<?php echo $item['codigo'] ?>' ,'<?php echo $item['codigo'] ?>') " id="defaultOpen"><?php echo $item['codigo'] ?> &nbsp|&nbsp  <?php echo $item['nombrePelicula'] ?> <input hidden type="text value="<?php echo $row ?>"></button></div>
				<?php
					}
				else {
					 ?>
					 <div class="tabButt"> 
					<button class="tablinks" onclick="openCity(event, '<?php echo $item['codigo'] ?>' , '<?php echo $item['codigo'] ?>')" ><?php echo $item['codigo'] ?> &nbsp|&nbsp  <?php echo $item['nombrePelicula'] ?> <input hidden type="text" value="<?php echo $row ?>"></button></div>
						 <?php
					}
				 
			}
		}

		public function vistaCard(){
			$resultado = gestorPeliculasModel::gestorPeliculas("peliculas");

			foreach ($resultado as $row => $item) {
				
				if ($item['peso']) {
					
				
				?>  
				<div id="<?php echo $item['codigo'] ?>" class="col l4 cardos tabcontent" style="padding: 0;" onclick="on('<?php echo $item['trailer'] ?>')">
				<img class="caratula" src="backend/views/media/caratulas/<?php echo $item['caratula'] ?>" alt="">

				<p> <strong><?php echo $item['nombrePelicula'] ?></strong>  <br> <b>Genero:</b> <?php echo $item['genero'] ?> &nbsp&nbsp <b>Precio:</b> <?php echo $item['precioTipo'] ?> Bs. S &nbsp&nbsp <b>Peso:</b> <?php echo substr($item['peso'], 0 , 4)?> Gb <br> <b>Cantidad:</b>  <?php echo $item['cantidad']?> &nbsp&nbsp<b>Tipo:</b>  <?php echo $item['tipo']?> &nbsp&nbsp <b>Discos:</b><?php echo $item['discos']?><br><b>Cinavia:</b><?php echo $item['cinavia']?> </p>
				<button class="trailer"><h4>Ver trailer&nbsp&nbsp&nbsp<i class="fa fa-play-circle"></i></h4></button>
		</div>
				<?php
			}
				?>  
				<div id="<?php echo $item['codigo'] ?>" class="col l4 cardos tabcontent" style="padding: 0;" onclick="on('<?php echo $item['trailer'] ?>')">
				<img class="caratula" src="backend/views/media/caratulas/<?php echo $item['caratula'] ?>" alt="">

				<p> <strong><?php echo $item['nombrePelicula'] ?></strong>  <br> <b>Genero:</b> <?php echo $item['genero'] ?> &nbsp&nbsp <b>Precio:</b> <?php echo $item['precioTipo'] ?> Bs. S &nbsp&nbsp  <b>Cantidad:</b> <?php echo $item['cantidad']?> <br> <b>Tipo:</b> <?php echo $item['tipo']?> &nbsp&nbsp <b>Discos:</b><?php echo $item['discos']?> &nbsp&nbsp <b>Cinavia:</b><?php echo $item['cinavia']?> </p>
				<button class="trailer">Ver trailer&nbsp&nbsp&nbsp<i class="fa fa-play-circle"></i></button>
		</div>
				<?php
			}
		}
		public function vistaTrailer(){
			$resultado = gestorGenerosModel::nuevasModel("peliculas");

			foreach ($resultado as $row => $item) {

				?>  
					<video  class="overlay <?php echo "a".$row?> traiL" id="<?php echo $item['trailer'] ?>" onended="trailerSolito()">
					<source src="backend/views/media/trailers/<?php echo $item['trailer'] ?>" >
					</video>
				<?php 
			}
		}

		public function todasPeliculas()
		{
			$resultado = gestorPeliculasModel::gestorPeliculas("peliculas");
			return $resultado;
		}

		public function todasTrailers()
		{
			$resultado = gestorPeliculasModel::gestorTrailers("peliculas");
			return $resultado;
		}
		public function cardShowController($codigoCard)
		{
			$resultado = gestorPeliculasModel::cardShowModel("peliculas", $codigoCard);
			return $resultado;
		}
		public function filtroDescargaController($tipo)
		{
			$resultado = gestorPeliculasModel::filtroDescargaModel("peliculas", $tipo);
			return $resultado;
		}
		public function seriesDescargasController($nombre)
		{
			$resultado = gestorPeliculasModel::seriesDescargasModel("peliculas", $nombre);
			return $resultado;
		}



	}

  ?>
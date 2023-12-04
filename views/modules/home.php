
<div id="overlayy">
  <div id="textt">
<center>
<div class="loader"></div> <br>
</div>
</div>
<input type="text" class="home" value="home" hidden>
<div class="todoOculto" id="culoooo" >
<div class="row">
	<div  class="col l4 " >
		<div id="carru" ontouchmove="touch1()" ontouchstart="touch2()" ontouchend="touch3()" class="carousel carrusel">
		   <?php 
	$resultado= new gestorPeliculasController;
	$resultado->vistaCarousel();
 			?>
  		</div> </div>
	<div  class="col l4 icons">
		<center><span class="ig"><i class="fab fa-instagram">&nbsp</i>Peliculascagua</span></center>
		
	</div>
	<div class="col l4">
		<a class="descargas" href="descargas" ><button class="botones">Descargar <i class="fa fa-download"></i></button></a>
	</div>

</div>
			<div class="trailersTodos">
			<video  class="overlay  traiL" id="videoTrail"  onended="trailerSolito()">
					<source class="sour" src="" >
			</video>
 			</div>
 			<input class="miDetector" hidden value="pasa" type="text">
 			<div class="trailerContenido">
 				<center>
			  <h3>Presiona la pantalla para ver mas trailers</h3>
				</center>	
			</div>
<div class="container-fluid">
	<div class="row">
		<div class="col l4 listaPelis" >
			
			<input class="activoLista" type="text" hidden value="true">
			<div class="tab" id="todas" >

			    <?php
			    $resultado= new gestorPeliculasController;
				$resultado->vistaLista();
				$resultado2= new gestorPeliculasController;
				$resultado2->vistaCantidad();
 			?>
			</div>
			<div class="aqui">
				<button class="botones antiguas" >Antiguas <i class="fas fa-caret-down"></i></button>
				<button class="botones alfabetico">Alfabetico <i class="fa fa-language"></i></button>
				<button class="botones nuevas" >Nuevas <i class="fas fa-caret-up"></i></button>
				<button class="botones antiguoGenero" hidden >Antiguas <i class="fas fa-caret-down"></i></button>
				<button class="botones alfabeticoGenero"hidden >Alfabetico <i class="fa fa-language"></i></button>
				<button class="botones nuevasGenero" hidden>Nuevas <i class="fas fa-caret-up"></i></button>
			</div>


		</div>
		<div class="salvadora">
		 
		</div>
		<div class="col l4 generos">
				
				<div class="menu" onclick="myFunction(this)">
				  <h2 >Categorias </h2>
				  <div class="margen">
					  <div class="bar1"></div>
					  <div class="bar2"></div>
					  <div class="bar3"></div>
				  </div>
				</div>
				<div class="categories">
					<button class="todas">Todas</button>
					<button class="down">Descargas</button>
			<?php 
				$resultado= new gestorGenerosController;
				$resultado->vistaGeneros();
 			?>
				</div>	
		</div>
	</div>

</div>
</div>


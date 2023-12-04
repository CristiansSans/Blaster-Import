<div class="container-fluid">
<?php
include 'cabezera.php';
?>

			<br>
				<div class="container-login100 agregarPelicula">
					<div class="wrap-login100 agregarPeliculaTwo">
						<form class="login100-form validate-form editPeli" method="post" id="formIngreso" enctype="multipart/form-data">
							<span class="login100-form-title ">
								Ingresar pelicula al sistema
							</span>
							<span class="login100-form-title p-b-18">
								<i class="zmdi zmdi-font"></i>
							</span>

							<div class="wrap-input100 validate-input">
								<input class="input100" type="number" name="codigo"  required>
								<span class="focus-input100" data-placeholder="Codigo"></span>
							</div>

							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="nombrePelicula"  required>
								<span class="focus-input100" data-placeholder="Nombre de la pelicula"></span>
							</div>
							<div class="wrap-input100 validate-input">
								<select name="generos" >
									<?php 
										$resultado = new ingresopeliculaController();
										$respuesta = $resultado -> gestorGenerosController();
										echo $respuesta;
								 	?>
								</select>
							</div>

							
							<div class="wrap-input100 ">
								<input class="input100" type="number" name="cantidad"  >
								<span class="focus-input100" data-placeholder="Cantidad"></span>
							</div>
							<div class="wrap-input100 ">
								<input class="input100" type="number" name="discos"  min="1" required>
								<span class="focus-input100" data-placeholder="Discos"></span>
							</div>
							<div class="wrap-input100 validate-input">
								
								<select name="tipo" >
									<?php 
										$resultado = new ingresopeliculaController();
										$respuesta = $resultado -> gestorTiposController();
										echo $respuesta;
								 	?>
								</select>
								
							</div>

							<div class="wrap-input100 validate-input">
								
								<select name="cinavia" required >
									<option disabled selected>Cinavia</option>
									<option value="No">No</option>
									<option value="Si">Si</option>
								</select>
								
							</div>
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="lenguaje"  required>
								<span class="focus-input100" data-placeholder="Lenguaje"></span>
							</div>

							<div class="wrap-input100 validate-input">
								
								<select name="clasificacion" required >
									<option disabled selected>Clasificación</option>
									<option value="G">G (todo espectador)</option>
									<option value="PG">PG (menores acompañados de sus padres)</option>
									<option value="14A">14A (menores de 14 años acompañados por adultos)</option>
									<option value="18A">18A (menores de 18 años acompañados por adultos)</option>
									<option value="R">R (restringido, ningún menor de 18 años puede ver esta película)</option>
									<option value="A">A (mayores de 18 años)</option>
								</select>
								
							</div>

							<span class="files">Imagen caratula</span>
							<div class="wrap-input100 validate-input">
								<input class="input100" type="file" name="caratula"  required>
							</div>
							<span class="files">Trailer</span>
							<div class="wrap-input100 validate-input">
								<input class="input100" type="file" name="trailer" required>
							</div>
							<span class="files">Pelicula</span>
							<div class="wrap-input100">
								<input id="peliAgrega" multiple class="input100" type="file" name="pelicula[]" >
							</div>

							<div hidden="" class="wrap-input100">
								<input class="input100 nombreYaRevisado" type="text" name="peliculaNombre"  >
								<span class="focus-input100" data-placeholder="Nombre del archivo de la pelicula..."></span>
							</div>
							<div hidden="" class="wrap-input100">
								<input class="input100 pesoYaRevisado" type="text" name="peliculaPeso"  >
								<span class="focus-input100" data-placeholder="Peso del archivo de la pelicula..."></span>
							</div>

							<div hidden="" class="wrap-input100">
								<input class="input100 cantidadRevision" type="text" name="cantidadRevision"  >
								<span class="focus-input100" data-placeholder="Peso del archivo de la pelicula..."></span>
							</div>
							
							<div class="wrap-input100 validate-input">
								<input class="input100" type="date" name="fecha" required>
							</div>
							

							<div class="container-login100-form-btn">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button class="login100-form-btn agregalaPeli" type="submit">
										Ingresar pelicula
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php 
					
					$ingreso = new ingresopeliculaController();
					$ingreso ->ingresoController();
				
				?>
			
	
</div>
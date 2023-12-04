<div style="height: 10vh;z-index: 10;" class="container-fluid">
<?php
include 'cabezera.php';
?>


</div>

				<div class="container-login100 cambioPelicula" style="margin-top: -100px;">
					<div class="wrap-login100 cambioPeliculaTwo thisHidden">
						
							<form class="fios" method="post">
						        <input type="text"  value="hola" hidden name="dioos">
						        
						        
						     
								<div class="container-login100-form-btn">
									<div class="wrap-login100-form-btn">
										<div class="login100-form-bgbtn"></div>
										<button onclick="verificar();" class="login100-form-btn" type="submit">
											Cerrar dia
										</button>
									</div>
								</div>
							</form>
							<?php 
						        $resultado= new gestorPeliculasController;
						        $resultado->blocControllers();
						      	?>
					</div>
				</div>
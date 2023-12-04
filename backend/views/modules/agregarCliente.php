<div style="height: 10vh;z-index: 10;" class="container-fluid">
<?php
include 'cabezera.php';
?>


</div>
				<div class="container-login100 cambioPelicula" style="margin-top: -100px;">
					<div class="wrap-login100 cambioPeliculaTwo">
						<form class="login100-form validate-form" method="post" id="formIngreso" enctype="multipart/form-data">
							<span class="login100-form-title ">
								Ingresar un nuevo cliente
							</span>
							<span class="login100-form-title p-b-18">
								<i class="zmdi zmdi-font"></i>
							</span>

							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="nombre"  required>
								<span class="focus-input100" data-placeholder="Nombre del cliente..."></span>
							</div>

							<div class="wrap-input100 validate-input">
								<input class="input100" type="number" name="cedula"  required>
								<span class="focus-input100" data-placeholder="Cedula..."></span>
							</div>
							<div class="wrap-input100 validate-input">
								<input class="input100" type="number" name="telefono"  required>
								<span class="focus-input100" data-placeholder="Telefono"></span>
							</div>
							<div class="wrap-input100 validate-input">
								<input class="input100" type="mail" name="correo"  required>
								<span class="focus-input100" data-placeholder="Correo del cliente..."></span>
							</div>
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="direccion"  required>
								<span class="focus-input100" data-placeholder="Direccion del cliente..."></span>
							</div>
							<div class="container-login100-form-btn">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button class="login100-form-btn" type="submit">
										Ingresar Cliente
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php 
					
					$ingreso = new ingresoClienteController();
					$ingreso ->ingresoClientesController();
				
				?>
			

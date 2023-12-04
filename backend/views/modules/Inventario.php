<div style="height: 10vh;z-index: 10;" class="container-fluid">
<?php
include 'cabezera.php';
?>


</div>
<div class="container-login100 inventarioPelicula"  >
					<div class="wrap-login100 inventarioPeliculaTwo thisHidden">
						
							<span class="login100-form-title ">
								Inventario
							</span>
							<span class="login100-form-title p-b-18">
								<i class="zmdi zmdi-font"></i>
							</span>
						<div class="row">
							<div class="wrap-input100 inputinvent col-sm-5">
								<input class="input100 inputInventario" type="number" name="nombre" autofocus placeholder="CODIGO"  required>
								<span class="focus-input100"  ></span>

							</div>
							<div class="wrap-input100 inputinvent col-sm-5">
								<input class="input100 inputInventarioDos" type="number" name="nombre" autofocus placeholder="CANTIDAD"  required>
								<span class="focus-input100"  ></span>
							</div>

						</div>
					
					</div>

					<div class="tablas" style=" height: 60vh;">
						<table id="id01" class="table reportes" style="margin-top: 0">
					    <thead class="thead-dark">
					      <tr style="text-align: center;">
					        <th>Codigo</th>
					        <th>Nombre</th>
					        <th>Comentario</th>
					        <th>fecha</th>
					      </tr>
					    </thead>
					    <tbody >
					    <?php 
									$resultado= new gestorPeliculasController;
									$resultado->vistaReporte();
					 	?>
					    </tbody>
					  </table>
					</div>
				</div>

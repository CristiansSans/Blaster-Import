<?php
if(isset($_SESSION["validar"])){

            header("location:home");

            exit();
}
    $ingreso = new Ingreso();
    $ingreso -> ingresoController();
    if (!$_POST) {
                  
?>

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" id="formIngreso">
					<span class="login100-form-title p-b-26">
						Bienvenido
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valido: Luis">
						<input class="input100" type="text" name="usuarioIngreso" maxlength="10" required>
						<span class="focus-input100" data-placeholder="Usuario"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="passwordIngreso" required>
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Acceder
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
</div>
	
<div id="dropDownSelect1"></div>

<?php } ?>
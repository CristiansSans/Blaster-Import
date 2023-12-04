<?php
session_start();
class Ingreso{

	public function ingresoController(){

		if(isset($_POST["usuarioIngreso"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])){

			   	//$encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array("usuario"=>$_POST["usuarioIngreso"],
				                     "password"=>$_POST["passwordIngreso"]);

				$respuesta = IngresoModels::ingresoModel($datosController, "usuarios");
				
				$resultado = $respuesta[0];
				$intentos = $resultado["intentos"];
				//var_dump($resultado);
				$usuarioActual = $_POST["usuarioIngreso"];
				$maximoIntentos = 2;

				if($intentos < $maximoIntentos){

					if ($resultado["rol"]==0) {
						
						if(strtolower($resultado["usuario"]) == $_POST["usuarioIngreso"] && $_POST["passwordIngreso"] == $resultado["contrasena"]){

							$intentos = 0;

							$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);
							$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");
							$_SESSION["validar"] = true;
							$_SESSION["usuario"] = $resultado["usuario"];
							$_SESSION["id"] = $resultado["id"];
							$_SESSION["password"] = $resultado["contrasena"];
							$_SESSION["rol"] = $resultado["rol"];


							header("Location: home");
			
						} else{

							++$intentos;

							$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

							$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");

							echo '<div class="alert alert-danger">Error al ingresar.</div>';

						}

					} else{
						echo '<div class="alert alert-danger">Este es el login unicamente de administradores.</div>';
					}

				} else{
					$intentos = 0;

					$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

					$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");

					echo '<div class="alert alert-danger">Ha fallado 3 veces, demuestre que no es un robot</div>';

				}

			} else{
				echo "ERROR! El nombre de usuario no debe contener espacios.";
			}

		}
	}

}
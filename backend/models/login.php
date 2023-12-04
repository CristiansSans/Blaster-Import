<?php

class IngresoModels{

	public function ingresoModel($datosModel, $tabla){

		$consulta = new Consulta();
		$usuario = $datosModel["usuario"];
		$sql="SELECT * FROM $tabla WHERE usuario = '$usuario'";
		
		$resultado = $consulta -> ver_registros($sql);
		return $resultado;
	}

	public function intentosModel($datosModel, $tabla){

		$consulta = new Consulta();
		$tries = $datosModel["actualizarIntentos"];
		$usuario = $datosModel["usuarioActual"];
		$sql = "UPDATE $tabla SET intentos = '$tries' WHERE usuario = '$usuario'";

		$resultado = $consulta -> actualizar_registro($sql);

		if($resultado){
			return "ok";
		}
		else{
			return "error";
		}

	}

}
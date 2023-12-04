<?php 

	/**
	 * 
	 */
	class gestorDescargaModel
	{
		
		function ingresoDescargasModel($cedula)
		{
			$consulta = new Consulta();
			$sql = "SELECT * FROM ".$cedula."cliente";
			$resultado = $consulta -> ver_registros($sql);
			$sql2 = "SELECT nombre FROM clientes where cedula = $cedula";
			$resultado2 = $consulta -> ver_registros($sql2);
			return $result = array($resultado, $resultado2);
		}

		function gestorCliente($cedula)
		{
			$consulta = new Consulta();
			$sql = "SELECT nombre FROM clientes where cedula = $cedula";
			$resultado = $consulta -> ver_registros($sql);
			return $resultado;
		}
	}


 ?>
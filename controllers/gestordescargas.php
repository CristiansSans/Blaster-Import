<?php 
	
	
	class gestorDescargaController 
	{
		
		function ingresoDescargasController($cedula)
		{
			$inspector = true;
				$conect=mysqli_connect("localhost","root","","blaster") or die("Error: ".mysql_error());
				
				$valid = mysqli_query($conect,"SELECT cedula FROM clientes WHERE cedula='".$cedula."'");
					if ( mysqli_num_rows($valid)>0) {
								
								$inspector = true;			
					}else{
						
								$inspector = false;
					}
					if (isset($inspector) && $inspector == true) {
						$resultado = "si";
						return $resultado;
					}
				
			
			
		}

		function descargar($cedula){
			$resultado = gestorDescargaModel::ingresoDescargasModel($cedula);
						return $resultado;
		}
	}


 ?>
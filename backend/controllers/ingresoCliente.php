<?php

/**
 * 
 */
class ingresoClienteController 
{
	
	function ingresoClientesController()
	{	if (isset($_POST['nombre'])) {
		$inspector = true;
		$conect=mysqli_connect("localhost","root","","blaster") or die("Error: ".mysqli_error());
		
		$valid = mysqli_query($conect,"SELECT cedula FROM clientes WHERE cedula='".$_POST['cedula']."'");
		if ( mysqli_num_rows($valid)>0) {
						echo'<script>
							swal({
						        title: "¡Error!",
						        text: "¡La cedula ya existe!",
						        icon: "error",
						    })
						    .then((result) => {
								if (result) {
									window.location = "agregarCliente"
								}else{
									window.location = "agregarCliente"
								}
							}) 
						</script>';
						$inspector = false;			
								}
							}
		if (isset($inspector) && $inspector == true) {
			$nombre = $_POST['nombre'];
			$cedula = $_POST['cedula'];
			$telefono = $_POST['telefono'];
			$correo = $_POST['correo'];
			$direccion = $_POST['direccion'];

	         $datosController = array(  "nombre"=>$nombre,
										"cedula"=>$cedula,
										"telefono"=>$telefono,
										"correo"=>$correo,
										"direccion"=>$direccion
								);
	        $resultado = new ingresoClienteModel();
				
			$resultado = ingresoclienteModel::ingresoClientesModel($datosController);
			

					echo'<script>
							swal({
						        title: "¡OK!",
						        text: "¡El cliente ha sido ingresado correctamente!",
						        icon: "success",
						    })
						    .then((result) => {
								if (result) {
									window.location = "agregarCliente"
								}else{
									window.location = "agregarCliente"
								}
							}) 
						</script>';

			
			
		}

	}

	public function gestorClienteController($cedula)
	{	
		$inspector = true;
				$conect=mysqli_connect("localhost","root","","blaster") or die("Error: ".mysqli_error());
				
				$valid = mysqli_query($conect,"SELECT cedula FROM clientes WHERE cedula='".$cedula."'");
					if ( mysqli_num_rows($valid)>0) {
								
								$inspector = true;			
					}else{
						
								$inspector = false;
					}
					if (isset($inspector) && $inspector == true) {
						$resultado = ingresoclienteModel::gestorClienteModel($cedula);
						return $resultado;
					}

	}

	public function gestorClienteIngresoController($codigo, $cedula){
		$codigos = split(',', $codigo);
		foreach ($codigos as $row => $item) {
			$resultado = ingresoclienteModel::gestorClienteIngresosModel($item );foreach ($resultado as $row => $item) {
					$datosController = array("codigo"=>$item['codigo'],
		         						"nombrePelicula"=>$item['nombrePelicula'],
		         						"genero"=>$item['genero'],
		         						"caratula"=>$item['caratula'],
		         						"peso"=>$item['peso'],
		         						"pelicula"=>$item['pelicula']
									);
		        
		}
		$resultado2 = ingresoclienteModel::gestorClienteIngresosModel2($datosController , $cedula);
	}
		
		
		return $resultado;
	}
	public function gestorClientesListaController()
	{
		$resultado = ingresoclienteModel::gestorClientesListaModel();

			foreach ($resultado as $row => $item) {
				
				?>
				<tr class="item">
			      	<td style="text-align: center;"><?php echo $item['nombre'] ?></td>
			        <td style="text-align: center;"><?php echo $item['cedula'] ?></td>
			        <td style="text-align: center;"><?php echo $item['telefono'] ?></td>
			        <td style="text-align: center;"><?php echo $item['correo'] ?></td>
			        <td style="text-align: center;"><?php echo $item['direccion'] ?></td>
			        <td class="editarClientePelicula" style="font-size: 18px;cursor: pointer;text-align: center;"><input type="text" hidden value="<?php echo $item['cedula'] ?>"> <i class="fas fa-edit"></i></td>
			        <td  class="deleteCliente" style="font-size: 18px;cursor: pointer;text-align: center;"><input type="text" hidden value="<?php echo $item['cedula'] ?>"> <i class="fas fa-trash"></i></td>
			     </tr>
				<?php

			}
	}
	public function gestorClientesListaEditarController()
	{
		$resultado = ingresoclienteModel::gestorClientesListaModel();

			foreach ($resultado as $row => $item) {
				
				?>
				<tr class="item">
			      	<td style="text-align: center;"><?php echo $item['nombre'] ?></td>
			        <td style="text-align: center;"><?php echo $item['cedula'] ?></td>
			        <td style="text-align: center;"><?php echo $item['telefono'] ?></td>
			        <td style="text-align: center;"><?php echo $item['correo'] ?></td>
			        <td style="text-align: center;"><?php echo $item['direccion'] ?></td>
			        <td class="editarCliente" style="font-size: 18px;cursor: pointer;text-align: center;"><input type="text" hidden value="<?php echo $item['cedula'] ?>"> <i class="fas fa-edit"></i></td>
			        <td  class="deleteCliente" style="font-size: 18px;cursor: pointer;text-align: center;"><input type="text" hidden value="<?php echo $item['cedula'] ?>"> <i class="fas fa-trash"></i></td>
			     </tr>
				<?php

			}
	}
	public function gestorClienteQuitarController($codigo ,$cedula)
	{
		$resultado = ingresoclienteModel::gestorClienteQuitarModel($codigo ,$cedula);
		return $resultado;
	}
	public function gestorClienteEliminarController($cedula)
	{
		$resultado = ingresoclienteModel::gestorClienteEliminarModel($cedula);
		return $resultado;
	}

	public function gestorClientesListaVentas()
	{
		$resultado = ingresoclienteModel::gestorClientesListaModel();

			foreach ($resultado as $row => $item) {
				
				?>
				<tr onclick="desFocus()" class="item itemVent">
			      	<td style="text-align: center;"><?php echo $item['nombre'] ?></td>
			        <td style="text-align: center;"><?php echo $item['cedula'] ?></td>
			   
			     </tr>
				<?php

			}
	}
	public function gestorClienteEditarController($cedula)
	{
		$resultado = ingresoclienteModel::gestorClienteEditarModel($cedula);

		return $resultado;
	}
	public function gestorClienteEditarEditadoController($cedulaVieja,$cedulaNueva,$nombre,$telefono,$correo,$direccion)
	{
		$resultado = ingresoclienteModel::gestorClienteEditarEditadoModel($cedulaVieja,$cedulaNueva,$nombre,$telefono,$correo,$direccion);

		return $resultado;
	}
}

?>
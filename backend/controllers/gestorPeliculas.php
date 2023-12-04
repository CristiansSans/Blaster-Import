<?php 
	
	class gestorPeliculasController{

		public function vistaPeliculas(){
			$resultado = gestorPeliculasModel::gestorPeliculas("peliculas");

			foreach ($resultado as $row => $item) {
				
				?>
				<tr class="item" id="<?php echo $row ?>">
			      	<td style="text-align: center;"><?php echo $item['codigo'] ?></td>
			        <td style="text-align: center;"><?php echo $item['nombrePelicula'] ?></td>
			        <td style="text-align: center;"><?php echo $item['genero'] ?></td>
			        <td style="text-align: center;"><input class="inputCantidad <?php echo $row ?>" type="text" style="text-align: center;" value="<?php echo $item['cantidad'] ?>"></td>
			        <td style="text-align: center;"><?php echo $item['discos'] ?></td>
			        <td style="text-align: center;"><?php echo $item['tipo'] ?></td>
			        <td style="text-align: center;"><?php echo $item['cinavia'] ?></td>
			        <td style="text-align: center;"><?php echo $item['lenguaje'] ?></td>
			        <td style="text-align: center;"><?php echo $item['clasificacion'] ?></td>
			        <td style="text-align: center;"><?php echo $item['fecha'] ?></td>
			        <td class="editar" style="font-size: 18px;cursor: pointer;text-align: center;"><input type="text" hidden value="<?php echo $item['codigo'] ?>"> <i class="fas fa-edit"></i></td>
			        <td  class="delete" style="font-size: 18px;cursor: pointer;text-align: center;"><input type="text" hidden value="<?php echo $item['codigo'] ?>"> <i class="fas fa-trash"></i></td>
			     </tr>
				<?php

			}
		}

		public function blocControllers(){
			
			if (isset($_POST['dioos'])) {

				$resultado = gestorPeliculasModel::vistaVendida("venta");
				$resultado2 = gestorPeliculasModel::vistaVendidaInpu("venta");
				$fecha_actual=date("d-m-Y");
				$fh = fopen("E:/xampp/htdocs/Blasterimport-master/Blaster/backend/ventas diarias/venta.".$fecha_actual.".txt", 'w') or die("Se produjo un error al crear el archivo");
				$cabecera = <<<_END
Codigo       /       Nombre     /       Cliente Cedula       /       Precio 
_END;
$texto2= "";
				foreach ($resultado as $row => $item) {
					$itemCodigo = $item['codigo'];
  					$itemNombre = $item['nombre'];
  					$itemPrecio = $item['precio'];
  					$cliente = $item['cliente'];
 						 $texto = <<<_END
$itemCodigo   /      $itemNombre    /    $cliente    /    $itemPrecio BsS
_END;
$texto2 = $texto2 . PHP_EOL .$texto;
  
 
				}
				foreach ($resultado2 as $row => $item) {
				$texto3 = $item['sum(precio)'];
			}
				$texto2 = $cabecera . PHP_EOL . $texto2. PHP_EOL . PHP_EOL . "TOTAL==>". $texto3 . " BsS";

			fwrite($fh, $texto2) or die("No se pudo escribir en el archivo");
  			fclose($fh);
  			$resultado3 = gestorPeliculasModel::eliminarVentas();
  			echo'<script>
									swal({
								        title: "¡Listo!",
								        text: "¡Se han cerrado las ventas de hoy!",
								        icon: "success",
								    })
								    .then((result) => {
										if (result) {
											window.location = "home"
										}else{
											window.location = "home"
										}
									}) 
								</script>';	
			} 
				
		}

		public function vistaVentas(){
			$resultado = gestorPeliculasModel::gestorPeliculasVentas("peliculas");
			foreach ($resultado as $row => $item) {
				?>
				<tr  class="item peliculasVentas <?php echo $item['codigo'] ?>">
			      	<td style="text-align: center;"><input hidden type="text" value="<?php echo $item['codigo'] ?>"><?php echo $item['codigo'] ?></td>
			        <td style="text-align: center;"><input hidden type="text" value="<?php echo $item['nombrePelicula'] ?>"><?php echo $item['nombrePelicula'] ?></td>
			        <td style="text-align: center;"><input hidden type="text" value="<?php echo $item['cantidad'] ?>"><?php echo $item['cantidad'] ?></td>
			        <td style="text-align: center;"><input hidden type="text" value="<?php echo $item['precioTipo'] ?>"><?php echo $item['precioTipo'] ?></td>
			        <td style="text-align: center;"><input hidden type="text" value="<?php echo $item['discos'] ?>"><?php echo $item['discos'] ?></td>
			        <td style="display:none;text-align: center;"><input hidden type="text" value="<?php echo $item['tipo'] ?>"><?php echo $item['tipo'] ?></td>
			    </tr>	
				<?php
				}
		}
		public function vistaDescargas(){
			$resultado = gestorPeliculasModel::gestorPeliculasDescarga("peliculas");
			foreach ($resultado as $row => $item) {
				?>
				<tr  class="peliculasVentas item <?php echo $item['codigo'] ?>">
			      	<td style="text-align: center;"><input hidden type="text" value="<?php echo $item['codigo'] ?>"><?php echo $item['codigo'] ?></td>
			        <td style="text-align: center;"><input hidden type="text" value="<?php echo $item['nombrePelicula'] ?>"><?php echo $item['nombrePelicula'] ?></td>
			        <td style="text-align: center;"><input hidden type="text" value="<?php echo $item['genero'] ?>"><?php echo $item['genero'] ?></td>
			        <td style="text-align: center;" class="agregarPeli" ><input class="CeduCliente" type="text" value="" hidden><input type="text" value="<?php echo $item['codigo'] ?>" hidden><i style="font-size: 20px;cursor: pointer;" class="fa fa-arrow-right"></i></td>
			    </tr>	
				<?php
				}
		}
		public function vistaVentaInput(){
			$resultado = gestorPeliculasModel::vistaVendidaInpu("venta");
			foreach ($resultado as $row => $item) {
				if ($item['sum(precio)']) {
					?>
				<input style="width: 20%;" class="inputVenta inputTotal" type="text" value="<?php echo $item['sum(precio)']?> BsS" placeholder="Total...">
				<?php
				}
				else{
					?>
				<input style="width: 20%;" class="inputVenta inputTotal" type="text" value="0 BsS" placeholder="Total...">
				<?php
				}
				
			}
				
				
		}

		public function ventaDia($codigo , $nombre , $precio , $cedula){
				$inspector = true;
				$conect= mysqli_connect("localhost:3306","root","","blaster") or die("Error: ".mysqli_error());
				$valid = mysqli_query($conect,"SELECT cantidad FROM peliculas WHERE cantidad='Ilimitado' AND codigo='".$codigo."'");
					if ( mysqli_num_rows($valid)>0) {
							$inspector =false;				
					}
			$resultado = gestorPeliculasModel::ventasDia("venta" , $codigo, $nombre , $precio ,$inspector,$cedula);

			if ($resultado == "ok") {
				echo'<script>window.location = "home"</script>';
			}
			
			
		}

		public function vistaVendidas(){
			$resultado = gestorPeliculasModel::vistaVendida("venta");
			foreach ($resultado as $row => $item) {
				?>
				<tr >
			      	<td style="text-align: center;"><?php echo $item['codigo'] ?></td>
			        <td style="text-align: center;"><?php echo $item['nombre'] ?></td>
			        <td style="text-align: center;"><?php echo $item['precio'] ?></td>
			        <td style="text-align: center;"><?php echo $item['cliente'] ?></td>
			    </tr>	
				<?php
				}
		}

		public function editarPeliculas($codigo){
			

			$resultado = gestorPeliculasModel::editarPelis("peliculas", $codigo);

			return $resultado;
		}
		public function editarPeliculasFormulario(){
			
			

			if ($_POST) {
				if ($_POST['codigoCriminal'] != $_POST['codigo']) {
				$conect=mysqli_connect("localhost","root","","blaster") or die("Error: ".mysqli_error());
				
				$valid = mysqli_query($conect,"SELECT codigo FROM peliculas WHERE codigo='".$_POST['codigo']."'");
					if ( mysqli_num_rows($valid)>0) {
								echo'<script>
									swal({
								        title: "¡Error!",
								        text: "¡El codigo ya existe!",
								        icon: "error",
								    })
								    .then((result) => {
										if (result) {
											window.location = "editarPeliculas"
										}else{
											window.location = "editarPeliculas"
										}
									}) 
								</script>';			
					}
				}
			}
			 
			if (isset($_POST['nombrePelicula'])) {

				$codigo = $_POST['codigo'];
				$codigoCriminal = $_POST['codigoCriminal'];
				$nombrePelicula = $_POST['nombrePelicula'];
				$generos = $_POST['generos'];
				$cantidad = $_POST['cantidad'];
				$discos = $_POST['discos'];
				$cinavia = $_POST['cinavia'];
				$lenguaje = $_POST['lenguaje'];
				$clasificacion = $_POST['clasificacion'];
				$tipo = $_POST['tipo'];

				$fechaCriminal = $_POST['fechaCriminal'];
				$caratulaCriminal = $_POST['caratulaCriminal'];
				$trailerCriminal = $_POST['trailerCriminal'];
				$peliculaCriminal = $_POST['peliculaCriminal'];
				
				
				
		        

		        if ($_POST['fecha'] != '') {
		        	$fecha = $_POST['fecha'];
		        }else{
		        	$fecha = $fechaCriminal;
		        }

		        if ($_FILES['caratula']['tmp_name'] != '') {
			         $origenCaratula = $_FILES['caratula']['tmp_name'];
			         $destinoCaratula = 'views/media/caratulas/'.$_FILES['caratula']['name'];
			         move_uploaded_file($origenCaratula, $destinoCaratula);
			         $caratula = $_FILES['caratula']['name'];
		     	}else{
		     		$caratula = $caratulaCriminal;
		     	}

		         if ($_FILES['trailer']['tmp_name'] != '') {
		         	$origenTraile = $_FILES['trailer']['tmp_name'];
			         $destinoTrailer = 'views/media/trailers/'.$_FILES['trailer']['name'];
			         move_uploaded_file($origenTraile, $destinoTrailer);
			         $trailer = $_FILES['trailer']['name'];
		         }else{
		         	$trailer = $trailerCriminal;
		         }
		         
		         

		         if ($_FILES['pelicula[]']['tmp_name'] != '') {
		         	$cantidadSubidas = $_POST['cantidadRevision'];
		         	
		         	for ($i=0; $i < $cantidadSubidas ; $i++) { 
	         			$origenPelicula = $_FILES['pelicula']['tmp_name'][$i];
				        $destinoPelicula = 'views/media/peliculas/'.$_FILES['pelicula']['name'][$i];
				        move_uploaded_file($origenPelicula, $destinoPelicula);
				        if ($i == 0) {
				        	$pelicula = $_FILES['pelicula']['name'][$i];
			        		$peliculaSize = $_FILES['pelicula']['size'][$i];
				        }
				        else{
				        	$pelicula = $pelicula.",".$_FILES['pelicula']['name'][$i];
			        		$peliculaSize = $peliculaSize.",".$_FILES['pelicula']['size'][$i];
				        }
			        
	         		}
		         }else{
		         	$pelicula = $peliculaCriminal;
		         	$peliculaSize = $_POST['pesoPelicula'];
		         }
		         if ($_FILES['pelicula']['tmp_name'] != '') {
		         	$cantidadSubidas = $_POST['cantidadRevision'];
		         	
		         	for ($i=0; $i < $cantidadSubidas ; $i++) { 
	         			$origenPelicula = $_FILES['pelicula']['tmp_name'][$i];
				        $destinoPelicula = 'views/media/peliculas/'.$_FILES['pelicula']['name'][$i];
				        move_uploaded_file($origenPelicula, $destinoPelicula);
				        if ($i == 0) {
				        	$pelicula = $_FILES['pelicula']['name'][$i];
			        		$peliculaSize = $_FILES['pelicula']['size'][$i];
				        }
				        else{
				        	$pelicula = $pelicula.",".$_FILES['pelicula']['name'][$i];
			        		$peliculaSize = $peliculaSize.",".$_FILES['pelicula']['size'][$i];
				        }
			        
	         		}
		         }




		         if ($_POST['nombreYaRevisado'] != '') {
		         	$pelicula = $_POST['nombreYaRevisado'];
		         }
		         
		         if ($_POST['pesoYaRevisado'] != '') {
		         	$peliculaSize = $_POST['pesoYaRevisado'];
		         }
		         

		         
		         

		         $datosController = array("codigo"=>$codigo,
		         						"codigoCriminal"=>$codigoCriminal,
										"nombrePelicula"=>$nombrePelicula,
										"genero"=>$generos,
										"cantidad"=>$cantidad,
										"tipo"=> $tipo,
										"cinavia"=> $cinavia,
										"discos"=> $discos,
										"lenguaje"=> $lenguaje,
										"clasificacion"=> $clasificacion,
										"caratula"=> $caratula,
										"trailer"=> $trailer,
										"pelicula"=> $pelicula,
										"fecha"=> $fecha,
										"peso"=> $peliculaSize,
									);
		        
					
				$resultado = gestorPeliculasModel::editarPelisFormulario("peliculas", $datosController);
				

				if ($resultado == "ok") {

						echo'<script>
								swal({
							        title: "¡OK!",
							        text: "¡La pelicula ha sido editada correctamente!",
							        icon: "success",
							    })
							    .then((result) => {
									if (result) {
										window.location = "editarPeliculas"
									}else{
										window.location = "editarPeliculas"
									}
								}) 
							</script>';

				}
			}
		}

		public function borrarPeli($codigo){
			$resultado = gestorPeliculasModel::borrarPelis("peliculas", $codigo);

			return $resultado;
		}
		public function tipoEditadoController($tipo, $precio, $tipoAnterior){
			$inspector = true;
			if ($tipo != $tipoAnterior) {
				
				$conect=mysqli_connect("localhost","root","","blaster") or die("Error: ".mysqli_error());
				
				$valid = mysqli_query($conect,"SELECT nombreTipo FROM tipos WHERE nombreTipo='".$tipo."'");
					if ( mysqli_num_rows($valid)>0) {
								echo'<script>
									swal({
								        title: "¡Error!",
								        text: "¡El codigo ya existe!",
								        icon: "error",
								    })
								    .then((result) => {
										if (result) {
											window.location = "editarPeliculas"
										}else{
											window.location = "editarPeliculas"
										}
									}) 
								</script>';
								$inspector = false;			
					}
			}

			if (isset($inspector) && $inspector == true) {
				$resultado = gestorPeliculasModel::tipoEditadoModel("tipos", "peliculas", $tipo, $precio, $tipoAnterior);

			return $resultado;
			}
			
		}

		public function tipoCreadoController($tipo, $precio){

	

				$resultado = gestorPeliculasModel::tipoCreadoModel("tipos", $tipo, $precio);

			return $resultado;
			
		}
		public function tipoEliminadoController($tipo){
			$resultado = gestorPeliculasModel::tipoEliminadoModel("tipos", $tipo);

			return $resultado;
		}
		public function cambioPeliculaController($codigo){
			$resultado = gestorPeliculasModel::quitarModel("peliculas", $codigo);

			return $resultado;
		}
		public function cambioPeliculaDosController($codigo){
			$resultado = gestorPeliculasModel::quitarDosModel("peliculas", $codigo);

			return $resultado;
		}
		public function gestorArchivos($archivo){
			$resultado = gestorPeliculasModel::gestorArchi($archivo);

			return $resultado;
		}

		public function hacerInventario($codigo , $cantidad){

			$inspector = true;		
				$conect=mysqli_connect("localhost","root","","blaster") or die("Error: ".mysqli_error());
				
				$valid = mysqli_query($conect,"SELECT codigo FROM peliculas WHERE codigo='".$codigo."'");
					if ( mysqli_num_rows($valid)==0) {
								$inspector = false;
								$resultado2 = "ok";
								return $resultado2;
											
					}
			

			if (isset($inspector) && $inspector == true) {
				$resultado = gestorPeliculasModel::hacerInventarioModel($codigo , $cantidad);

			return $resultado;
			}
			
		}

		public function vistaReporte(){
			$resultado = gestorPeliculasModel::vistaReportes();
			foreach ($resultado as $row => $item) {
				?>
				<tr  class="peliculasVentas">
			      	<td style="text-align: center;"><?php echo $item['codigo'] ?></td>
			        <td style="text-align: center;"><?php echo $item['nombre'] ?></td>
			        <td style="text-align: center;"><?php echo $item['comentario'] ?></td>
			        <td style="text-align: center;"><?php echo $item['fecha'] ?></td>
			    </tr>	
				<?php
				}
		}
		public function cantidadCambiarController($cantidad,$codigo){
			$resultado = gestorPeliculasModel::cantidadCambiarModel($cantidad,$codigo);

			return $resultado;
		}
		public function limpiarController(){
			$resultado = gestorPeliculasModel::limpiarModel('peliculas');

			return $resultado;
		}


	}	
 ?>
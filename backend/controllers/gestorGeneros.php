<?php 
	
	class gestorGenerosController{

		public function vistaGeneros(){
			$resultadoGenero = gestorGenerosModel::gestorGeneros("generos");

			foreach ($resultadoGenero as $row => $item) {
				
				?>
				<tr>
			      	<td style="text-align: center;"><?php echo $item['nombre'] ?></td>
			        <td style="text-align: center;"><?php echo $item['fondo'] ?></td>
			        <td style="text-align: center;"><i class="<?php echo $item['icono'] ?>">-</i><?php echo $item['icono'] ?></td>
			        <td class="editGene" style="font-size: 18px;cursor: pointer;text-align: center;"> <i class="fas fa-edit"></i> <input type="text" value="<?php echo $item['nombre'] ?>" hidden><input type="text" value="<?php echo $item['fondo'] ?>" hidden><input type="text" value="<?php echo $item['icono'] ?>" hidden></td>

			        <td class="EliminarGene" style="font-size: 18px;cursor: pointer;text-align: center;"> <i class="fas fa-trash"></i> <input type="text" value="<?php echo $item['nombre'] ?>" hidden></td>
			     </tr>
				<?php

			}
			?>
				<tr>
			      	<td style="text-align: center;"></td>
			        <td style="text-align: center;"></td>
			        <td style="text-align: center;"></td>
			        <td style="text-align: center;"></td>
			        <td class="newGene" style="font-size: 18px;cursor: pointer;text-align: center;">Nuevo <i class="fas fa-plus"></i></td>
			     </tr>
				<?php

		}

		public function editarGeneros(){
			

			if (isset($_POST['nombre'])) {
				$inspector = true;
				if ($_POST['nombre'] != $_POST['nombreCriminal']) {
				$conect=mysqli_connect("localhost","root","","blaster") or die("Error: ".mysqli_error());
				
				$valid = mysqli_query($conect,"SELECT nombre FROM generos WHERE nombre='".$_POST['nombre']."'");
					if ( mysqli_num_rows($valid)>0) {
								echo'<script>
									swal({
								        title: "¡Error!",
								        text: "¡El genero ya existe!",
								        icon: "error",
								    })
								    .then((result) => {
										if (result) {
											window.location = "editarGeneros"
										}else{
											window.location = "editarGeneros"
										}
									}) 
								</script>';	
								$inspector=false;		
					}
				}
			}

			if (isset($inspector) && $inspector == true) {
				
				$nombre = $_POST['nombre'];
				$nombreCriminal = $_POST['nombreCriminal'];
				$fondoCriminal = $_POST['fondoCriminal'];
				$iconoCriminal = $_POST['iconoCriminal'];


				if ($_POST['gender'] != '') {
		        	$icono = $_POST['gender'];
		        }else{
		        	$icono = $iconoCriminal;
		        }

		        if ($_FILES['fondo']['tmp_name'] != '') {
			         $origenCaratula = $_FILES['fondo']['tmp_name'];
			         $destinoCaratula = 'views/media/fondos/'.$_FILES['fondo']['name'];
			         move_uploaded_file($origenCaratula, $destinoCaratula);
			         $fondo = $_FILES['fondo']['name'];
		     	}else{
		     		$fondo = $fondoCriminal;
		     	}

		     	$datosController = array("nombre"=>$nombre,
		         						"icono"=>$icono,
										"fondo"=>$fondo,
										"nombreCriminal"=>$nombreCriminal
									);
		        
					
				$resultado = gestorGenerosModel::editarGeneros("generos", "peliculas" , $datosController);
				if ($resultado == "ok") {
					echo'<script>
									swal({
								        title: "¡Listo!",
								        text: "¡El genero fue editado!",
								        icon: "success",
								    })
								    .then((result) => {
										if (result) {
											window.location = "editarGeneros"
										}else{
											window.location = "editarGeneros"
										}
									}) 
								</script>';	
				}
				else{
					echo'<script>
									swal({
								        title: "¡Error!",
								        text: "¡Fallas tecnicas!",
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

		public function crearGeneros(){
			

			if (isset($_POST['nombreCrear'])) {
				
				$conect=mysqli_connect("localhost","root","","blaster") or die("Error: ".mysqli_error());
				
				$valid = mysqli_query($conect,"SELECT nombre FROM generos WHERE nombre='".$_POST['nombreCrear']."'");
				$inspector = true;
					if ( mysqli_num_rows($valid)>0) {
								echo'<script>
									swal({
								        title: "¡Error!",
								        text: "¡El genero ya existe!",
								        icon: "error",
								    })
								    .then((result) => {
										if (result) {
											window.location = "editarGeneros"
										}else{
											window.location = "editarGeneros"
										}
									}) 
								</script>';
								$inspector = false;			
					}
				
			}

			if (isset($inspector) && $inspector == true) {
				
				$nombre = $_POST['nombreCrear'];							
		        $icono = $_POST['gender'];
		       

		        
			         $origenCaratula = $_FILES['fondo']['tmp_name'];
			         $destinoCaratula = 'views/media/fondos/'.$_FILES['fondo']['name'];
			         move_uploaded_file($origenCaratula, $destinoCaratula);
			         $fondo = $_FILES['fondo']['name'];
		     	
		     

		     	$datosController = array("nombre"=>$nombre,
		         						"icono"=>$icono,
										"fondo"=>$fondo
										
									);
		        
					
				$resultado = gestorGenerosModel::CrearGeneroModel("generos", $datosController);
				if ($resultado == "ok") {
					echo'<script>
									swal({
								        title: "¡Listo!",
								        text: "¡El genero fue creado!",
								        icon: "success",
								    })
								    .then((result) => {
										if (result) {
											window.location = "editarGeneros"
										}else{
											window.location = "editarGeneros"
										}
									}) 
								</script>';	
				}
				else{
					echo'<script>
									swal({
								        title: "¡Error!",
								        text: "¡Fallas tecnicas!",
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

		public function generoEliminadoController($nombre)
		{
			$resultado = gestorGenerosModel::generoEliminadoModel("generos", $nombre);

			return $resultado;
		}

	}
	
 ?>
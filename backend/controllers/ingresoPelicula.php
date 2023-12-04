<?php

/**
 * 
 */
class ingresopeliculaController 
{
	
	function ingresoController()
	{	if ($_POST) {
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
									window.location = "agregarPelicula"
								}else{
									window.location = "agregarPelicula"
								}
							}) 
						</script>';			
								}}
		if (isset($_POST['nombrePelicula'])) {
			$codigo = $_POST['codigo'];
			$nombrePelicula = $_POST['nombrePelicula'];
			$generos = $_POST['generos'];
			$cantidad = $_POST['cantidad'];
			$discos = $_POST['discos'];
			$cinavia = $_POST['cinavia'];
			$lenguaje = $_POST['lenguaje'];
			$clasificacion = $_POST['clasificacion'];
			$tipo = $_POST['tipo'];
	        $fecha = $_POST['fecha'];

	        if ($_POST['cantidad'] == "") {
	        	$cantidad = "Ilimitada";
	        }
	        if ($_POST['discos'] == "") {
	        	$discos = "Sin disco";
	        }
	        if ($_POST['cinavia'] == "") {
	        	$cinavia = "No";
	        }
	        if ($_POST['clasificacion'] == "") {
	        	$clasificacion = "G";
	        }



	         $origenCaratula = $_FILES['caratula']['tmp_name'];
	         $destinoCaratula = 'views/media/caratulas/'.$_FILES['caratula']['name'];
	         move_uploaded_file($origenCaratula, $destinoCaratula);
	         $caratula = $_FILES['caratula']['name'];

	         if (file_exists('views/media/trailers/'.$_FILES['trailer']['name'])) {
	         	echo'<script>
							console.log("hola")
						</script>';
	         	$trailer = $_FILES['trailer']['name'];
	         }
	         else{
	         	echo'<script>
							console.log("Que ta pasando")
						</script>';
	         	$origenTraile = $_FILES['trailer']['tmp_name'];
		        $destinoTrailer = 'views/media/trailers/'.$_FILES['trailer']['name'];
		        move_uploaded_file($origenTraile, $destinoTrailer);
		        $trailer = $_FILES['trailer']['name'];
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
	         else{
	         	$pelicula = $_POST['peliculaNombre'];
	         	$peliculaSize = $_POST['peliculaPeso'];
	         }
	         $datosController = array("codigo"=>$codigo,
									"nombrePelicula"=>$nombrePelicula,
									"genero"=>$generos,
									"cantidad"=>$cantidad,
									"tipo"=> $tipo,
									"discos"=> $discos,
									"cinavia"=> $cinavia,
									"clasificacion"=> $clasificacion,
									"lenguaje"=> $lenguaje,
									"caratula"=> $caratula,
									"trailer"=> $trailer,
									"pelicula"=> $pelicula,
									"fecha"=> $fecha,
									"peso"=> $peliculaSize,
								);
	        $resultado = new IngresoPeliculaModel();
				
			$resultado = IngresoPeliculaModel::ingresoModel($datosController);
			if ($resultado == "ok") {

					echo'<script>
							swal({
						        title: "¡OK!",
						        text: "¡La pelicula ha sido ingresado correctamente!",
						        icon: "success",
						    })
						    .then((result) => {
								if (result) {
									window.location = "agregarPelicula"
								}else{
									window.location = "agregarPelicula"
								}
							}) 
						</script>';

			} elseif ($resultado == "error") {
				echo'<script>
							alert("ingresaste un codigo repetido");
						</script>';
			} else{
				echo'<script>
							alert("ingresaste un codigo repetido");
					 </script>';
			}
			
		}

	}

	public function gestorTiposController(){
		$resultado = IngresoPeliculaModel::gestorTiposModel("tipos");
		
		foreach ($resultado as $row => $item) {
			?>
				
				<option value="<?php echo $item['nombreTipo']?>"><?php echo $item['nombreTipo']?></option>
			<?php
		}
	}
	public function gestorGenerosController()
	{
		$resultado = IngresoPeliculaModel::gestorGenerosModel("generos");
		foreach ($resultado as $row => $item) {
			?>
				<option value="<?php echo $item['nombre']?>"><?php echo $item['nombre']?></option>
			<?php
		}

	}
}

?>
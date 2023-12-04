<?php
/**
 * 
 */
class Descargando 
{
	
	function descargandoController()
	{
		if (isset($_POST['peliDescarga'])) {
			$pelicula = $_POST['peliDescarga'];
			echo $pelicula;
			$abc = array("A","B","F","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
			$valid2 =false;
			foreach ($abc as $row => $item) {
				$valid =disk_free_space($item.":");
				if ($valid ==true ) {
					$usb = $item;
				 $valid2= true;
					break;
				}
			}

			// echo "Existe un usb con este nombre:". $usb;

			// $file = $usb.":/4c70.v10l3n514_-_www.locopelis.com_1.mkv";
			// if (is_file($file)) {
			// 	echo "existe y te la remamastes";
			// }

				// $valid =disk_free_space("A:");

			// if ($valid == true) {
			// 	echo "<br>";
			// 	echo "falso";
			// }0.000463802

			if ($valid2 == true) {
				$pasar = copy("E:/xampp/htdocs/Blasterimport-master/Blaster/backend/views/media/peliculas/".$pelicula, $usb.":/".$pelicula);

			if ($pasar == true) {
					echo'<script>
							swal({
						        title: "¡Listo!",
						        text: "¡Ya se transfirio su pelicula al PENDRIVE!",
						        icon: "success",
						        redureccion: setTimeout(function(){
						        	window.location = "home"
						        	},5000),
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
			else{
				echo'<script>
							swal({
						        title: "¡Lo sentimos!",
						        text: "¡Su PENDRIVE no tiene suficiente espacio!",
						        icon: "error",
						        redureccion: setTimeout(function(){
						        	window.location = "home"
						        	},5000),
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
		
	}

	
}

?>


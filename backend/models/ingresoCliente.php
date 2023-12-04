<?php

class ingresoClienteModel{


	public function ingresoClientesModel($datosModel){

		$consulta = new Consulta();
		$nombre = $datosModel["nombre"];
		$cedula = $datosModel["cedula"];
		$telefono = $datosModel["telefono"];
		$correo = $datosModel["correo"];
		$direccion = $datosModel["direccion"];
		$tabla = 'clientes';


		$sql="INSERT INTO $tabla ( nombre, cedula, telefono, correo, direccion) values ( '$nombre', '$cedula', '$telefono', '$correo', '$direccion')";
		$resultado = $consulta -> nuevo_registro($sql);
		$sql2 = "CREATE TABLE ".$cedula."Cliente ( codigo  int(50), nombrePelicula varchar(200), genero varchar(200), caratula varchar(250), pelicula varchar(250), peso varchar(250))";
		$resultado2 = $consulta -> nuevo_registro($sql2);
		
		return $resultado;
	}
	public function gestorClienteModel($cedula){

		$consulta = new Consulta();
		$sql="SELECT * FROM ".$cedula."cliente";
		$resultado = $consulta -> ver_registros($sql);
		return $resultado;
	}

	public function gestorClienteIngresosModel($codigo){
		
				$consulta = new Consulta();
				$sql="SELECT * FROM peliculas WHERE codigo ='$codigo'";
				$resultado = $consulta -> ver_registros($sql);
				return $resultado;	
			
		
	}
	public function gestorClientesListaModel(){

		$consulta = new Consulta();
		$sql="SELECT * FROM clientes";
		$resultado = $consulta -> ver_registros($sql);
		return $resultado;
	}

	public function gestorClienteIngresosModel2($datosModel , $cedula){
		$codigo=$datosModel['codigo'];
		$nombrePelicula=$datosModel['nombrePelicula'];
		$genero=$datosModel['genero'];
		$caratula=$datosModel['caratula'];
		$peso=$datosModel['peso'];
		$pelicula=$datosModel['pelicula'];
		$consulta = new Consulta();
		$sql = "INSERT INTO ".$cedula."cliente (codigo, nombrePelicula, genero, caratula, peso, pelicula) VALUES ('$codigo', '$nombrePelicula', '$genero', '$caratula', '$peso', '$pelicula')";
			$resultado = $consulta -> nuevo_registro($sql);
		return $resultado;
	}
	public function gestorClienteQuitarModel($codigo , $cedula){

		$consulta = new Consulta();
		$sql="DELETE FROM ".$cedula."cliente WHERE codigo ='$codigo'";
		$resultado = $consulta -> borrar_registro($sql);
		return $resultado;
	}
	public function gestorClienteEliminarModel($cedula){

		$consulta = new Consulta();
		$sql="DELETE FROM clientes WHERE cedula='$cedula'";
		$resultado = $consulta -> borrar_registro($sql);
		return $resultado;
	}
	public function gestorClienteEditarModel($cedula){

		$consulta = new Consulta();
		$sql="SELECT * FROM clientes WHERE cedula='$cedula'";
		$resultado = $consulta -> ver_registros($sql);
		return $resultado;
	}
	public function gestorClienteEditarEditadoModel($cedulaVieja,$cedulaNueva,$nombre,$telefono,$correo,$direccion){

		
		$inspector= false;
		if ($cedulaVieja != $cedulaNueva) {
			$conect=mysqli_connect("localhost","root","","blaster") or die("Error: ".mysqli_error());
				
				$valid = mysqli_query($conect,"SELECT cedula FROM clientes WHERE cedula='".$cedulaNueva."'");
					if ( mysqli_num_rows($valid)>0) {
								
								$resultado = false;
								$inspector = true;

					}
					if ($inspector==false) {
						$consulta2 = new Consulta();
			$sql2 = "ALTER TABLE ".$cedulaVieja."cliente RENAME ".$cedulaNueva."cliente";
			$resultado2 = $consulta2 -> nuevo_registro($sql2);
					}
			
		}
			
		if ($inspector==false) {
			$consulta = new Consulta();
		$sql= "UPDATE clientes SET nombre='$nombre', cedula='$cedulaNueva', telefono='$telefono', correo='$correo', direccion='$direccion' WHERE cedula='".$cedulaVieja."' ";
		$resultado = $consulta -> actualizar_registro($sql);
		
		}
		return $resultado;
	}

} 
?>
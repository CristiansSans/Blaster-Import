<?php 
	Class Conexion{
		protected $conexion;
		public function Conexion(){
			try {
				$this->conexion = new PDO("mysql:host=localhost; dbname=blaster", "root", "");
				$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->conexion->exec("set character set utf8");

				return $this->conexion;
			} catch (Exception $e) {
				die("Ha ocurrido un error al conectar con el servidor en la línea " . $e->getLine());
			}
		}
	}

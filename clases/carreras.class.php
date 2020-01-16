<?php 
	require("../config/conexion.php");

	class carreras{

		public $idCarrera;
		public $nombre;
		public $fechaCreacion;

		public function __construct($idCarrera, $nombre, $fechaCreacion){
			$this->idCarrera = $idCarrera;
			$this->nombre = $nombre;
			$this->fechaCreacion = $fechaCreacion;
		}

		public function ingresar_carrera(){
			$x = new conexion();
			$query = "INSERT INTO escuelaProfesional(idEscuelaProfesional, nombre, fechaCreacion)
						VALUES ('$this->idCarrera','$this->nombre','$this->fechaCreacion')";
			mysqli_query($x->conectar(), $query); 
		}
	}


 ?>
<?php 
	class conexion{

		public $host = "localhost";
		public $user = "root";
		public $password = "";
		public $dbname = "dbra";

		public function conectar(){
			if(!($link=new mysqli($this->host,$this->user,$this->password,$this->dbname)))
			{
				echo "Error de conexion";
				exit();
			}
			mysqli_set_charset($link,'utf8');
		return $link;
		}
	}
	//	$x = new conexion();
	//	$x->conectar();
 ?>
<?php 
	require('../config/conexion.php')

	class asignatura{

		public $idUnidadDidactica;
		public $nombre;
		public $creditos;
		public $horasTeoricas;
		public $horasPracticas;
		public $modulo;
		public $semestre;

		public function __construct($nom, $cr, $ht, $hp, $mod){
			$x = new conexion();
			$query = "SELECT MAX(idUnidadDidactica) FROM idUnidadDidactica";
			$this->idUnidadDidactica = mysqli_query($x->conectar(), $query) + 1;
			$this->nombre = $nom;
			$this->creditos=$cr;
			$this->horasTeoricas=$ht;
			$this->horasPracticas=$hp;
			$this->modulo=$mod;
			$this->semestre= NULL;
		}

		public function ins_asignatura(){
			$x = new conexion();
			$query = "INSERT INTO asignatura VALUES ('$this->idUnidadDidactica','$this->nombre','$this->creditos','$this->horasTeoricas','$this->horasPracticas','$this->modulo','$this->semestre')";
			mysqli_query($x->conectar(), $query);

		}

		public function eli_asignatura($val){
			$x = new conexion();
			$query = "DELETE * FROM asigantura WHERE idUnidadDidactica = '$val'";
			mysqli_query($x->conectar(), $query);
		}

		public function mod_asignatura(){
			
		}
	}
 ?>
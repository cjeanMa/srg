<?php 

	require("config/conexion.php");

	class usuario{
		public $dni;
		public $apellido_paterno;
		public $apellido_materno;
		public $nombres;
		public $email;
		public $telefono;
		public $usuario;
		public $contraseña;
		public $permiso;

		public function asignar($dni, $ap, $am, $nom, $email, $tel, $user, $pw, $pu){
			$this->dni = $dni;
			$this->apellido_paterno = $ap;
			$this->apellido_materno = $am;
			$this->nombres = $nom;
			$this->email = $email;
			$this->telefono = $tel;
			$this->usuario = $user;
			$this->contraseña = $pw;
			$this->permiso = $pu;
		}

		public function evaluar_usuario($dni){
			$x = new conexion();
			$query = "SELECT * FROM usuario WHERE idPersona = '$dni'";
			if(mysqli_query($x->conectar(), $query) == 'NULL' OR mysqli_query($x->conectar(), $query) == FALSE)
			{	return FALSE;	
			}
			else
				return TRUE;
			}

		public function ins_usuario(){
			$x = new conexion();
			$query1 = "INSERT INTO usuario (idPersona, usuario, contraseña, permiso)
				VALUES ('$this->dni', '$this->usuario', SHA1('$this->contraseña'), '$this->permiso')";
			mysqli_query($x->conectar(), $query1);
		}

		public function ins_persona(){
			$x = new conexion();
			$x->conectar();

			$query = "INSERT INTO persona (idPersona, apellidoPaterno, apellidoMaterno, nombres, email, numCelular)
			VALUES ('$this->dni', '$this->apellido_paterno', '$this->apellido_materno', '$this->nombres', '$this->email', '$this->telefono')";
			mysqli_query($x->conectar(), $query);
		}

		public function eliminar_usuario($codigo){
			$x = new conexion();
			$x->conectar();

			$query = ("DELETE * FROM usuario WHERE idusuario = '$codigo'");
			mysqli_query($x->conectar(), $query);
		}
}
?>

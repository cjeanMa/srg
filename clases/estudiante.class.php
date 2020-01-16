<?php 

	require("config/conexion.php");

	class estudiante{
		public $dni;
		public $id_estudiante;
		public $apellido_paterno;
		public $apellido_materno;
		public $nombres;
		public $fecha_nacimiento;
		public $sexo;
		public $direccion;
		public $email;
		public $telefono;
		public $fecha_ingreso;
		public $escuela_profesional;
		public $discapacidad;
		public $conadis;

		public function asignar($dni, $ap, $am, $nom, $fn, $sex, $dir, $email, $tel, $fi, $ep, $dis, $conadis){
			$this->dni = $dni;
			$this->apellido_paterno = $ap;
			$this->apellido_materno = $am;
			$this->nombres = $nom;
			$this->fecha_nacimiento = $fn;
			$this->sexo = $sex;
			$this->direccion = $dir;
			$this->email = $email;
			$this->telefono = $tel;
			$this->fecha_ingreso = $fi;
			$this->escuela_profesional = $ep;
			$this->id_estudiante = $dni;
			$this->discapacidad = $dis;
			$this->conadis = $conadis;
		}

		public function evaluar_persona($dni){
			$x = new conexion();
			$query = "SELECT * FROM persona WHERE idPersona = '$dni'";
			$cant = mysqli_num_rows(mysqli_query($x->conectar(), $query));
			if($cant >= 1)
			{	return 1;}
			else
				return 0;
		}

		public function evaluar_estudiante($dni){
			$x = new conexion();
			$query = "SELECT * FROM estudiante WHERE Persona_idPersona = '$dni'";
			$cant = mysqli_num_rows(mysqli_query($x->conectar(), $query));
			if($cant >= 1)
			{	return 1;}
			else
				return 0;
		}
		public function cantidad_estudiante($dni){
			$x = new conexion();
			$query = "SELECT * FROM estudiante WHERE Persona_idPersona = '$dni'";
			$cant = mysqli_num_rows(mysqli_query($x->conectar(), $query));
			if ($cant > 1) {
				return 1;}
			else
				return 0;
		}

		public function ins_estudiante(){
			$x = new conexion();

			$query1 = "INSERT INTO estudiante (Persona_idPersona, EscuelaProfesional_idEscuelaProfesional, fechaIngreso)
				VALUES ('$this->dni', '$this->escuela_profesional', '$this->fecha_ingreso')";
			mysqli_query($x->conectar(), $query1);
		}

		public function ins_persona(){
			$x = new conexion();

			$query = ("INSERT INTO persona (idPersona, apellidoPaterno, apellidoMaterno, nombres, fechaNacimiento, sexo, direccion, email, numCelular, discapacidad, conadis) 
			VALUES ('$this->dni', '$this->apellido_paterno', '$this->apellido_materno', '$this->nombres', '$this->fecha_nacimiento', '$this->sexo', '$this->direccion', '$this->email', '$this->telefono', '$this->discapacidad', '$this->conadis')");
			mysqli_query($x->conectar(), $query);
		}

		public function ing_ncarrera($p, $c, $dni){
			$x = new conexion();
			$query = "INSERT INTO estudiante (fechaIngreso, EscuelaProfesional_idEscuelaProfesional, persona_idpersona) values ('$p', '$c', '$dni')";
			mysqli_query($x->conectar(), $query);
		}

		public function eliminar_estudiante($codigo){
			$x = new conexion();

			$query = ("DELETE * FROM estudiante WHERE idEstudiante = '$codigo'");
			mysqli_query($x->conectar(), $query);
		}

		public function most_estudiante($dni){
			$x = new conexion();
			$query = "SELECT idPersona, apellidoPaterno, apellidoMaterno, nombres, b.nombre FROM 
			persona a
			INNER JOIN 
			(SELECT * FROM estudiante INNER JOIN 
				escuelaProfesional ON EscuelaProfesional_idEscuelaProfesional = idEscuelaProfesional
				WHERE persona_idpersona = $dni) b
			ON a.idPersona = b.persona_idPersona";

			$lista = mysqli_query($x->conectar(), $query);
			echo "<div class='container' style='background:#80CBC4; padding: 1px 1px 20px 1px; border-radius: 10px; -webkit-box-shadow: 1px 2px 120px 7px rgba(92,230,179,0.92);
-moz-box-shadow: 1px 2px 120px 7px rgba(30,67,232,0.92);
box-shadow: 1px 2px 120px 7px rgba(92,230,179,0.92);'>
				<table class='table table-hover'>
				<thead>
					<tr>
						<th>DNI</th>
						<th>APELLIDO PATERNO</th>
						<th>APELLIDO MATERNO</th>
						<th>NOMBRES</th>	
						<th>CARRERA PROFESIONAL</th>
						<th>ACCIONES</th>
					</tr>
				</thead>"	;
				echo "<tbody>";
			while ($col = mysqli_fetch_row($lista)){
			echo "<tr>
						<input id='tabla_dni' hidden disabled value='$col[0]'>
						<td>$col[0]</td>
						<td>$col[1]</td>
						<td>$col[2]</td>
						<td>$col[3]</td>
						<td>$col[4]</td>
						<td><button id='btn_matricular' class='btn btn-success' target='_blank'><span class='glyphicon glyphicon-check'></span>Matricular</button>
					</tr>";
			}	
		echo "</tbody>
				</table>
				</div>";
		}

		public function buscar_estudiante($codigo){
			$x=new conexion();
			$query="SELECT * FROM estudiante WHERE apellido_materno = '%codigo%' OR apellido_paterno = '%codigo%'";
			mysqli_query($x->conectar(), $query);
		}

		/*public function obt_estudiante($codigo){
			$x=new conexion();
			$x->conectar();
			$query = "SELECT * FROM persona WHERE idPersona = $codigo";
			$lista = mysql_query($query);
			$col = mysql_fetch_row($lista)
			return $col;
		}*/

		public function x($codigo){
			RETURN $codigo;
		}
	}
 ?>
<?php 
//	require('../config/conexion.php');

	class matricula{
		public $semestre;
		public $semestreAcademico;
		public $nota;
		public $notaLetra;
		public $observacion;
		public $ud;
		public $estudiante;

		public function semestre($s_aca, $est){
			$con = new conexion();
			$query_sem="SELECT count(u.semestre) s, s.nombre 
			FROM matricula m 
			INNER JOIN (SELECT semestre, idunidadDidactica FROM unidadDidactica) u
			ON m.unidadDidactica_idUnidadDidactica = u.idUnidadDidactica
			INNER JOIN (SELECT idsemestre, nombre FROM semestre) s
			ON u.semestre = s.idsemestre
			WHERE m.semestreAcademico = '$s_aca' AND m.Estudiante_idEStudiante='$est'
            GROUP BY u.semestre ORDER BY s DESC LIMIT 1";
            $val_sem = mysqli_query($con->conectar(),$query_sem);
            $list_sem = mysqli_fetch_row($val_sem);
            
            return $list_sem[1];
		}

		public function modulo($s_aca, $est){
			$con = new conexion();
			$query_mod="SELECT count(u.modulo_idmodulo) s, u.nombre FROM matricula m INNER JOIN 
			(SELECT u.idunidadDidactica, u.modulo_idmodulo, m.nombre 
				FROM unidadDidactica u INNER JOIN modulo m ON u.modulo_idmodulo=m.idmodulo) u
			ON m.unidadDidactica_idUnidadDidactica = u.idUnidadDidactica
			WHERE m.semestreAcademico = '$s_aca' AND m.Estudiante_idEStudiante='$est' AND u.modulo_idmodulo NOT IN (28,29,30,31)
            GROUP BY u.modulo_idmodulo ORDER BY s DESC LIMIT 1";
            $val_mod = mysqli_query($con->conectar(),$query_mod);
            $list_mod= mysqli_fetch_row($val_mod);
            return $semestre = $list_mod[1];
		}

		public function repitencia($ud, $est, $s_aca){
			$con = new conexion();
			$query_rep="SELECT unidadDidactica_idUnidadDidactica, Estudiante_idEstudiante, nota
						FROM matricula WHERE Estudiante_idEstudiante = '$est' AND semestreAcademico<>'$s_aca'";
		}

		public function verificar($ud, $est, $s_aca){
			$con = new conexion();
			$query_udidactica="SELECT idmatricula
			FROM matricula 
			WHERE Estudiante_idEstudiante='$est' AND semestreAcademico <= '$s_aca' 
			AND unidadDidactica_idUnidadDidactica = '$ud' AND estado = '1' AND estadomodular = '1'";
			$val_udidactica = mysqli_query($con->conectar(),$query_udidactica);
			$num = mysqli_num_rows($val_udidactica);
			if ($num <> 0) {
				return 0;//indica que si existe un dato
			}
			else{
				return 1;//indica que esta vacio
			}
		}

		public function verificar_ud($ud, $est, $s_aca){
			$con = new conexion();
			 $query_verificacion = "SELECT m.idmatricula, m.estado, m.unidaddidactica_idunidaddidactica 
            FROM matricula m
            WHERE estudiante_idestudiante = '$est' and semestreacademico < '$s_aca' and m.unidaddidactica_idunidaddidactica = '$ud'
            ORDER BY m.idmatricula DESC";
            $aux_verificacion = mysqli_query($con->conectar(), $query_verificacion);
            $lista_verificacion = mysqli_fetch_row($aux_verificacion);
            return $lista_verificacion[1];
		}

		public function u_didactica($ud, $est, $s_aca){
			$con = new conexion();
			$semestre=explode("-",$s_aca);
			$query_udidactica="SELECT idmatricula, semestreAcademico, unidadDidactica_idUnidadDidactica, Estudiante_idEstudiante
			FROM matricula WHERE Estudiante_idEstudiante='$est' AND semestreAcademico = '$s_aca'";
			$val_udidactica = mysqli_query($con->conectar(),$query_udidactica);
			while ($lista_udidactica=mysqli_fetch_row($val_udidactica)) {
				$sem = explode("-", $lista_udidactica[1]);
				if ($sem[0]<$semestre[0]) {
					# code...
				}
			}
		}

		// datos de estudiantes en base a periodo academico, idestudiante y escuela profesional
		public function datos_estudiante($p_aca, $id_est, $esc_pro){
			$con = new conexion();
			$query_datos = "SELECT e.idestudiante, concat(p.apellidoPaterno,' ', p.apellidoMaterno, ', ', p.nombres), ep.nombre, concat(sa.anio,'-',sa.periodo), s.nombre, p.idpersona
        FROM estudiante e INNER JOIN persona p ON e.persona_idpersona = p.idpersona
        INNER JOIN escuelaprofesional ep ON e.escuelaprofesional_idescuelaprofesional = ep.idescuelaprofesional
        INNER JOIN matricula m ON e.idestudiante = m.estudiante_idestudiante
        INNER JOIN semestreacademico sa ON m.semestreAcademico = sa.idsemestreacademico
        INNER JOIN unidaddidactica ud ON m.unidaddidactica_idunidaddidactica = ud.idUnidadDidactica
        INNER JOIN semestre s ON ud.semestre = s.idsemestre
        WHERE m.semestreacademico = '$p_aca' AND e.idestudiante = '$id_est' AND e.escuelaprofesional_idescuelaprofesional = '$esc_pro' LIMIT 0,1";
        $aux_datos = mysqli_query($con->conectar(), $query_datos);
        //$lista_datos = mysqli_fetch_row($aux_datos);
			
			//return $lista_datos;
			return mysqli_fetch_row($aux_datos);
		}

	}

 ?>


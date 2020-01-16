<?php
include('config/conexion.php');
require('clases/matricula.class.php');
require('pdf/CELLpdf.php');

$x=new conexion();
$mat  = new matricula();

$idest = $_GET['idestudiante'];
$semestre = $_GET['p_academico'];
//NOMBRE DEL SEMESTRE ACADEMICO
$query_sa = "SELECT concat(anio, '-' ,periodo) FROM semestreacademico WHERE idsemestreacademico = '$semestre'";
$aux_sa = mysqli_query($x->conectar(), $query_sa);
$lista_sa = mysqli_fetch_row($aux_sa);

//query para obtener unidades didacticas
$query="SELECT b.idMatricula, a.nombre, a.creditos, a.semestre, b.estado, b.observacion, b.unidaddidactica_idunidaddidactica
                FROM unidadDidactica a 
                INNER JOIN (SELECT  a.idMatricula, a.UnidadDidactica_idUnidadDidactica, a.semestreacademico, a.estado, a.observacion
                    FROM matricula a WHERE estudiante_idestudiante = '$idest' ) b
                ON a.idUnidadDidactica = b.UnidadDidactica_idUnidadDidactica
                WHERE b.semestreacademico = '$semestre' ORDER BY b.UnidadDidactica_idUnidadDidactica";
//query para obtener datos personales
$query_datos="SELECT concat(y.apellidoPaterno, ' ', y.apellidoMaterno,', ' , y.nombres), y.idpersona, y.sexo, DATE_FORMAT(y.fechaNacimiento,'%d-%m-%Y'), y.discapacidad, y.direccion, y.email, y.numCelular, concat(fi.anio,'-',fi.periodo), z.nombre  
				FROM estudiante x 
                INNER JOIN semestreacademico fi
                ON x.fechaingreso = fi.idsemestreacademico
                INNER JOIN persona y 
				ON x.persona_idpersona = y.idpersona 
				INNER JOIN escuelaProfesional z
				ON x.escuelaProfesional_idEscuelaProfesional = z.idEscuelaProfesional
				WHERE x.idestudiante = '$idest'";
		$aux_datos=mysqli_query($x->conectar(),$query_datos);
		$lista_datos=mysqli_fetch_row($aux_datos);

    //Para escribir las fechas en español
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    //uso de la clase matricula
    $matricula = new matricula();
// Creación del objeto de la clase heredada
$pdf = new CELLpdf(); 
$pdf->SetMargins(20, 10, 20);
$pdf->AddPage();
$pdf->cabecera();
	$pdf->SetFont('Arial','U',20);
	$pdf->Ln(10);
	$pdf->Cell(100, 6, "FICHA DE MATRICULA : ",0,0,'L');
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(70, 6, "PERIODO LECTIVO ".$lista_sa[0],1,0,'C');
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(170, 8, "CARRERA PROFESIONAL: ".$lista_datos[9],0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(170, 8, utf8_decode("PERIODO ACADÉMICO: ". $matricula->semestre($semestre, $idest)),0,0,'L'); //Determinar el semestre al que pasa dicho estudiante

	//notas
	$pdf->Ln(10);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(170, 6, "APELLIDOS Y NOMBRES : ",1,1,'C');
    $pdf->Cell(170, 6, utf8_decode($lista_datos[0]),1,1,'C');//nombres
    $pdf->Cell(50,6,"Codigo de Matricula:",1,0,'L');
    $pdf->Cell(45,6,$lista_datos[1],1,0,'C');//codigo de matricula
    $pdf->Cell(30,6,"Sexo:",1,0,'L');
    $pdf->Cell(45,6,$lista_datos[2],1,1,'C');//sexo
    $pdf->Cell(50,6,"Fecha de Nacimiento:",1,0,'L');
    $pdf->Cell(45,6,$lista_datos[3],1,0,'C');//fecha de nacimiento
    $pdf->Cell(30,6,"Edad:",1,0,'L');
        $fecha = time() - strtotime($lista_datos[3]);
        $edad = floor((($fecha / 3600) / 24) / 360);
    $pdf->Cell(45,6,$edad,1,1,'C');//edad
    $pdf->Cell(50,6,"Discapacidad(Si/No):",1,0,'L');
    $pdf->Cell(45,6,$lista_datos[4],1,0,'C');//Discapacidad
    $pdf->Cell(30,6,"CONADIS:",1,0,'L');
    $pdf->Cell(45,6,$lista_datos[4],1,1,'C');//CONADIS
    $pdf->Cell(50,6,"Direccion de Domicilio:",1,0,'L');
    $pdf->Cell(120,6,utf8_decode($lista_datos[5]),1,1,'C');//domicilio
    $pdf->Cell(50,6,"Correo Electronico:",1,0,'L');
    $pdf->Cell(120,6,$lista_datos[6],1,1,'C');//correo electronico
    $pdf->Cell(50,6,"Numero de Celular:",1,0,'L');
    $pdf->Cell(45,6,$lista_datos[7],1,0,'C');//Celular
    $pdf->Cell(30,6,"Fecha de Ingreso:",1,0,'L');
    $pdf->Cell(45,6,$lista_datos[8],1,1,'C');//Fecha de ingreso
    $pdf->Cell(30,6,utf8_decode("N° de recibo:"),1,0,'L');
    $pdf->Cell(20,6,"",1,0,'C');//N. Recibo
    $pdf->Cell(25,6,utf8_decode("MONTO S/."),1,0,'L');
    $pdf->Cell(20,6,"",1,0,'C');//Monto
    $pdf->Cell(30,6,"CONDICION:",1,0,'L');
    $pdf->Cell(45,6,"NORMAL",1,1,'C');//Condicion
    $pdf->Ln(5);
    $pdf->Cell(170,10,"MODULO FORMATIVO: " . $matricula->modulo($semestre, $idest),0,1,'L'); //para hallar el modulo formativo
    $pdf->Cell(170,10,"UNIDADES DIDACTICAS MATRICULADAS: ",0,0,'L');
    $pdf->Ln(10);
    //$pdf->Cell(10,6);
    $pdf->Cell(10,10,utf8_decode("N°"),1,0,'C');
    $pdf->Cell(100,10,"UNIDAD DIDACTICA",1,0,'C');
    $pdf->Cell(10,10,"CREDITOS",1,0,'C');
    $pdf->Cell(10,10,"NORMAL",1,0,'C');
    $pdf->Cell(10,10,"REPITENCIA",1,0,'C');
    $pdf->Cell(30,10,"OBSERVACIONES",1,0,'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',9);
        $aux = mysqli_query($x->conectar(), $query);
        $num = 1;
        while ($lista = mysqli_fetch_row($aux)){
            //para verificar si es repitencia
            $dato_ver = $mat->verificar_ud($lista[6], $idest, $semestre);
            /*$query_verificacion = "SELECT m.idmatricula, m.estado, m.unidaddidactica_idunidaddidactica 
            FROM matricula m
            WHERE estudiante_idestudiante = '$idest' and semestreacademico < '$semestre' and m.unidaddidactica_idunidaddidactica = '$lista[6]'
            ORDER BY m.idmatricula DESC";
            $aux_verificacion = mysqli_query($x->conectar(), $query_verificacion);
            $lista_verificacion = mysqli_fetch_row($aux_verificacion);*/
            //$pdf->Cell(10,5);
            $pdf->Cell(10,6,$num,1,0,'C');
            $pdf->Cell(100,6,utf8_decode($lista[1]),1,0,'L');
            $pdf->Cell(10,6,utf8_decode($lista[2]),1,0,'C');
            $pdf->SetFont('ZapfDingbats','', 10);//tipo de fuente, para usar simbolos
            if ($dato_ver=="2") {
                $pdf->Cell(10,6,"",1,0,'C');
                $pdf->Cell(10,6,3,1,0,'C');
            }
            else{
                $pdf->Cell(10,6,3,1,0,'C');
                $pdf->Cell(10,6,"",1,0,'C');
            }
            $pdf->SetFont('Arial','', 9);

            $pdf->Cell(30,6,utf8_decode($lista[5]),1,0,'L');
            $pdf->Ln(6);
            $num++;
        }
    $pdf->Ln(10);
    $pdf->Cell(170,6,"OBSERVACIONES: _______________________________________________________________________________",0,0,'L');
    $pdf->Ln(10);
    $pdf->Cell(100,6);
    $pdf->Cell(70,6,"Ilave, ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y'),0,0,'C');

    $pdf->SetXY(0,270);
    $pdf->Cell(20,6);
    $pdf->Cell(50,6,"Estudiante",'T',0,'C');
    $pdf->Cell(10,6);
    $pdf->Cell(50,6,"Tesorero",'T',0,'C');
    $pdf->Cell(10,6);
    $pdf->Cell(50,6,"Secretario Academico",'T',0,'C');
$pdf->Output();
?>
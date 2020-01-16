<?php
include('config/conexion.php');
require('pdf/CELLpdf.php');

$x=new conexion();
$y=new conexion();
$idestudiante = $_GET['idestudiante'];
$modulo = $_GET['modulo'];
//Para verificar si culmino dicho modulo
$cursos_llevados = 0;
$cursos_modulo = 0;
$query_verificar = "SELECT ud.idunidaddidactica 
                    FROM unidaddidactica ud 
                    LEFT JOIN matricula m 
                    ON ud.idunidaddidactica = m.unidaddidactica_idunidaddidactica
                    WHERE ud.modulo_idmodulo = '$modulo' AND m.estadomodular = '1' AND m.estado = '1' AND m.estudiante_idestudiante = '$idestudiante'";
$aux_verificar = mysqli_query($x->conectar(),$query_verificar);
$cursos_llevados = mysqli_num_rows($aux_verificar);
$query_cursos_modulo = "SELECT ud.idunidaddidactica FROM estudiante e 
                    LEFT JOIN escuelaprofesional ep ON e.escuelaprofesional_idescuelaprofesional = ep.idescuelaprofesional
                    LEFT JOIN modulo m ON m.escuelaprofesional_idescuelaprofesional = ep.idescuelaprofesional
                    LEFT JOIN unidaddidactica ud ON ud.modulo_idmodulo = m.idmodulo
                    WHERE e.idestudiante = '$idestudiante' AND m.idmodulo = '$modulo' ORDER BY ud.semestre ASC, ud.idunidaddidactica ASC";
$aux_cursos_modulo = mysqli_query($x->conectar(), $query_cursos_modulo);
$cursos_modulo = mysqli_num_rows($aux_cursos_modulo);

// Creación del objeto de la clase heredada

$pdf = new CELLpdf();
$pdf->AddPage();
//cabecera del pdf
    $pdf->cabecera();


    if ($cursos_llevados >= ($cursos_modulo/2)) {
            $query_datos="SELECT per.idpersona, concat(per.nombres,' ', per.apellidoPaterno,' ',per.apellidoMaterno), per.sexo, ep.nombre, mo.nombre FROM estudiante e INNER JOIN persona per ON e.persona_idpersona = per.idpersona INNER JOIN escuelaprofesional ep ON e.escuelaprofesional_idescuelaprofesional = ep.idescuelaprofesional INNER JOIN modulo mo ON ep.idescuelaprofesional = mo.escuelaprofesional_idescuelaprofesional WHERE e.idestudiante = '$idestudiante' AND mo.idmodulo = '$modulo'";
            $aux_datos = mysqli_query($x->conectar(), $query_datos);
            $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $nombres = "";
            $dni = "";
            $carrera = "";
            $g_estudiante = "";
            $genero = "";
            $modulo_nombre = "";
            while ($datos = mysqli_fetch_row($aux_datos)) {
                $dni = $datos[0];
                $nombres = $datos[1];
                $genero = ($datos[2]=='M'?'El Señor':'La Señorita');
                $g_estudiante = ($datos[2]=='M'?'alumno':'alumna');
                $carrera = $datos[3];
                $modulo_nombre = $datos[4];
            }

        // Título
            $pdf->SetFont('Arial','BU',16);
            $pdf->Cell(190, 20, "CONSTANCIA DE NOTAS" ,0,0,'C');
            $pdf->Ln(20);

            //Cuerpo
        $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(10,7);
            $pdf->MultiCell(170, 7, utf8_decode("EL QUE SUSCRIBE EL SECRETARIO ACADÉMICO DEL INSTITUTO DE EDUCACIÓN DE EDUCACIÓN SUPERIOR TECNOLÓGICO PÚBLICO ILAVE;"), 0, "J");
        $pdf->SetFont('Arial', 'U', 12);    
            $pdf->Cell(10,7);
            $pdf->Cell(170,7,"HACE CONSTAR:",0,1,"L");
        $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(10,7);
            $pdf->MultiCell(170,7, utf8_decode("Que, ".$genero." ".$nombres.", es ".$g_estudiante." de esta Institución Superior, registrado con N° de matricula ".$dni.", quien cursa sus Estudios Superiores en la carrera profesional de ".$carrera.", cuyas NOTAS del módulo ".$modulo_nombre." son las siguientes: "),0,"J");
         $pdf->SetFont('Arial', '', 9);
                    $pdf->Cell(10,5);
                    $pdf->Cell(100,5,"UNIDAD DIDACTICA", 1, 0, 'C');
                    $pdf->Cell(20,5,"SEMESTRE",1,0,'C');
                    $pdf->Cell(20,5,"NOTA",1,0,'C');
                    $pdf->Cell(30,5,"PERIODO",1,1,'C');

            //LLAMAMOS AL QUERY QUE HICIMOS CON LA VARIABLE AUX_CURSOS_MODULO
                while ($lista_cursos_modulo = mysqli_fetch_row($aux_cursos_modulo)) {
                //QUERY PARA ANALIZAR CADA UNO DE LOS CURSOS LLEVADOS POR EL ESTUDIANTE
                    $query_cursos = "SELECT ud.idunidaddidactica, ud.nombre, m.nota, s.romanos, concat(sa.anio,'-',sa.periodo)
                FROM unidaddidactica ud 
                LEFT JOIN matricula m
                ON ud.idunidaddidactica = m.unidaddidactica_idunidaddidactica
                LEFT JOIN semestre s 
                ON ud.semestre = s.idsemestre 
                LEFT JOIN semestreacademico sa
                ON m.semestreacademico = sa.idsemestreacademico
                WHERE m.estadomodular = '1'
                AND m.estado = '1' 
                AND m.estudiante_idestudiante = '$idestudiante' 
                AND m.unidaddidactica_idunidaddidactica = '$lista_cursos_modulo[0]'
                ORDER BY m.nota DESC LIMIT 0,1";
                    $aux_cursos = mysqli_query($y->conectar(), $query_cursos);
                    $verificar_ud_modulo = mysqli_num_rows($aux_cursos);
                    if ($verificar_ud_modulo != 0) {
                        while($datos_cursos = mysqli_fetch_row($aux_cursos)) {
                        $pdf->Cell(10,4);
                        $pdf->Cell(100,4,utf8_decode($datos_cursos[1]), 1, 0, 'L');
                        $pdf->Cell(20,4,$datos_cursos[3],1,0,'C');
                        $pdf->Cell(20,4,$datos_cursos[2],1,0,'C');
                        $pdf->Cell(30,4,$datos_cursos[4],1,1,'C');
                        }
                    }
                    else{
                        $query_cursos_jalado = "SELECT ud.idunidaddidactica, ud.nombre, m.nota, s.romanos, concat(sa.anio,'-',sa.periodo)
                        FROM unidaddidactica ud 
                        LEFT JOIN matricula m
                        ON ud.idunidaddidactica = m.unidaddidactica_idunidaddidactica
                        LEFT JOIN semestre s 
                        ON ud.semestre = s.idsemestre 
                        LEFT JOIN semestreacademico sa
                        ON m.semestreacademico = sa.idsemestreacademico
                        AND m.estudiante_idestudiante = '$idestudiante' 
                        AND m.unidaddidactica_idunidaddidactica = '$lista_cursos_modulo[0]'
                        ORDER BY sa.idsemestreacademico DESC LIMIT 0,1";
                        $aux_cursos_jalado = mysqli_query($y->conectar(), $query_cursos_jalado);
                        while($datos_cursos_jalado = mysqli_fetch_row($aux_cursos_jalado)) {
                        $pdf->Cell(10,4);
                        $pdf->Cell(100,4,utf8_decode($datos_cursos_jalado[1]), 1, 0, 'L');
                        $pdf->Cell(20,4,$datos_cursos_jalado[3],1,0,'C');
                        $pdf->Cell(20,4,$datos_cursos_jalado[2],1,0,'C');
                        $pdf->Cell(30,4,$datos_cursos_jalado[4],1,1,'C');
                        }
                    }
                
            }
            $pdf->SetFont('Arial', '', 12);
            $pdf->ln(10);
            $pdf->Cell(10,8);
            $pdf->MultiCell(170,8,"Se le expide la presente Constancia, a solicitud escrita del interesado para los fines que estime por conveniente.",0,'J');
            //para la fecha
            $pdf->Ln(15);
            $pdf->Cell(10,6);
            $pdf->Cell(170,6,"Ilave, ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y'),0,0,'R');
    }

else{
     $pdf->SetFont('Arial','BU',16);
            $pdf->Cell(190, 20, utf8_decode("EL ESTUDIANTE AUN NO APROBÓ EL MODULO") ,0,0,'C');
            $pdf->Ln(25);
}

$pdf->Output('I',"CONSTANCIA DE NOTAS.pdf");
?>
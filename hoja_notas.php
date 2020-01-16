<?php
include('config/conexion.php');
include('clases/matricula.class.php');
require('pdf/CELLpdf.php');

$matricula = new matricula();

$x=new conexion();

$p_academico = $_GET['p_academico'];
$esc_pro = $_GET['esc_pro'];
$semestre = $_GET['semestre'];
// Creación del objeto de la clase heredada
$pdf = new CELLpdf();
//$pdf->SetMargins(20, 10, 20);
//$pdf->AddPage();
$pdf->SetAutoPageBreak(true,0);   
//query para seleccionar a todos los alumnos de la carrera, semestre y p_acaedmico
$query_alumnos = "SELECT e.idestudiante, concat(p.apellidoPaterno, p.apellidoMaterno, p.nombres) nom
                FROM estudiante e 
                INNER JOIN 
                    (SELECT primero.estudiante_idEstudiante idest
                    FROM (SELECT m.idmatricula, m.estudiante_idEstudiante 
                    FROM matricula m INNER JOIN unidaddidactica ud ON m.unidaddidactica_idunidaddidactica = ud.idUnidadDidactica
                    WHERE m.semestreAcademico = '$p_academico' AND ud.semestre = '$semestre'
                    GROUP BY m.estudiante_idEstudiante) primero
                    INNER JOIN 
                    (SELECT e.idestudiante, e.escuelaprofesional_idescuelaprofesional, m.idmatricula
                    FROM estudiante e INNER JOIN matricula m ON e.idestudiante = m.estudiante_idEstudiante
                    WHERE m.semestreacademico = '$p_academico' AND e.escuelaprofesional_idescuelaprofesional = '$esc_pro'
                    GROUP BY e.idestudiante) segundo
                    ON primero.estudiante_idestudiante = segundo.idestudiante) est_mat
                ON e.idestudiante = est_mat.idest
                INNER JOIN persona p
                ON e.persona_idpersona = p.idpersona
                ORDER BY nom";
$aux_alumnos = mysqli_query($x->conectar(), $query_alumnos);
while ($lista_alumnos = mysqli_fetch_row($aux_alumnos)){
    //query para obtener datos personales de estudiantes
    $lista_datos = $matricula->datos_estudiante($p_academico, $lista_alumnos[0], $esc_pro);
    //query para determinar si es su semestre mas alto
    $query_semestre_mayor = "SELECT c.sem
    FROM (SELECT count(ud.semestre) conteo, ud.semestre sem
    FROM matricula m INNER JOIN unidaddidactica ud ON m.unidaddidactica_idunidaddidactica = ud.idUnidadDidactica
    WHERE m.estudiante_idestudiante = '$lista_alumnos[0]' AND m.semestreacademico = '$p_academico'
    GROUP BY ud.semestre) c
    WHERE c.conteo = (SELECT max(a.conteo) FROM (SELECT count(ud.semestre) conteo, ud.semestre sem
    FROM matricula m INNER JOIN unidaddidactica ud ON m.unidaddidactica_idunidaddidactica = ud.idUnidadDidactica
    WHERE m.estudiante_idestudiante = '$lista_alumnos[0]' AND m.semestreacademico = '$p_academico' 
    GROUP BY ud.semestre)a)";
    $aux_semestre_mayor = mysqli_query($x->conectar(), $query_semestre_mayor);
    $sem_mayor = mysqli_fetch_row($aux_semestre_mayor);
    if ($sem_mayor[0] == $semestre){
    $pdf->AddPage('L','A4',0);
    $pdf->cabecera_horizontal(10,10);
    $pdf->cabecera_horizontal(160,10);
    //marco redondeado de la tabla central
    $pdf->RoundedRect(10, 40, 125, 10, 2, '1234', '');
    $pdf->RoundedRect(160, 40, 125, 10, 2, '1234', '');
    $pdf->RoundedRect(10, 51, 125, 60, 2, '1234', '');
    $pdf->RoundedRect(160, 51, 125, 60, 2, '1234', '');
    $pdf->RoundedRect(10, 112, 125, 25, 2, '1234', '');
    $pdf->RoundedRect(160, 112, 125, 25, 2, '1234', '');
    $pdf->RoundedRect(10, 138, 125, 30, 2, '1234', '');
    $pdf->RoundedRect(160, 138, 125, 30, 2, '1234', '');
    $pdf->RoundedRect(10, 169, 125, 25, 2, '1234', '');
    $pdf->RoundedRect(160, 169, 125, 25, 2, '1234', '');
    //Lineas separadoras de firmas
    $pdf->Line(51,138,51,168);
    $pdf->Line(92,138,92,168);
    $pdf->Line(201,138,201,168);
    $pdf->Line(242,138,242,168);



    $pdf->SetXY(10,25);
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(125, 10, 'BOLETA DE NOTAS', 0,0,'C');
    $pdf->Cell(25,10,"",0,0);
    $pdf->Cell(125, 10, 'BOLETA DE NOTAS', 0,0,'C');
    $pdf->Ln(6);
    $pdf->Cell(125,10, utf8_decode($lista_datos[3]),0,0,'C');
    $pdf->Cell(25,10,"",0,0);
    $pdf->Cell(125,10, utf8_decode($lista_datos[3]),0,0,'C');
    $pdf->ln(9);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(25,5,'Nombres: ','B',0,'R');
    $pdf->Cell(60,5,utf8_decode($lista_datos[1]),'B',0,'C');
    $pdf->Cell(20,5,utf8_decode('Doc. Identidad: '),'B',0,'L');
    $pdf->Cell(20,5,utf8_decode($lista_datos[5]),'B',0,'C');
    $pdf->Cell(25,10,"",0,0);
    $pdf->Cell(25,5,'Nombres: ','B',0,'R');
    $pdf->Cell(60,5,utf8_decode($lista_datos[1]),'B',0,'C');
    $pdf->Cell(20,5,utf8_decode('Doc. Identidad: '),'B',0,'R');
    $pdf->Cell(20,5,utf8_decode($lista_datos[5]),'B',0,'C');
    $pdf->ln(5);
    $pdf->Cell(25,5,'Programa de Estudios:',0,0,'R');
    $pdf->Cell(60,5,utf8_decode($lista_datos[2]),0,0,'C');
    $pdf->Cell(20,5,'Semestre:',0,0,'R');
    $pdf->Cell(20,5,utf8_decode($lista_datos[4]),0,0,'C');
    $pdf->Cell(25,10,"",0,0);
    $pdf->Cell(25,5,'Programa de Estudios:',0,0,'R');
    $pdf->Cell(60,5,utf8_decode($lista_datos[2]),0,0,'C');
    $pdf->Cell(20,5,'Semestre:',0,0,'R');
    $pdf->Cell(20,5,utf8_decode($lista_datos[4]),0,0,'C');
    $pdf->ln(6);
        //query para imprimir cursos con sus respectivas notas
        $query_cursos = "SELECT m.idmatricula, ud.nombre, ud.creditos, s.romanos, m.nota, ud.semestre 
            FROM matricula m INNER JOIN unidaddidactica ud
            ON m.unidaddidactica_idunidaddidactica = ud.idunidaddidactica
            INNER JOIN semestre s ON ud.semestre = s.idsemestre
            WHERE m.estudiante_idestudiante = '$lista_alumnos[0]' AND m.semestreacademico = '$p_academico'
            ORDER BY s.romanos AND ud.idunidaddidactica";
            //encabezado de tabla
            $pdf->SetFont('Arial','B',7);
            $pdf->Cell(70,5,'UNIDAD DIDACTICA',"B",0,'C');
            $pdf->Cell(15,5,'CREDITOS',"B",0,'C');
            $pdf->Cell(25,5,'SEMESTRE',"B",0,'C');
            $pdf->Cell(15,5,'NOTA',"B",0,'C');
            $pdf->Cell(25,10,"",0,0);
            $pdf->Cell(70,5,'UNIDAD DIDACTICA',"B",0,'C');
            $pdf->Cell(15,5,'CREDITOS',"B",0,'C');
            $pdf->Cell(25,5,'SEMESTRE',"B",0,'C');
            $pdf->Cell(15,5,'NOTA',"B",0,'C');
            $pdf->Ln(5);
        $aux_cursos = mysqli_query($x->conectar(), $query_cursos);
        
        //variable para calcular el promedio de notas
            $sumatoria_notas = 0;
            $contador_unidades = 0;

        while ($lista_cursos = mysqli_fetch_row($aux_cursos)) {
            //Datos de la tabla
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(70,4,utf8_decode($lista_cursos[1]),'T B',0,'L');
            $pdf->Cell(15,4,utf8_decode($lista_cursos[2]),'T B',0,'C');
            $pdf->Cell(25,4,utf8_decode($lista_cursos[3]),'T B',0,'C');
            $pdf->Cell(15,4,utf8_decode($lista_cursos[4]),'T B',0,'C');
            $pdf->Cell(25,10,"",0,0);
            $pdf->Cell(70,4,utf8_decode($lista_cursos[1]),'T B',0,'L');
            $pdf->Cell(15,4,utf8_decode($lista_cursos[2]),'T B',0,'C');
            $pdf->Cell(25,4,utf8_decode($lista_cursos[3]),'T B',0,'C');
            $pdf->Cell(15,4,utf8_decode($lista_cursos[4]),'T B',0,'C');
            if ($lista_cursos[5]===$sem_mayor[0]) {
                $sumatoria_notas += $lista_cursos[4];
                $contador_unidades++;
            }
            
            $pdf->Ln(4);
        }
        //Para mostrar promedios
        $promedio_notas = $sumatoria_notas/$contador_unidades;
        $pdf->Cell(110,6,"PROMEDIO SEMESTRAL DE NOTAS: ",0,0,'R');
        $pdf->Cell(15,6,number_format($promedio_notas,3,".",""),"L B",0,'C');
        $pdf->Cell(25,10,"",0,0);
        $pdf->Cell(110,6,"PROMEDIO SEMESTRAL DE NOTAS: ",0,0,'R');
        $pdf->Cell(15,6,number_format($promedio_notas,3,".",""),"L B",0,'C');
        
        //Para poner el relleno de los recuadros adicionales
        $pdf->SetXY(15, 115);
        $pdf->Cell(115,6,"Observaciones: ", 0,0,'L');
        $pdf->Cell(35,6,"",0,0);
        $pdf->Cell(115,6,"Observaciones: ", 0, 0, 'L');

        $pdf->SetXY(15, 175);
        $pdf->MultiCell(115,4, utf8_decode("NOTA: Ingresa a la pagina web oficial del IESTP-ILAVE 'www.tecnoilave.edu.pe' para estar informado de los eventos, comunicados y otros. Tambien puede seguirnos en Facebook; buscanos como 'tecnoilave oficial' o ingresa directamente al link 'www.facebook.com/iestpilaveoficial'"),0,'J');
        $pdf->SetXY(165,175);
        $pdf->MultiCell(115,4, utf8_decode("NOTA: Ingresa a la pagina web oficial del IESTP-ILAVE 'www.tecnoilave.edu.pe' para estar informado de los eventos, comunicados y otros. Tambien puede seguirnos en Facebook; buscanos como 'tecnoilave oficial' o ingresa directamente al link 'www.facebook.com/iestpilaveoficial'"),0,'J');

        //para las firmas
        $posicion = 0;
        for ($i=0; $i < 2; $i++) { 
            $pdf->setXY($posicion,163);
            $pdf->Cell(15,5,"");
            $pdf->Cell(30,5,'Coordinador de Area','T',0,'C');
            $pdf->Cell(12,5,"");
            $pdf->Cell(30,5,'Estudiante','T',0,'C');
            $pdf->Cell(12,5,"");
            $pdf->Cell(30,5,'Secretario Academico','T',0,'C');
            $posicion += 150; 
        }
        
        
    }
}

$pdf->Output();
?>
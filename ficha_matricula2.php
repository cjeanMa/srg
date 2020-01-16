<?php
include('config/conexion.php');
require('pdf/CELLpdf.php');

$x=new conexion();

$idest = $_GET['idestudiante'];
$semestre = $_GET['s_academico'];

$query="SELECT b.idMatricula, a.nombre, a.creditos, a.semestre, b.observacion
                        FROM unidadDidactica a 
                        inner join (SELECT  a.idMatricula, a.UnidadDidactica_idUnidadDidactica, a.semestreacademico, a.observacion 
                            FROM matricula a WHERE estudiante_idestudiante = '$idest' ) b
                        ON a.idUnidadDidactica = b.UnidadDidactica_idUnidadDidactica
                        WHERE b.semestreacademico = '$semestre' ORDER BY b.UnidadDidactica_idUnidadDidactica";

// Creación del objeto de la clase heredada
$pdf = new CELLpdf();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true,10);
//imagen para la segunda ficha de matricula
$pdf->image('img/logo.png', 20, 155, 18, 18);
//linea divisora de fichas de matricula
$pdf->SetLineWidth(0.2);
$pdf->Line(0, 150, 210, 150);
$pdf->SetLineWidth(1);


// APELLIDOS Y NOMBRES
    $pdf->cabecera();
    $pdf->SetFont('Arial','U',14);
    $pdf->Cell(190, 6, "FICHA DE MATRICULA",0,0,'C');
    $pdf->Ln(6);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,5);
    $pdf->Cell(60, 5, "APELLIDOS Y NOMBRES : ",1,0,'L');
    $pdf->Cell(110, 5, "CASTILLO ALEJO, JEAN MARCO",1,0,'C');
    $pdf->Ln(5);
    $pdf->Cell(10,5);
    $pdf->Cell(60, 5, "CARRERA PROFESIONAL : ",1,0,'L');
    $pdf->Cell(110, 5, "ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TI",1,0,'C');
    $pdf->Ln(5);
    $pdf->Cell(10,5);
    $pdf->Cell(40, 5, "CODIGO ESTUDIANTE : ",1,0,'L');
    $pdf->Cell(20, 5, "72514057",1,0,'C');
    $pdf->Cell(40, 5, "SEMESTRE : ",1,0,'C');
    $pdf->Cell(15, 5, "I",1,0,'C'); 
    $pdf->Cell(40, 5, "PERIODO ACADEMICO : ",1,0,'C');
    $pdf->Cell(15, 5, "2018-I",1,0,'C'); 
    $pdf->Ln(6);
    //$pdf->Cell(10,6);
    $pdf->Cell(10,6,utf8_decode("N°"),1,0,'C');
    $pdf->Cell(100,6,"UNIDAD DIDACTICA",1,0,'C');
    $pdf->Cell(15,6,"CREDITOS",1,0,'C');
    $pdf->Cell(15,6,"SEMESTRE",1,0,'C');
    $pdf->Cell(50,6,"OBSERVACIONES",1,0,'C');
    $pdf->Ln(6);
    $pdf->SetFont('Arial','',9);
        $aux = mysqli_query($x->conectar(), $query);
        $num = 1;
        while ($lista = mysqli_fetch_row($aux)){
            //$pdf->Cell(10,5);
            $pdf->Cell(10,4,$num,1,0,'C');
            $pdf->Cell(100,4,utf8_decode($lista[1]),1,0,'L');
            $pdf->Cell(15,4,utf8_decode($lista[2]),1,0,'C');
            $pdf->Cell(15,4,utf8_decode($lista[3]),1,0,'C');
            $pdf->Cell(50,4,utf8_decode($lista[4]),1,0,'L');
            $pdf->Ln(4);
            $num++;
        }
    $pdf->SetXY(0,125);
    $pdf->Cell(20,6);
    $pdf->Cell(50,6,"Estudiante",'T',0,'C');
    $pdf->Cell(10,6);
    $pdf->Cell(50,6,"Tesorero",'T',0,'C');
    $pdf->Cell(10,6);
    $pdf->Cell(50,6,"Secretario Academico",'T',0,'C');
    //SEGUNDA COPIA DE LA FICHA DE MATRICULA
    
    $pdf->SetXY(0,155);
    $pdf->Ln(5);
    $pdf->cabecera();
    $pdf->SetFont('Arial','U',14);
    $pdf->Cell(190, 6, "FICHA DE MATRICULA",0,0,'C');
    $pdf->Ln(6);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,5);
    $pdf->Cell(60, 5, "APELLIDOS Y NOMBRES : ",1,0,'L');
    $pdf->Cell(110, 5, "CASTILLO ALEJO, JEAN MARCO",1,0,'C');
    $pdf->Ln(5);
    $pdf->Cell(10,5);
    $pdf->Cell(60, 5, "CARRERA PROFESIONAL : ",1,0,'L');
    $pdf->Cell(110, 5, "ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TI",1,0,'C');
    $pdf->Ln(5);
    $pdf->Cell(10,5);
    $pdf->Cell(40, 5, "CODIGO ESTUDIANTE : ",1,0,'L');
    $pdf->Cell(20, 5, "72514057",1,0,'C');
    $pdf->Cell(40, 5, "SEMESTRE : ",1,0,'C');
    $pdf->Cell(15, 5, "I",1,0,'C'); 
    $pdf->Cell(40, 5, "PERIODO ACADEMICO : ",1,0,'C');
    $pdf->Cell(15, 5, "2018-I",1,0,'C'); 
    $pdf->Ln(6);
    //$pdf->Cell(10,6);
    $pdf->Cell(10,6,utf8_decode("N°"),1,0,'C');
    $pdf->Cell(100,6,"UNIDAD DIDACTICA",1,0,'C');
    $pdf->Cell(15,6,"CREDITOS",1,0,'C');
    $pdf->Cell(15,6,"SEMESTRE",1,0,'C');
    $pdf->Cell(50,6,"OBSERVACIONES",1,0,'C');
    $pdf->Ln(6);
    $pdf->SetFont('Arial','',9);
        $aux = mysqli_query($x->conectar(), $query);
        $num = 1;
        while ($lista = mysqli_fetch_row($aux)){
            //$pdf->Cell(10,5);
            $pdf->Cell(10,4,$num,1,0,'C');
            $pdf->Cell(100,4,utf8_decode($lista[1]),1,0,'L');
            $pdf->Cell(15,4,utf8_decode($lista[2]),1,0,'C');
            $pdf->Cell(15,4,utf8_decode($lista[3]),1,0,'C');
            $pdf->Cell(50,4,utf8_decode($lista[4]),1,0,'L');
            $pdf->Ln(4);
            $num++;
        }
    $pdf->SetXY(0,280);
    $pdf->Cell(20,6);
    $pdf->Cell(50,6,"Estudiante",'T',0,'C');
    $pdf->Cell(10,6);
    $pdf->Cell(50,6,"Tesorero",'T',0,'C');
    $pdf->Cell(10,6);
    $pdf->Cell(50,6,"Secretario Academico",'T',0,'C');
$pdf->Output();
?>
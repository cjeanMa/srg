<?php
include('config/conexion.php');
require('pdf/CELLpdf.php');

$x=new conexion();


$dni = $_POST['dni'];
$query = "SELECT nombres, apellidoPaterno, apellidoMaterno FROM persona WHERE IdPersona = '$dni'";
$aux = mysqli_query($x->conectar(), $query);
$query1 = "SELECT a.nombre FROM escuelaProfesional a
        INNER JOIN (SELECT idestudiante, escuelaProfesional_idescuelaprofesional FROM estudiante WHERE persona_idpersona = '$dni') b
        ON a.idescuelaprofesional = b.escuelaProfesional_idescuelaprofesional";
$aux1 = mysqli_query($x->conectar(), $query1);


// Creación del objeto de la clase heredada
$pdf = new CELLpdf();
$pdf->AddPage();
//cabecera del pdf
    $pdf->Image('img/logo.png',15,10,27,30);
    $pdf->Image('img/header.png',50,12,110,12);
    $pdf->Image('img/foto.png',170,12,25,30);
$pdf->Ln(20);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(65);
    // Título
    $pdf->Cell(60,10,utf8_decode('CERTIFICADO DE ESTUDIOS'));
    $pdf->Ln(5);
    $pdf->Cell(190,10,utf8_decode('DE EDUCACIÓN SUPERIOR TECNOLÓGICA'),0,0,'C');
    $pdf->Ln(15);

//Diseño Cuerpo
$pdf->SetFont('Arial','',11);
    $pdf->Cell(6);
    $pdf->Cell(120,10,utf8_decode('EL INSTITUTO DE EDUCACIÓN SUPERIOR TTECNOLÓGICO PÚBLICO ILAVE'));
    $pdf->Ln(8);
    $pdf->Cell(6);
    $pdf->Cell(38,10,'El que suscribe');
    $pdf->Ln(12);

$pdf->SetFont('Arial','B',18);
    $pdf->Cell(184,5,'CERTIFICA',0,0,'C');
    $pdf->Ln(12);

$pdf->SetFont('Arial','',10);
// APELLIDOS Y NOMBRES
    $dato_nom = mysql_fetch_array($aux);
    $pdf->Cell(184,5,$dato_nom[0]." ".$dato_nom[1]." ".$dato_nom[2],0,0,'C');
    $pdf->Ln(-1);
    $pdf->Cell(6);
    $pdf->Cell(188,10,'Que:_____________________________________________________________________________________',0);
    $pdf->Ln(8);
    $pdf->Cell(6);
    $pdf->Cell(150,10,utf8_decode('ha cursado las Unidades Didácticas / asignaturas o cursos que se indican en la Carrera:'),0);
    $pdf->Ln(8);
    $dato_esc = mysql_fetch_array($aux1);
    $pdf->Cell(184,5,$dato_esc[0],0,0,'C');
    $pdf->Ln(-1);
    $pdf->Cell(6);
    $pdf->Cell(188,10,'_________________________________________________________________________________________',0);
    $pdf->Ln(8);
    $pdf->Cell(6);
    $pdf->Cell(102,10,'Siendo el resultado final de las evaluaciones lo siguiente:',0);
    
    $pdf->Ln(10);
    
//Diseño del header de la Tabla
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(6);
    $pdf->Cell(72, 14, utf8_decode('Unidades Didácticas/ cursos o asignaturas'), 1,0,'C');
    $pdf->Cell(20,14,utf8_decode("Número\nde Créditos"),1,0,'C');
    $pdf->Cell(42, 5, 'Nota', 1,0,'C');
    $pdf->Ln(5);
    $pdf->Cell(98);
    $pdf->Cell(21, 9, utf8_decode("En \nnúmeros"), 1,0,'C');
    $pdf->Cell(21, 9, "En \nLetras", 1,0,'C');
    $pdf->Ln(-5);
    $pdf->Cell(140);
    $pdf->Cell(42, 5, 'Periodo', 1,0,'C');
    $pdf->Ln(5);
    $pdf->Cell(140);
    $pdf->Cell(21, 9, 'Lectivo', 1,0,'C');
    $pdf->Cell(21, 9, utf8_decode('Académico'), 1,1,'C');

//Diseño del cuerpo de la tabla
    

    $pdf->Cell(6);
    $pdf->Cell(72,145,'',1);
    $pdf->Cell(20,145,'',1);
    $pdf->Cell(21,145,'',1);
    $pdf->Cell(21,145,'',1);
    $pdf->Cell(21,145,'',1);
    $pdf->Cell(21,145,'',1);

$pdf->Output();
?>
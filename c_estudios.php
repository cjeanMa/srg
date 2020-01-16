<?php
include('config/conexion.php');
require('pdf/CELLpdf.php');

$x=new conexion();

$dni = $_GET['dni'];
$idestudiante = $_GET['carrera'];
$observaciones[]=array();
$cantidad = 1;
$asteriscos = "";

$query = "SELECT nombres, apellidoPaterno, apellidoMaterno FROM persona WHERE IdPersona = '$dni'";
$aux = mysqli_query($x->conectar(), $query);
$query1 = "SELECT a.nombre FROM escuelaProfesional a
        INNER JOIN (SELECT idestudiante, escuelaProfesional_idescuelaprofesional FROM estudiante WHERE idEstudiante = '$idestudiante') b
        ON a.idescuelaprofesional = b.escuelaProfesional_idescuelaprofesional";
$aux1 = mysqli_query($x->conectar(), $query1);


// Creación del objeto de la clase heredada
$pdf = new CELLpdf();
$pdf->SetMargins(10, 40 , 10);
$pdf->AddPage();
$pdf->SetAutoPageBreak(true,0);
//Para ingresar fechas
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
//Para semestres
    //$semestre = array("I"=>"PRIMER","II"=>"SEGUNDO","III"=>"TERCER","IV"=>"CUARTO","V"=>"QUINTO","VI"=>"SEXTO");
    $semestre = "";
// APELLIDOS Y NOMBRES

    $pdf->SetFont('Arial','B',13);
    $pdf->Ln(52);
    $dato_nom = mysqli_fetch_array($aux);
    $pdf->Cell(190,5,$dato_nom[0]." ".$dato_nom[1]." ".$dato_nom[2],0,0,'C');
    $pdf->Ln(18);
    $dato_esc = mysqli_fetch_array($aux1);
    $pdf->Cell(190,5,$dato_esc[0],0,0,'C');
    $pdf->Ln(40);

    $pdf->SetFont('Arial','',7);
    $semestre = "SELECT a.semestre 
    FROM unidaddidactica a
    INNER JOIN 
    (SELECT a.UnidadDidactica_idUnidadDidactica uni
    FROM matricula a 
    INNER JOIN
    (SELECT idEstudiante FROM estudiante WHERE idEstudiante = '$idestudiante') b 
    ON a.estudiante_idEstudiante = b.idEstudiante) b
    ON a.idunidaddidactica = b.uni
    GROUP BY a.semestre";

        $var_semestre = mysqli_query($x->conectar(), $semestre);
        //BUSQUEDA DE UNIDADES DIDACTICAS POR SEMESTRE
        while ($lista_s = mysqli_fetch_row($var_semestre)) {
     $pdf->SetFont('Arial','U',7);
     //SUBTITULOS DECADA SEMESTRE
     switch ($lista_s[0]) {
         case 'I':
             $semestre = "PRIMER";
             break;
        case 'II':
             $semestre = "SEGUNDO";
             break;
        case 'III':
             $semestre = "TERCER";
             break;
        case 'IV':
             $semestre = "CUARTO";
             break;
        case 'V':
             $semestre = "QUINTO";
             break;
        case 'VI':
             $semestre = "SEXTO";
             break;
     }
     $pdf->Ln(2);
     if ($cantidad == 38) {$pdf->AddPage();}
     $pdf->Cell(80, 6, $semestre . " SEMESTRE ",0,0,"");
     $cantidad++;
     $pdf->Ln(3);       
     $pdf->SetFont('Arial','',6);
             //LISTADO DE LAS UNIDADES DIDACTICAS
                $query_ud="SELECT a.idMatricula, c.nombre, a.semestreacademico, c.idunidaddidactica 
                    FROM matricula a INNER JOIN unidaddidactica c ON a.unidaddidactica_idunidaddidactica = c.idUnidadDidactica
                    WHERE estudiante_idEstudiante = '$idestudiante' AND c.semestre = '$lista_s[0]' ORDER BY c.nombre";
                $var_ud = mysqli_query($x->conectar(), $query_ud);
                while ($lista_ud = mysqli_fetch_row($var_ud)) {
        
        //PARA VERIFICAR SI ES QUE LLEVO DOS O MAS VECES EL CURSO
                $query_idud = "SELECT  a.idMatricula, c.nombre, c.creditos, a.nota, a.notaletra, c.semestre, 
                a.semestreacademico, c.idunidaddidactica, a.observacion
                    FROM matricula a INNER JOIN unidaddidactica c ON a.unidaddidactica_idunidaddidactica = c.idUnidadDidactica
                    WHERE estudiante_idEstudiante = '$idestudiante' AND c.semestre = '$lista_s[0]' 
                    AND a.UnidadDidactica_idUnidadDidactica = '$lista_ud[3]' AND a.idmatricula = '$lista_ud[0]'
                    AND a.nota = (SELECT max(a.nota) FROM matricula a INNER JOIN unidaddidactica c 
                        ON a.unidaddidactica_idunidaddidactica = c.idUnidadDidactica 
                        WHERE a.estudiante_idEstudiante = '$idestudiante' 
                        AND c.semestre = '$lista_s[0]'
                        AND a.UnidadDidactica_idUnidadDidactica = '$lista_ud[3]')";

                    $var_idud = mysqli_query($x->conectar(), $query_idud);
  
                    while ($lista_idud = mysqli_fetch_row($var_idud)) {
                        if ($cantidad == 39) {$pdf->AddPage();} // Para agregar una hoja en cierta cantidad de lineas
                            //$pdf->Cell(10, 7, $cantidad, 0, 0, '');
                            $anio = substr($lista_idud[6],0, 4);
                            $pdf->Cell(80, 7, utf8_decode($lista_idud[1]), 0, 0, '');
                            $pdf->SetFont('Arial','',7);
                            $pdf->Cell(15, 7, utf8_decode($lista_idud[2]), 0, 0, 'C');
                            $pdf->Cell(15, 7, utf8_decode($lista_idud[3]), 0, 0, 'C');
                            $pdf->Cell(40, 7, utf8_decode($lista_idud[4]), 0, 0, 'C');
                            $pdf->Cell(20, 7, $anio, 0, 0, 'C');
                                if ($lista_idud[8]!='') {//por si tuviera observaciones
                                    $n = sizeof($observaciones);
                                    for ($i=0; $i < $n ; $i++) {//ingresar cantidad de asteriscos 
                                        $asteriscos = "*".$asteriscos;
                                    }
                                    $pdf->Cell(20, 7, $lista_idud[6].$asteriscos, 0, 0, 'C');
                                    $observaciones[$n-1] = $lista_idud[8];
                                }
                                else{
                                    $pdf->Cell(20, 7, $lista_idud[6], 0, 0, 'C');
                                }
                            $cantidad++;
                            $pdf->Ln(3.5);
                            $pdf->SetFont('Arial','',6);
                }
            } 
        }
        if ($cantidad<38) { //Para aumentar una pagina si no llevo todos los semestres
            $pdf->AddPage();
        }
        //Para mostrar las observaciones
        $pdf->SetXY(10,110);
        $ind = 0;
        $asteriscos = "";
        if (sizeof($observaciones!=0)) {
           foreach($observaciones as $observacion){
            for ($i=0; $i <= $ind ; $i++) { 
                $asteriscos = "*".$asteriscos;
            }
            $pdf->Cell(30, 6,$asteriscos." ".json_encode($observacion),0,1,"L"); 
            $ind++;  
            } 
        }
        
        //Para mostrar la fecha
        $pdf->SetFont('Arial','',10);
        $pdf->SetXY(140,220);
        $pdf->Cell(80,6,"Ilave, ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y'),0,0,'L');

    
$pdf->Output();
?>
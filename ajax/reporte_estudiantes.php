<?php 

if (PHP_SAPI == 'cli')
    die('Este archivo solo se puede ver desde un navegador web');

/** Incluye PHPExcel */
require_once '../excelphp/Classes/PHPExcel.php';
require('../config/conexion.php');
// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("JmCastle")
							 ->setLastModifiedBy("JmCastle")
							 ->setTitle("Lista Estudiantes")
							 ->setSubject("Lista Estudiantes")
							 ->setDescription("Generado de la lista de Estudiantes")
							 ->setKeywords("estudiantes")
							 ->setCategory("Modulo Estudiantes");

//captamos los datos POST enviados desde lista_estudiantes
	$x = new conexion();
	$f_ing = $_POST['fecha_ingreso'];
	$escuela = $_POST['escuela_profesional'];

  $query_esc = "SELECT nombre FROM escuelaprofesional WHERE idescuelaprofesional = '$escuela'";
  $aux = mysqli_query($x->conectar(), $query_esc);

	$query="SELECT x.idPersona, concat(x.apellidoPaterno,' ',x.apellidoMaterno,', ', x.nombres), y.nombre
						FROM (SELECT idPersona, nombres, apellidoPaterno, apellidoMaterno, EscuelaProfesional_idEscuelaProfesional, fechaingreso 
						FROM Persona inner join Estudiante on idPersona = Persona_idPersona WHERE fechaIngreso = '$f_ing' AND escuelaProfesional_idEscuelaProfesional = '$escuela') x 
						inner join escuelaprofesional y on x.EscuelaProfesional_idEscuelaProfesional = y.idEscuelaProfesional";
				$aux = mysqli_query($x->conectar(), $query);
				
// Combino las celdas desde A1 hasta E1
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:E1');
 
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'INGRESANTES DEL PERIODO '. $f_ing)
            ->setCellValue('A2', 'Num')
            ->setCellValue('B2', 'DNI')
            ->setCellValue('C2', 'APELLIDOS Y NOMBRES')
            ->setCellValue('D2', 'CARRERA PROFESIONAL');
$num = 3;
$numeracion = 1;
while ($lista=mysqli_fetch_row($aux)) {	
			
			$objPHPExcel->setActiveSheetIndex(0)
            
            ->setCellValue('A'.$num, $numeracion)
            ->setCellValue('B'.$num, $lista[0])
            ->setCellValue('C'.$num, $lista[1])
            ->setCellValue('D'.$num, $lista[2]);
            $num++;
            $numeracion++;
}
			
//Formato de celdas
$subtitle = array(
  'font' => array(
    'bold' => true, 
    'size' => 8, 
    'name' => 'Tahoma'
  ), 
  'borders' => array(
    'allborders' => array(
      'style' => 'thin'
    )
  ), 
  'alignment' => array(
    'vertical' => 'center', 
    'horizontal' => 'center'
  ),
  'fill' =>array(
    'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'color' =>array('rgb' => 'aaaaFF')
    )
); 
$boldArray = array(
  'font' => array(
      'bold' => true,),
  'alignment' => array(
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
$h1 = array(
  'font' => array(
      'bold' => true,),
  'borders' => array(
    'allborders' => array(
      'style' => 'thin'
    )
  ),
  'alignment' => array(
      'vertical' => 'center',
      'horizontal' => 'left'));
 
$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($boldArray);
$objPHPExcel->getActiveSheet()->getStyle('A2:D2')->applyFromArray($subtitle);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
$objPHPExcel->getActiveSheet()->getStyle('A3:D'.$num)->applyFromArray($h1);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte_ingresantes.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

 ?>
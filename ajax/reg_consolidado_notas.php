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
//iamgenes de cabecera
$objDrawing = new PHPExcel_Worksheet_Drawing();
                    $objDrawing->setName('logo');
                    $objDrawing->setDescription('logo');
                    $img = '../img/LOGO1.png'; // Provide path to your logo file
                    $objDrawing->setPath($img);
                    $objDrawing->setOffsetX(30);    // setOffsetX works properly
                    $objDrawing->setOffsetY(1);  //setOffsetY has no effect
                    $objDrawing->setCoordinates('C1');
                    $objDrawing->setHeight(90); // logo height
                    $objDrawing->setWorksheet($objPHPExcel->setActiveSheetIndex(0));
$objDrawing = new PHPExcel_Worksheet_Drawing();
                    $objDrawing->setName('logo');
                    $objDrawing->setDescription('logo');
                    $img1 = '../img/minedu.jpg'; // Provide path to your logo file
                    $objDrawing->setPath($img1);
                    $objDrawing->setOffsetX(1);    // setOffsetX works properly
                    $objDrawing->setOffsetY(1);  //setOffsetY has no effect
                    $objDrawing->setCoordinates('Q2');
                    $objDrawing->setHeight(70); // logo height
                    $objDrawing->setWorksheet($objPHPExcel->setActiveSheetIndex(0));
//captamos los datos POST enviados desde lista_estudiantes
	$x = new conexion();
	$p_aca = $_POST['p_academico'];
	$carrera = $_POST['esc_pro'];
    $semestre = $_POST['semestre'];

  $query_semestre = "SELECT nombre FROM semestre WHERE idsemestre ='$semestre'";
  $query_carrera = "SELECT nombre FROM escuelaprofesional WHERE idEscuelaProfesional = '$carrera'";
  $query_p_academico = "SELECT concat(anio,'-',periodo) FROM semestreAcademico WHERE idsemestreacademico ='$p_aca'";
  $var_semestre = mysqli_query($x->conectar(),$query_semestre);
  $var_carrera = mysqli_query($x->conectar(),$query_carrera);
  $var_p_academico = mysqli_query($x->conectar(),$query_p_academico);
  $valor_semestre = mysqli_fetch_row($var_semestre);
  $valor_carrera = mysqli_fetch_row($var_carrera);
  $valor_p_academico = mysqli_fetch_row($var_p_academico);

/*
  $query_esc = "SELECT nombre FROM escuelaprofesional WHERE idescuelaprofesional = '$escuela'";
  $aux = mysqli_query($x->conectar(), $query_esc);

	$query="SELECT x.idPersona, concat(x.apellidoPaterno,' ',x.apellidoMaterno,', ', x.nombres), y.nombre
						FROM (SELECT idPersona, nombres, apellidoPaterno, apellidoMaterno, EscuelaProfesional_idEscuelaProfesional, fechaingreso 
						FROM Persona inner join Estudiante on idPersona = Persona_idPersona WHERE fechaIngreso = '$f_ing' AND escuelaProfesional_idEscuelaProfesional = '$escuela') x 
						inner join escuelaprofesional y on x.EscuelaProfesional_idEscuelaProfesional = y.idEscuelaProfesional";
				$aux = mysqli_query($x->conectar(), $query);
		*/		
//Query para la lista de estudiantes que estan presentes en un semestre        
$query_lista = "SELECT e.idestudiante, p.idpersona, concat(p.apellidopaterno, ' ', p.apellidomaterno, ', ', p.nombres) nom, p.sexo, p.fechanacimiento, p.discapacidad
FROM estudiante e
INNER JOIN persona p
ON e.persona_idpersona = p.idPersona
INNER JOIN matricula m
ON e.idestudiante = m.Estudiante_idEstudiante
INNER JOIN unidaddidactica ud
ON m.UnidadDidactica_idUnidadDidactica = ud.idUnidadDidactica
WHERE m.semestreAcademico = '$p_aca' AND e.EscuelaProfesional_idEscuelaProfesional = '$carrera' AND ud.semestre = '$semestre'
GROUP BY p.idpersona ORDER BY nom";
$val_lista = mysqli_query($x->conectar(),$query_lista);

//Query para conseguir las unidades didacticas del semestre
  $query_ud = "SELECT ud.idunidaddidactica, ud.nombre , ud.semestre
  FROM unidaddidactica ud
  INNER JOIN semestre s
  ON ud.semestre = s.idsemestre
  INNER JOIN modulo m 
  ON ud.modulo_idmodulo = m.idModulo
  INNER JOIN escuelaprofesional ep
  ON m.EscuelaProfesional_idEscuelaProfesional = ep.idEscuelaProfesional
  WHERE ep.idEscuelaProfesional = '$carrera' and ud.semestre = '$semestre'
  ORDER BY ud.idUnidadDidactica";
$var_ud = mysqli_query($x->conectar(), $query_ud);
// CABECERA

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B2:V2');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B3:V3');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B4:V4');
//CUERPO
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B7:V7')
                                    ->mergeCells('B8:C9')
                                    ->mergeCells('D8:D9')
                                    ->mergeCells('F8:V8')
                                    ->mergeCells('B10:C10')
                                    ->mergeCells('E9:E10')
                                    ->mergeCells('F9:L10')
                                    ->mergeCells('M9:P11')
                                    ->mergeCells('Q9:R9')
                                    ->mergeCells('S9:V9')
                                    ->mergeCells('Q10:R10')
                                    ->mergeCells('S10:V10')
                                    ->mergeCells('B11:C11')
                                    ->mergeCells('F11:L11')
                                    ->mergeCells('Q11:R11')
                                    ->mergeCells('S11:V11')
                                    ->mergeCells('B12:C12')
                                    ->mergeCells('G12:I12')
                                    ->mergeCells('J12:L12')
                                    ->mergeCells('M12:P15')
                                    ->mergeCells('Q12:R12')
                                    ->mergeCells('S12:V12')
                                    ->mergeCells('Q13:R13')
                                    ->mergeCells('S13:V13')
                                    ->mergeCells('Q14:R15')
                                    ->mergeCells('S14:V15')
                                    ->mergeCells('B13:C13')
                                    ->mergeCells('H13:J13')
                                    ->mergeCells('K13:L13')
                                    ->mergeCells('B14:C14')
                                    ->mergeCells('B15:C15')
                                    ->mergeCells('D14:L15')
                                    ->mergeCells('B16:F16')
                                    ->mergeCells('B17:F17')
                                    ->mergeCells('G16:V17');
//datos estudiantes
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B19:D19')
                                    ->mergeCells('E19:G19')
                                    ->mergeCells('K19:U19')
                                    ->mergeCells('B20:B21')
                                    ->mergeCells('C20:C21')
                                    ->mergeCells('D20:G21')
                                    ->mergeCells('E19:G19')
                                    ->mergeCells('H19:H21')
                                    ->mergeCells('I19:I21')
                                    ->mergeCells('J19:J21')
                                    ->mergeCells('V19:V21');
//segundo estudiantes
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B43:D43')
                                    ->mergeCells('E43:G43')
                                    ->mergeCells('K43:U43')
                                    ->mergeCells('B44:B45')
                                    ->mergeCells('C44:C45')
                                    ->mergeCells('D44:G45')
                                    ->mergeCells('E43:G43')
                                    ->mergeCells('H43:H45')
                                    ->mergeCells('I43:I45')
                                    ->mergeCells('J43:J45')
                                    ->mergeCells('V43:V45');

//PRIMERA Y SEGUNDA RONDA DE NOTAS
FOR($i = 22; $i <= 41; $i++){
  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('D'.$i.':G'.$i);
}
FOR($i = 46; $i <= 70; $i++){
  $objPHPExcel->setActiveSheetIndex(0)->mergeCells('D'.$i.':G'.$i);
}

//DATOS CABECERA
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2',"REGISTRO DE MATRICULA")
                                    ->setCellValue('B3',"EDUCACION SUPERIOR TECNOLOGICO")
                                    ->setCellValue('B4',"PERIODO LECTIVO ". $valor_p_academico[0]);
//DATOS CUERPO
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B7','DATOS DEL INSTITUTO SUPERIOR TECNOLOGICO')
                                    ->setCellValue('B8','DRE-GRE')
                                    ->setCellValue('D8','PUNO')
                                    ->setCellValue('B10','Departamento')
                                    ->setCellValue('D10','PUNO')
                                    ->setCellValue('B11','Provincia')
                                    ->setCellValue('D11','EL COLLAO')
                                    ->setCellValue('B12','Distrito')
                                    ->setCellValue('D12','ILAVE')
                                    ->setCellValue('B13','Lugar')
                                    ->setCellValue('D13','ILAVE')
                                    ->setCellValue('B14','Direccion del IEST')
                                    ->setCellValue('D14','Jr. Puno N° 350')
                                    ->setCellValue('B16','Direccion del IEST')
                                    ->setCellValue('G16','Comunidad de Chillacollo')
                                    ->setCellValue('E8','Nombre')
                                    ->setCellValue('F8','Instituto de Educacion Superior Tecnologico Publico - ILAVE')
                                    ->setCellValue('E9','Carrera')
                                    ->setCellValue('F9',$valor_carrera[0])//ingrese carerra aqui
                                    ->setCellValue('E11','Periodo Academico')
                                    ->setCellValue('F11',$valor_semestre[0])//ingrese periodo aqui
                                    ->setCellValue('E12','Turno')
                                    ->setCellValue('F12','DIURNO')
                                    ->setCellValue('E13','Tipo de Gestion')
                                    ->setCellValue('F13','Publico')
                                    ->setCellValue('G12','Seccion')
                                    ->setCellValue('J12','UNICO')
                                    ->setCellValue('G13','X')
                                    ->setCellValue('H13','Privado')
                                    ->setCellValue('K13','')
                                    ->setCellValue('M9','Resolucion de Autorización')
                                    ->setCellValue('Q9','Tipo')
                                    ->setCellValue('Q10','N°')
                                    ->setCellValue('Q11','Fecha')
                                    ->setCellValue('M12','Resolucion de Revalidacion')
                                    ->setCellValue('Q12','Tipo')
                                    ->setCellValue('Q13','N°')
                                    ->setCellValue('Q14','Fecha')
                                    ->setCellValue('B15','Sede Principal (Av. Jr. Calle)')
                                    ->setCellValue('B17','Local a donde corresponde el registro de matricula');//2714
//cabeza de datos
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B19','Codigo Modular del IESTP:')
                                    ->setCellValue('E19','1027085')
                                    ->setCellValue('K19','UNIDADES DIDACTICAS')
                                    ->setCellValue('B20','N° Ord.')
                                    ->setCellValue('C20','DNI')
                                    ->setCellValue('D20','APELLIDOS Y NOMBRES (EN_ORDEN_ALFABETICO)')
                                    ->setCellValue('H19','SEXO')
                                    ->setCellValue('I19','EDAD')
                                    ->setCellValue('J19','PERSONA CON DISCAPACIDAD')
                                    ->setCellValue('V19','OBS.');
//segundo datos
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B43','Codigo Modular del IESTP:')
                                    ->setCellValue('E43','1027085')
                                    ->setCellValue('K43','UNIDADES DIDACTICAS')
                                    ->setCellValue('B44','N° Ord.')
                                    ->setCellValue('C44','DNI')
                                    ->setCellValue('D44','APELLIDOS Y NOMBRES (EN_ORDEN_ALFABETICO)')
                                    ->setCellValue('H43','SEXO')
                                    ->setCellValue('I43','EDAD')
                                    ->setCellValue('J43','PERSONA CON DISCAPACIDAD')
                                    ->setCellValue('V43','OBS.');
//parte final de fecha y firmas
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('H72:U72')
                                    ->mergeCells('C78:E78')
                                    ->mergeCells('J78:U78')
                                    ->mergeCells('C79:E79')
                                    ->mergeCells('J79:U79');                                   
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H72','Ilave, '.$meses[date('n')-1]. " del ". date('Y'))
                                    ->setCellValue('C78','...................................................')
                                    ->setCellValue('J78','...................................................')
                                    ->setCellValue('C79','Direccion General')
                                    ->setCellValue('J79','Secretaria Academica');
//nombres ud
$ud_posicion = 'K';
while ($lista_ud = mysqli_fetch_row($var_ud)) {
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue($ud_posicion.'20', $lista_ud[1]);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue($ud_posicion.'44', $lista_ud[1]);
  $ud_posicion = chr(ord($ud_posicion)+1);
}
//lista de estudiantes
$numeracion = 1;                                    
for ($i=22; $i < 71; $i++) { 
  if ($i == 42) {
    $i+=4;
  }
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, $numeracion++);
}
//inicio de enlistado de estudiantes
$num_lista = 21;
while ($lista_lista = mysqli_fetch_row($val_lista)) {
    $num_lista++;
    if ($num_lista==42) {
      $num_lista+=4;
    }
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$num_lista, $lista_lista[1]);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$num_lista, $lista_lista[2]);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$num_lista, $lista_lista[3]);
    $anio_nac = explode("-",$lista_lista[4]);//para calcular la edad dependiendo del año
    $edad = date("Y") - $anio_nac[0];
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$num_lista, $edad);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$num_lista, $lista_lista[5]);
    //datos de cursos llevados en el semestre
    $query_ud_est = "SELECT ud.idunidaddidactica, ud.nombre , ud.semestre
                            FROM unidaddidactica ud
                            INNER JOIN semestre s
                            ON ud.semestre = s.idsemestre
                            INNER JOIN modulo m 
                            ON ud.modulo_idmodulo = m.idModulo
                            INNER JOIN escuelaprofesional ep
                            ON m.EscuelaProfesional_idEscuelaProfesional = ep.idEscuelaProfesional
                            WHERE ep.idEscuelaProfesional = '$carrera' and ud.semestre = '$semestre'
                            ORDER BY ud.idUnidadDidactica";
    $var_ud_est = mysqli_query($x->conectar(), $query_ud_est);
    $ud_est_posicion = 'K';
        while ($lista_ud_est = mysqli_fetch_row($var_ud_est)) {
          //para ver si lleva o no curso
          $query_verificacion = "SELECT idmatricula, nota
                                FROM matricula
                                WHERE UnidadDidactica_idUnidadDidactica = $lista_ud_est[0] 
                                AND Estudiante_idEstudiante = $lista_lista[0] AND semestreAcademico = '$p_aca'";
          $var_verificacion = mysqli_query($x->conectar(),$query_verificacion);
          $lista_verificacion = mysqli_fetch_row($var_verificacion);
              if (!is_null($lista_verificacion[0])) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($ud_est_posicion.$num_lista, $lista_verificacion[1]);//para cursos llevados
              }
              else{
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($ud_est_posicion.$num_lista, "");//para cursos no llevados
              }
          $ud_est_posicion = chr(ord($ud_est_posicion)+1);
        }
}

//numeros de unidades
$num_ud = 0;
for ($i=ord('J'); $i < ord('V'); $i++) {
  $val = chr($i); 
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue($val.'21', $num_ud);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue($val.'45', $num_ud);
  $num_ud++;
};
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
  'fill' =>array('type' => PHPExcel_Style_Fill::FILL_SOLID,
    'color' =>
    array('rgb' => 'aaaaFF')
    )
); 
$mini = array(
  'font' => array(
      'size'=> 7),
  'alignment' => array(
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT),
  'fill' =>array('type' => PHPExcel_Style_Fill::FILL_SOLID,
    'color' =>
    array('rgb' => 'aaaaFF'),
    'borders' => array(
    'topborder' => array(
      'style' => 'thin'
    ))
    ));
$bordes = array(
  'borders' => array(
    'allborders' => array(
      'style' => 'thin'
    ))
);

$center_subtitle = array(
  'font' => array(
        'bold' => true,
        'size' => 9,
        'color' => array('rgb' => '449999')),
  'alignment' => array(
    'vertical' => 'center',
    'horizontal' => 'center')
  );
$campos = array(
  'font' => array(
        'bold' => true,
        'size' => 8,
        'name' => 'Tahoma'),
  'alignment' => array(
    'vertical' => 'center'),
  'fill' => array(
    'type' => 'solid',
    'color'=>array(
      'rgb' => 'aaaaff'))
  );
$campos_centrados= array(
  'font' => array(
        'bold' => true,
        'size' => 8,
        'name' => 'Tahoma'),
  'alignment' => array(
    'vertical' => 'center',
    'horizontal' => 'center'),
  'fill' => array(
    'type' => 'solid',
    'color'=>array(
      'rgb' => 'aaaaff'))
  );

$cabecera = array(
  'font' => array(
      'bold' => true,
      'size' => 12),
  'alignment' => array(
    'vertical' => 'center',
    'horizontal' => 'center',)
  );
$mini_centrado = array(
  'font' => array(
      'bold' => true,
      'size' => 8),
  'alignment' => array(
    'vertical' => 'center',
    'horizontal' => 'center',)
  );
$mini_izquierda = array(
  'font' => array(
      'bold' => true,
      'size' => 8),
  'alignment' => array(
    'vertical' => 'center',
    'horizontal' => 'left',)
  );
$mini_mini= array(
  'font' => array(
      'bold' => true,
      'size' => 5),
  'alignment' => array(
    'vertical' => 'bottom',
    'horizontal' => 'left',)
  );

$objPHPExcel->getActiveSheet()->getStyle('B2:V4')->applyFromArray($cabecera);
$objPHPExcel->getActiveSheet()->getStyle('B7:V7')->applyFromArray($subtitle);
$objPHPExcel->getActiveSheet()->getStyle('B8:V17')->applyFromArray($bordes);
$objPHPExcel->getActiveSheet()->getStyle('B19:V41')->applyFromArray($bordes);
$objPHPExcel->getActiveSheet()->getStyle('B43:V70')->applyFromArray($bordes);
$objPHPExcel->getActiveSheet()->getStyle('B8:V17')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('D8:D14')->applyFromArray($center_subtitle);
$objPHPExcel->getActiveSheet()->getStyle('F8:F12')->applyFromArray($center_subtitle);
$objPHPExcel->getActiveSheet()->getStyle('R9:R14')->applyFromArray($center_subtitle);
$objPHPExcel->getActiveSheet()->getStyle('G13')->applyFromArray($center_subtitle);
$objPHPExcel->getActiveSheet()->getStyle('J12')->applyFromArray($center_subtitle);
$objPHPExcel->getActiveSheet()->getStyle('K13')->applyFromArray($center_subtitle);
$objPHPExcel->getActiveSheet()->getStyle('G16')->applyFromArray($center_subtitle);  
$objPHPExcel->getActiveSheet()->getStyle('B8:B14')->applyFromArray($campos);
$objPHPExcel->getActiveSheet()->getStyle('B16')->applyFromArray($campos);
$objPHPExcel->getActiveSheet()->getStyle('E8:E13')->applyFromArray($campos);
$objPHPExcel->getActiveSheet()->getStyle('M9:R14')->applyFromArray($campos);
$objPHPExcel->getActiveSheet()->getStyle('F13')->applyFromArray($campos);
$objPHPExcel->getActiveSheet()->getStyle('G12')->applyFromArray($campos);
$objPHPExcel->getActiveSheet()->getStyle('H13')->applyFromArray($campos);
$objPHPExcel->getActiveSheet()->getStyle('B15')->applyFromArray($mini);
$objPHPExcel->getActiveSheet()->getStyle('B17')->applyFromArray($mini);
$objPHPExcel->getActiveSheet()->getStyle('B20')->applyFromArray($mini);
//cabecera de datos
$objPHPExcel->getActiveSheet()->getStyle('B19:V21')->applyFromArray($campos_centrados);
$objPHPExcel->getActiveSheet()->getStyle('B19:V21')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('H19:J19')->getAlignment()->setTextRotation(90);
$objPHPExcel->getActiveSheet()->getStyle('K20:U20')->getAlignment()->setTextRotation(90);
$objPHPExcel->getActiveSheet()->getStyle('B43:V45')->applyFromArray($campos_centrados);
$objPHPExcel->getActiveSheet()->getStyle('B43:V45')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('H43:J43')->getAlignment()->setTextRotation(90);
$objPHPExcel->getActiveSheet()->getStyle('K44:U44')->getAlignment()->setTextRotation(90);
$objPHPExcel->getActiveSheet()->getStyle('B22:C41')->applyFromArray($mini_centrado);
$objPHPExcel->getActiveSheet()->getStyle('H22:V41')->applyFromArray($mini_centrado);
$objPHPExcel->getActiveSheet()->getStyle('D22:D41')->applyFromArray($mini_izquierda);
$objPHPExcel->getActiveSheet()->getStyle('B45:C70')->applyFromArray($mini_centrado);
$objPHPExcel->getActiveSheet()->getStyle('H45:V70')->applyFromArray($mini_centrado);
$objPHPExcel->getActiveSheet()->getStyle('D45:D70')->applyFromArray($mini_izquierda);
$objPHPExcel->getActiveSheet()->getStyle('K20:U20')->applyFromArray($mini_mini);
$objPHPExcel->getActiveSheet()->getStyle('K44:U44')->applyFromArray($mini_mini);
$objPHPExcel->getActiveSheet()->getStyle('C72:U79')->applyFromArray($mini_centrado);
//$objPHPExcel->getActiveSheet()->getStyle('hw_Array2Objrec(object_array):D2')->getAlignment()->setTextRotation(90);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(1);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(2.6);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(5);
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);
$objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(1);
$objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(15);
$objPHPExcel->getActiveSheet()->getRowDimension('18')->setRowHeight(3);
$objPHPExcel->getActiveSheet()->getRowDimension('20')->setRowHeight(150);
$objPHPExcel->getActiveSheet()->getRowDimension('44')->setRowHeight(150);

for ($i=22; $i <71 ; $i++) { 
  if ($i == 41) {
    $i+=4;
  }
  $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(13);
}
//$objPHPExcel->getActiveSheet()->getStyle('A3:D'.$num)->applyFromArray($h1);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="NOMINA_DE_MATRICULAS_'.$carrera.'.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

 ?>
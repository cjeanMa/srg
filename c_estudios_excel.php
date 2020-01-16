<?php 
	include('config/conexion.php');
	require_once 'excelphp/Classes/PHPExcel.php';

	$x=new conexion();

	$objPHPExcel = new PHPExcel();

	$objPHPExcel->getProperties()->setCreator("JmCastle")
							 ->setLastModifiedBy("JmCastle")
							 ->setTitle("Certificado de Estudios")
							 ->setSubject("Certificado de Estudios")
							 ->setDescription("Certificado de Estudios")
							 ->setKeywords("estudiantes")
							 ->setCategory("Modulo Estudiantes");		
  $titulo_centrado = array(
  'font' => array(
      'bold' => true,
      'size' => 14,
      'name'=> 'Tahoma'),
  'alignment' => array(
    'vertical' => 'center',
    'horizontal' => 'center',)
  );      
    $unidades_didacticas = array(
  'font' => array(
      'size' => 8,
      'name'=> 'Arial'),
  'alignment' => array(
    'vertical' => 'center',
    'horizontal' => 'left',)
  );    
    $semestre = array(
  'font' => array(
      'bold' => true,
      'size' => 8,
      'name'=> 'Tahoma'),
  'alignment' => array(
    'vertical' => 'center',
    'horizontal' => 'left',)
  );  
    $d_unidades = array(
  'font' => array(
      'bold' => false,
      'size' => 8,
      'name'=> 'Tahoma'),
  'alignment' => array(
    'vertical' => 'center',
    'horizontal' => 'center',)
  );

	$dni = $_GET['dni'];
	$idestudiante = $_GET['carrera'];
	$observaciones[]=array();
	$cantidad = 1;
	$asteriscos = "";
  $nom_carrera = "";
	//Para ingresar fechas
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$query_nombre = "SELECT concat(nombres, ' ', apellidoPaterno, ' ',apellidoMaterno) FROM persona WHERE IdPersona = '$dni'";
	$aux_nombre = mysqli_query($x->conectar(), $query_nombre);
	$lista_nombre = mysqli_fetch_row($aux_nombre);
	
	$query_esc = "SELECT a.idescuelaprofesional, a.nombre FROM escuelaProfesional a
	        INNER JOIN (SELECT idestudiante, escuelaProfesional_idescuelaprofesional FROM estudiante WHERE idEstudiante = '$idestudiante') b
	        ON a.idescuelaprofesional = b.escuelaProfesional_idescuelaprofesional";
	$aux_esc = mysqli_query($x->conectar(), $query_esc);
	$lista_esc = mysqli_fetch_row($aux_esc);

  //numeracion de unidades y semestres
  $num = 20;
  //quey para obtener los semestres cursados por un estudiante
	$query_semestre = "SELECT s.prenombre, s.idsemestre
	FROM semestre s 
    INNER JOIN unidaddidactica a
    ON s.idsemestre = a.semestre
    INNER JOIN 
    (SELECT a.UnidadDidactica_idUnidadDidactica uni
    FROM matricula a 
    INNER JOIN
    (SELECT idEstudiante FROM estudiante WHERE idEstudiante = '$idestudiante') b 
    ON a.estudiante_idEstudiante = b.idEstudiante) b
    ON a.idunidaddidactica = b.uni
    GROUP BY a.semestre";
    $var_semestre = mysqli_query($x->conectar(), $query_semestre);
        //BUSQUEDA DE UNIDADES DIDACTICAS POR SEMESTRE
    while ($lista_semestre = mysqli_fetch_row($var_semestre)) {
        $objPHPExcel->getActiveSheet()->getStyle('B'.$num)->applyFromArray($semestre);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$num++,$lista_semestre[0]. " SEMESTRE");
        //QUERY PARA OBTENER LLAS UD POR CARRERA Y SEMESTRE
        		$query_ud="SELECT ud.idUnidadDidactica, ud.nombre, ud.creditos FROM unidaddidactica ud LEFT JOIN modulo m ON ud.modulo_idmodulo = m.idmodulo LEFT JOIN escuelaprofesional ep ON m.escuelaprofesional_idescuelaprofesional = ep.idescuelaprofesional WHERE ep.idescuelaprofesional = '$lista_esc[0]' AND ud.semestre = '$lista_semestre[1]'";
            $var_ud = mysqli_query($x->conectar(), $query_ud);
            while ($lista_ud = mysqli_fetch_row($var_ud)) {
                    $query_idud = "SELECT  a.idMatricula, c.nombre, c.creditos, a.nota, a.notaletra, s.anio, concat(s.anio,'-',s.periodo), c.idunidaddidactica, a.observacion
                    FROM matricula a INNER JOIN unidaddidactica c ON a.unidaddidactica_idunidaddidactica = c.idUnidadDidactica
                    INNER JOIN semestreacademico s ON a.semestreacademico = s.idsemestreacademico
                    WHERE estudiante_idEstudiante = '$idestudiante' AND a.UnidadDidactica_idUnidadDidactica = '$lista_ud[0]' AND a.estado = '1' AND a.estadomodular = '1'";
                    $var_idud = mysqli_query($x->conectar(), $query_idud);
                    $verificacion_ud = mysqli_num_rows($var_idud);
                    if ($verificacion_ud!=0) {
                      while($lista_idud = mysqli_fetch_row($var_idud)){
                      $objPHPExcel->getActiveSheet()->getStyle('B'.$num)->applyFromArray($unidades_didacticas);
                      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$num,$lista_idud[1]);
                      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$num,$lista_idud[2]);
                      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$num,$lista_idud[3]);
                      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$num,$lista_idud[4]);
                      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$num,$lista_idud[5]);
                      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$num++,$lista_idud[6]);
                      }
                    }
                    else{
                    $query_idud_jalado = "SELECT  a.idMatricula, c.nombre, c.creditos, a.nota, a.notaletra, s.anio, concat(s.anio,'-',s.periodo), c.idunidaddidactica, a.observacion
                      FROM matricula a INNER JOIN unidaddidactica c ON a.unidaddidactica_idunidaddidactica = c.idUnidadDidactica
                      INNER JOIN semestreacademico s ON a.semestreacademico = s.idsemestreacademico
                      WHERE estudiante_idEstudiante = '$idestudiante' AND a.UnidadDidactica_idUnidadDidactica = '$lista_ud[0]' ORDER BY a.nota DESC LIMIT 0,1";
                      $var_idud_jalado = mysqli_query($x->conectar(), $query_idud_jalado);
                        while($lista_idud_jalado = mysqli_fetch_row($var_idud_jalado)){
                        $objPHPExcel->getActiveSheet()->getStyle('B'.$num)->applyFromArray($unidades_didacticas);
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$num,$lista_idud_jalado[1]);
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$num,$lista_idud_jalado[2]);
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$num,$lista_idud_jalado[3]);
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$num,$lista_idud_jalado[4]);
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$num,$lista_idud_jalado[5]);
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$num++,$lista_idud_jalado[6]);
                        }
                      }
                }//llave lista_ud
        }
        //llave lista_semestre
     
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B10:H10')
    									->mergeCells('B15:H15');

	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B10', $lista_nombre[0])
                  										->setCellValue('B15', $lista_esc[1]); 

									
	$objPHPExcel->getActiveSheet()->getStyle('B10:B15')->applyFromArray($titulo_centrado);
  $objPHPExcel->getActiveSheet()->getStyle('C20:G75')->applyFromArray($d_unidades);

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(1);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);

  for ($i=20; $i < 75; $i++) { 
    $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(13);  
  }
  
										
    header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="CERTIFICADO DE ESTUDIOS '.$lista_nombre[0].'.xls"');
	header('Cache-Control: max-age=0');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;

 ?>
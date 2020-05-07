<?php
Class Documentos extends CI_Controller{

    public $tipoDocumento = array("Certificados","Constancias");
    public $documentos = array(
                "0" => array("Certificado de Estudios", "Certificado Modular"),
                "1" => array("Constancia de Notas", "Constancia de Matriculas", "Constancia de Estudios")
            );
    public $tipoReporte = array("Consolidado", "Reporte");
    public $reporte = array(
                "0"=>array("Consolidado Matriculas", "Consolidado Notas"),
                "1"=>array("Reporte Matriculas", "Reporte Notas")
            );

    public $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre");
    //Array para hacer pruebas de nominas de matriculas
    public $tipoMatricula = array(
            "0" => array("idTipoMatricula"=>"1","nombreTipoMatricula" => "Regulares"),
            "1" => array("idTipoMatricula"=>"2", "nombreTipoMatricula" => "Recuperación"),
            "2" => array("idTipoMatricula"=>"3", "nombreTipoMatricula" => "Extraordinarios") 
            );

    public $infoInstitucional = array(
            "nombre" => "Instituto de Educación Superior Tecnologico Público - ILAVE",
            "turno" => "Diurno",
            "departamento" => "Puno",
            "provincia" => "El Collao",
            "distrito" => "Ilave",
            "direccion" => "Jr. Puno Nº 350",
            "direccion local" => "Av. Panamericana Sur Km. 1814  - ILAVE",
            "local" => "Comunidad de Chillacollo",
            "DRE" => "Puno",
            "codigo" => "1027085",
            );
        //Array para hacer pruebas de nominas de matriculas
    public $unidadesDidacticas = array(
            '0' => array("nombreUd"=>"Curso uno", "idUd" => "01", "credito"=>"3", "nota"=>"15", "notaLetra"=>"quince", "periodo"=>"2018", "lectivo"=> "2018-II"),
            '1' => array("nombreUd"=>"Curso 2", "idUd" => "02", "credito"=>"2", "nota"=>"15", "notaLetra"=>"quince", "periodo"=>"2018", "lectivo"=> "2018-II"),
            '2' => array("nombreUd"=>"Curso 3", "idUd" => "03", "credito"=>"4", "nota"=>"15", "notaLetra"=>"quince", "periodo"=>"2018", "lectivo"=> "2018-II"),
            '3' => array("nombreUd"=>"Curso 4", "idUd" => "04", "credito"=>"3", "nota"=>"15", "notaLetra"=>"quince", "periodo"=>"2018", "lectivo"=> "2018-II"),
            '4' => array("nombreUd"=>"Curso 5", "idUd" => "05", "credito"=>"3", "nota"=>"15", "notaLetra"=>"quince", "periodo"=>"2018", "lectivo"=> "2018-II"),
            '5' => array("nombreUd"=>"Curso 6", "idUd" => "06", "credito"=>"5", "nota"=>"15", "notaLetra"=>"quince", "periodo"=>"2018", "lectivo"=> "2018-II"),
    ); 
    //Array para hacer pruebas de nominas de matriculas // ejm. filtro por escuela, periodoAcademico y semestre
    public $estMatriculados = array(
        '0' => array("nombreEst"=>"nombre uno", "apEst"=>" apellido1", "amEst"=>"apellido1", "idEst" => "01","dni" => "000001"),
        '1' => array("nombreEst"=>"nombre dos", "apEst"=>" apellido2", "amEst"=>"apellido2", "idEst" => "02","dni" => "000002"),
        '2' => array("nombreEst"=>"nombre tres", "apEst"=>" apellido3", "amEst"=>"apellido3", "idEst" => "03","dni" => "000003"),        
        '3' => array("nombreEst"=>"nombre cuatro", "apEst"=>" apellido4", "amEst"=>"apellido4", "idEst" => "04","dni" => "000004"),
        '4' => array("nombreEst"=>"nombre cinco", "apEst"=>" apellido5", "amEst"=>"apellido5", "idEst" => "05","dni" => "000005"),
        '5' => array("nombreEst"=>"nombre seis", "apEst"=>" apellido6", "amEst"=>"apellido6", "idEst" => "06","dni" => "000006"),
    ); 

    public $udsMatriculadas = array(
            "01" => array(array(
                '0' => array( "idUd" => "01", "idEst" => "01"),
                '1' => array( "idUd" => "02", "idEst" => "01"),
                '2' => array( "idUd" => "03", "idEst" => "01"),
                '3' => array( "idUd" => "04", "idEst" => "01"),
                '4' => array( "idUd" => "05", "idEst" => "01"),
                '5' => array( "idUd" => "06", "idEst" => "01"),
            )),
            "02" => array(array(
                '0' => array( "idUd" => "01", "idEst" => "02"),
                '1' => array( "idUd" => "02", "idEst" => "02"),
            )),
            "03" => array(array(
                '0' => array( "idUd" => "01", "idEst" => "03"),
            )),
            "04" => array(array(
                '0' => array( "idUd" => "01", "idEst" => "04"),
                '1' => array( "idUd" => "05", "idEst" => "04"),
                '2' => array( "idUd" => "06", "idEst" => "04"),
            )),
            "05" => array(array(
                '0' => array( "idUd" => "01", "idEst" => "05"),
                '3' => array( "idUd" => "04", "idEst" => "05"),
                '4' => array( "idUd" => "05", "idEst" => "05"),
                '5' => array( "idUd" => "06", "idEst" => "05"),
            )),
            "06" => array(array(
                '3' => array( "idUd" => "04", "idEst" => "06"),
                '4' => array( "idUd" => "05", "idEst" => "06"),
                '5' => array( "idUd" => "06", "idEst" => "06"),
)),
        );


public function __construct(){
    parent::__construct();
    $this->load->model('Estudiante_model');
    $this->load->model('Escuelaprofesional_model');
    $this->load->model('Modulo_model');
    $this->load->model('Semestreacademico_model');
    $this->load->model('Semestre_model');
    
}

function index(){
    
    $data['tipoDocumento'] = $this->tipoDocumento;
    $data['tipoReporte'] = $this->tipoReporte;
    $data['tipoMatricula'] = $this->tipoMatricula;
    $data['escuelaProfesional'] = $this->Escuelaprofesional_model->get_all_escuelaprofesional();
    $data['semestreAcademico'] = $this->Semestreacademico_model->get_all_semestreacademico();
    $data['semestre'] = $this->Semestre_model->get_all_semestre();
    $data['javascript'] = array('persona/addPersona.js','documento/index.js');
    $data['_view'] = 'documentos/index';
    $this->load->view('layouts/main',$data);
}

/*
*Funcion para cargar los documentos de un tipo con Ajax
*/

function listDocumentAjax(){
    if($this->input->is_ajax_request()){
        $params = $this->input->post();
        if(isset($params)){
            $data['docs'] = $this->documentos[$params['typeDocument']];
            $this->load->view('ajax/listDocument',$data); 
        }
    }
}

/*
*Funcion para cargar los reportes de un tipo con Ajax
*/

function listReportAjax(){
    if($this->input->is_ajax_request()){
        $params = $this->input->post();
        if(isset($params)){
            $data['reports'] = $this->reporte[$params['typeReport']];
            $this->load->view('ajax/listReport',$data); 
        }
    }
}

/*
* Funcion para definir que tipo de documento imprimira 
*/

function printPDF($idEst="", $idType="", $idDoc="", $idModulo=""){
    if($idType==0){
        switch($idDoc){
            case 0:
                $this->load->library('fpdf_vertical');
                $this->printCertEstudios($idEst);
            break;
            case 1:
                $this->load->library('fpdf_cerModular');
                $this->printCertModular($idEst, $idModulo);
            break;
        }
    }
    //para identificar constancias
    elseif ($idType==1) {
        switch($idDoc){
            case 0:
                $this->load->library('fpdf_vertical');
                $this->printConstNotas($idEst,$idModulo);
            break;
            case 1:
                $this->load->library('fpdf_vertical');
                $this->printConstMatriculas($idEst);
            break;
            case 2: 
                $this->load->library('fpdf_vertical');
                $this->printConstEstudios($idEst);
            break;
            
        }
    }
}

/*
* Funcion para definir que tipo de consolidado o reporte imprimira 

*/

function printReporte($idTypeRep=null, $report=null, $classReport=null, $pAcademico=null, $pEstudio=null ,$sAcademico=null){
    if($idTypeRep==0){
        switch($report){
            case 0:
                $this->load->library('fpdf_vertical');
                $this->printConsolidadoMatricula($pAcademico, $pEstudio, $sAcademico);
            break;
            case 1:
                $this->load->library('fpdf_horizontal');
                $this->printConsolidadoNotas($pAcademico, $pEstudio, $sAcademico);
            break;
        }
    }
    //para identificar constancias
    elseif ($idTypeRep==1) {
        switch($report){
            case 0:
                $this->printReportMatricula($classReport, $pAcademico);
            break;
            case 1:
                $this->printReportNotas($classReport, $pAcademico);
            break;
        }
    }
}

/*
*Funcion para imprimir el PDF de certificado de estudios
*/

function printCertEstudios($idEstudiante){
    $fila = 8;
    $ancho = 180;
    $fecha = getdate();
    $this->fpdf->SetFont('Arial','B',15);
    $estudiante = $this->Estudiante_model->get_estudiante_persona($idEstudiante);
    $this->fpdf->setXY(25,85);
    $this->fpdf->Cell($ancho-10, $fila, utf8_decode(strtoupper($estudiante['nombres']." ".$estudiante['apellidoPaterno']." ". $estudiante['apellidoMaterno'])), 0, 0, "C");
    $this->fpdf->setXY(15,101);
    $this->fpdf->Cell($ancho, $fila, utf8_decode(strtoupper($estudiante['nombreEscuelaProfesional'])), 0, 0, "C");
    $this->tablaCertificadoEstudios($idEstudiante);
    $this->fpdf->setXY(130,225);
    $this->fpdf->Cell(65, $fila/2, utf8_decode("Ilave, ". $fecha['mday']. " de ". $this->meses[$fecha['mon']]. " del ". $fecha['year']));

    $this->printDoc('Cert_Estudios'.$idEstudiante.'.pdf', 0);
}

/*
*Funcion para imprimir el PDF de certificado modular
*/
function printCertModular($idEstudiante, $idModulo){
    $this->printDoc("Cert. Mod. ".$idEstudiante,0);
}

/*
*Funcion para imprimir el PDF de certificado modular
*/
function printConstNotas($idEstudiante, $idModulo){
    $this->cabecera(0);
    $this->printDoc("Const. Notas " . $idEstudiante,0);
}

/*
*Funcion para imprimir el PDF de certificado modular
*/
function printConstMatriculas($idEstudiante){
    $this->cabecera(0);
    $this->printDoc("Const. Matriculas ".$idEstudiante ,0);
}

/*
*Funcion para imprimir el PDF de certificado modular
*/
function printConstEstudios($idEstudiante){
    $this->cabecera(0);
    $this->printDoc("Const. Estudios ".$idEstudiante,0);
}

/**
 * Funcion para imprimir las notas del certificado de estudios
 */

 function tablaCertificadoEstudios($idEstudiante){
    $this->fpdf->SetMargins(20,17,17);
    $this->fpdf->setXY(20,145);
     $fila = 4;
     $col = array(69,18,14,31,21,21);
     $contador = 0;
     for ($i=0; $i < 6; $i++) { 
        $this->fpdf->SetFont('Arial','B',11);
        $this->fpdf->Cell($col[0], $fila, "SEMESTRE ". $i, 0, 0, "L");
        $this->fpdf->Ln($fila);
        $this->fpdf->SetFont('Arial','',10);
        foreach($this->unidadesDidacticas as $uds){
            $this->fpdf->Cell($col[0], $fila, $uds['nombreUd'], 0, 0, "L");
            $this->fpdf->Cell($col[1], $fila, $uds['credito'], 0, 0, "C");
            $this->fpdf->Cell($col[2], $fila, $uds['nota'], 0, 0, "C");
            $this->fpdf->Cell($col[3], $fila, $uds['notaLetra'], 0, 0, "C");
            $this->fpdf->Cell($col[4], $fila, $uds['periodo'], 0, 0, "C");
            $this->fpdf->Cell($col[5], $fila, $uds['lectivo'], 0, 0, "C");
            $this->fpdf->Ln($fila);
            $contador++;
            if ($contador==30) {
                $this->fpdf->AddPage();
                $this->fpdf->Ln($fila*5);
            }
        }
        $this->fpdf->Ln($fila/2);
        $contador++;
        if ($contador==30) {
            $this->fpdf->AddPage();
            $this->fpdf->Ln($fila*5);
        }
     }
     
 }


/*
* Funcion para imprimir consolidado de matriculas
*/
function printConsolidadoMatricula($pAcademico, $pEstudio, $sAcademico){
    $title = "Registro de Matricula";
    $periodoAcademico = $this->Semestreacademico_model->get_semestreacademico($pAcademico);
    $escuelaProfesional = $this->Escuelaprofesional_model->get_escuelaprofesional($pEstudio);
    $semestre = $this->Semestre_model->get_semestre($sAcademico);
    //Falta funcion para filtrar los cursos por carrera y semestre para su posterior compracion con los cursos de un estudiante
    $uds_semestre = $this->unidadesDidacticas;
    $est_matriculados = $this->estMatriculados;

    $this->cabeceraConsolidadoMatricula(15,15,$title,$periodoAcademico, $escuelaProfesional, $semestre);
    $this->tablaConsolidadoMatriculas($uds_semestre,$est_matriculados);

    $this->printDoc("Conso. Matricula ". $periodoAcademico['anio']."-".$periodoAcademico['periodo']."/ ".$pEstudio. " / ". $sAcademico, 0);
}

/*
* Funcion para imprimir consolidado de notas
*/
function printConsolidadoNotas($pAcademico, $pEstudio, $sAcademico){
    $title = "Registro de Acta de Evaluacion";
    $periodoAcademico = $this->Semestreacademico_model->get_semestreacademico($pAcademico);
    $escuelaProfesional = $this->Escuelaprofesional_model->get_escuelaprofesional($pEstudio);
    $semestre = $this->Semestre_model->get_semestre($sAcademico);
    //Falta funcion para filtrar los cursos por carrera y semestre para su posterior compracion con los cursos de un estudiante
    $uds_semestre = $this->unidadesDidacticas;
    $est_matriculados = $this->estMatriculados;
    $this->cabeceraConsolidadoNotas(15,15,$title,$periodoAcademico, $escuelaProfesional, $semestre, $uds_semestre);
    $this->tablaConsolidadoNotas($uds_semestre,$est_matriculados);

    $this->printDoc("Conso. Notas ". $periodoAcademico['anio']."-".$periodoAcademico['periodo']."/ ".$pEstudio. " / ". $sAcademico, 0);
}

/*
* Funcion para imprimir reporte de matriculas
*/
function printReportMatricula($classReport, $pAcademico){
    $this->printDoc("Report. Matricula". $pAcademico." - ". $classReport, 0);
}

/*
* Funcion para imprimir reporte de notas
*/
function printReportNotas($classReport, $pAcademico){
    $this->printDoc("Report. Notas". $pAcademico." - ". $classReport, 0);
}


/*
*Funcion para finalizar un documento fpdf y mandar el nombre y el tipo de salida 0:visualizar en buscador y 1:para descargar directamente
*/

function printDoc($name, $type){
    $tipo = array('I', 'D');
    $auxtype = $tipo[$type];
    $this->fpdf->setTitle($name);
    $this->fpdf->Output($name,$auxtype);
}

/*
* Funcion para cabecera de documentos varios
*/

function cabecera($posicion = 0)
    {
        $this->fpdf->ln($posicion);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->SetFont('Arial','B',11);
        $this->fpdf->image(asset_url().'/ilave/img/logo.png', 20, $posicion + 4, 20, 20);
        $this->fpdf->image(asset_url().'/ilave/img/minedu.jpg', 175,$posicion + 8,20, 14);
        $this->fpdf->Cell(190,4,utf8_decode("INSTITUTO DE EDUCACIÓN SUPERIOR TECNOLÓGICO PÚBLICO"),0,0,'C');
        $this->fpdf->Ln(4);
        $this->fpdf->Cell(190,4,"ILAVE ",0,0,'C');
        $this->fpdf->ln(4);
        
        $this->fpdf->SetFont('Arial','B',7);
        $this->fpdf->Cell(190,4,"OFICINA DE SECRETARIA ACADEMICA",0,0,'C');
        $this->fpdf->SetFont('Arial','B',6);
        $this->fpdf->ln(2);
        $this->fpdf->Cell(190,4,utf8_decode("Panamericana Sur 4.5 km. Chillacollo - Ilave"),0,0,'C');
        $this->fpdf->ln(4);
        $this->fpdf->Cell(190,1,"","B",0,"C");
        $this->fpdf->Ln(4);
        $this->fpdf->SetLineWidth(0.1);
    }

/*
* Funcion para cabecera de consolidados

*/

function cabeceraConsolidadoMatricula($posicionX = 15, $posicionY = 15, $title, $pl, $ep, $sem)
    {
        $fila = 6.5;
        $columnas = array(25,15,20,15,15,15,15,25,15,20);
        $this->fpdf->setXY($posicionX, $posicionY);
        //$this->fpdf->SetLineWidth(1);
        $this->fpdf->SetFont('Arial','B',12);
        $this->fpdf->image(asset_url().'/ilave/img/logo.png', $posicionX + 5, $posicionY-2, 25, 25);
        $this->fpdf->image(asset_url().'/ilave/img/minedu.jpg', $posicionX + 150,$posicionY + 5,20, 14);
        $this->fpdf->Cell(array_sum($columnas),$fila,utf8_decode(strtoupper($title)),0,1,'C');
        $this->fpdf->Cell(array_sum($columnas),$fila,utf8_decode("EDUCACION SUPERIOR TECNOLOGICO"),0,1,'C');
        $this->fpdf->Cell(array_sum($columnas),$fila,utf8_decode("PERIODO LECTIVO ". $pl['anio']."-".$pl['periodo']),0,1,'C');
        $this->fpdf->ln(4);
        
        $this->fpdf->SetFont('Arial','B',11);
        $this->fpdf->SetFillColor(106, 177, 222);
        $this->fpdf->Cell(array_sum($columnas),$fila,"DATOS DEL INSTITUTO SUPERIOR TECNOLOGICO",1,1,'C',true);
        $this->fpdf->SetFont('Arial','B',9);
        $this->fpdf->Cell($columnas[0], $fila*2, "DRE-GRE", 1, 0, 'L',true);
        $this->fpdf->Cell($columnas[1], $fila*2,utf8_decode($this->infoInstitucional['DRE']), 1, 0, "C");
        $this->fpdf->Cell($columnas[2], $fila, "Nombre", 1, 0, "L",true);
        $this->fpdf->Cell($this->sumar_array($columnas, array(3,4,5,6,7,8,9)),$fila,utf8_decode($this->infoInstitucional["nombre"]),1,1,"C");
        $this->fpdf->Cell($this->sumar_array($columnas, array(0,1)),$fila,"",0,0);//Para rellenar columnas
        $this->fpdf->Cell($columnas[2],$fila*2, "Carrera", 1, 0, "L",true);
        $this->fpdf->Cell($this->sumar_array($columnas, array(3,4,5,6)),$fila*2, utf8_decode($ep['nombreEscuelaProfesional']), 1, 0, "C");
        $this->fpdf->Cell($columnas[7], $fila*4, utf8_decode("Resolución\nde\nAutorización"), 1, 0, "C",true);
        $this->fpdf->Cell($columnas[8], $fila, "Tipo", 1, 0, "L",true);
        $this->fpdf->Cell($columnas[9], $fila, substr($ep['res_autorizacion'],0,4), 1, 1, "C");
        $this->fpdf->Cell($columnas[0], $fila, "Departamento", 1, 0, "L",true);
        $this->fpdf->Cell($columnas[1], $fila, utf8_decode($this->infoInstitucional['departamento']), 1, 0, "C");
        $this->fpdf->Cell($this->sumar_array($columnas, array(2,3,4,5,6,7)),$fila,"",0,0);//Para rellenar columnas
        $this->fpdf->Cell($columnas[8], $fila, utf8_decode("Nº"), 1, 0, "L",true);
        $this->fpdf->Cell($columnas[9], $fila, substr($ep['res_autorizacion'],4), 1, 1, "C");
        $this->fpdf->Cell($columnas[0], $fila*2, "Provincia", 1, 0, "L",true);
        $this->fpdf->Cell($columnas[1], $fila*2, utf8_decode($this->infoInstitucional['provincia']), 1, 0, "C");
        $this->fpdf->Cell($columnas[2], $fila*2, utf8_decode("Periodo\nAcadémico"), 1, 0, "L",true);
        $this->fpdf->Cell($this->sumar_array($columnas, array(3,4,5,6)), $fila*2, strtoupper($sem['nombre']) , 1, 0, "C");
        $this->fpdf->Cell($columnas[7], $fila*2, "",0,0);//para rellenar columnas
        $this->fpdf->Cell($columnas[8], $fila*2, utf8_decode("Fecha"), 1, 0, "L",true);
        $this->fpdf->Cell($columnas[9], $fila*2, $ep['fecha_autorizacion'], 1, 1, "C");
        $this->fpdf->Cell($columnas[0], $fila, "Distrito", 1, 0, "L",true);
        $this->fpdf->Cell($columnas[1], $fila, utf8_decode($this->infoInstitucional['distrito']), 1, 0, "C");
        $this->fpdf->Cell($columnas[2], $fila, "Turno", 1, 0, "L",true);
        $this->fpdf->Cell($columnas[3], $fila, utf8_decode($this->infoInstitucional['turno']), 1, 0, "C");
        $this->fpdf->Cell($this->sumar_array($columnas, array(4,5)), $fila, "Secccion", 1, 0, "L",true);
        $this->fpdf->Cell($columnas[6], $fila, "UNICO", 1, 0, "C");
        $this->fpdf->Cell($columnas[7], $fila*4, utf8_decode("Resolución\nde\nRevalidación"), 1, 0, "C",true);
        $this->fpdf->Cell($columnas[8], $fila, "Tipo", 1, 0, "L",true);
        $this->fpdf->Cell($columnas[9], $fila, substr($ep['res_revalidacion'],0,4), 1, 1, "C");
        $this->fpdf->Cell($columnas[0], $fila, "Lugar", 1, 0, "L",true);
        $this->fpdf->Cell($columnas[1], $fila, "ILAVE", 1, 0, "C");
        $this->fpdf->Cell($columnas[2], $fila, utf8_decode("Tipo de\nGestión"), 1, 0, "L",true);
        $this->fpdf->Cell($columnas[3], $fila, utf8_decode("Público"), 1, 0, "C",true);
        $this->fpdf->Cell($columnas[4], $fila, "X", 1, 0, "C");
        $this->fpdf->Cell($columnas[5], $fila, utf8_decode("Privado"), 1, 0, "C",true);
        $this->fpdf->Cell($columnas[6], $fila, utf8_decode(""), 1, 0, "C");
        $this->fpdf->Cell($columnas[7], $fila, "", 0, 0);//Para rellenar columnas
        $this->fpdf->Cell($columnas[8], $fila, utf8_decode("Nº"), 1, 0, "L",true);
        $this->fpdf->Cell($columnas[9], $fila, substr($ep['res_revalidacion'],4), 1, 1, "C");
        $this->fpdf->Cell($columnas[0], $fila, utf8_decode("Dirección del IEST"), 1, 0, "L",true);
        $this->fpdf->Cell($this->sumar_array($columnas,array(1,2,3,4,5,6)), $fila*2, utf8_decode($this->infoInstitucional['direccion']), 1, 0, "C");
        $this->fpdf->Cell($columnas[7], $fila,"", 0, 0);//Para rellenar columnas
        $this->fpdf->Cell($columnas[8], $fila*2, utf8_decode("Fecha"), 1, 0, "L",true);
        $this->fpdf->Cell($columnas[9], $fila*2, utf8_decode($ep['fecha_revalidacion']), 1, 1, "C");
        $this->fpdf->Ln(-$fila);
        $this->fpdf->SetFont('Arial','',7);
        $this->fpdf->Cell($columnas[0], $fila, utf8_decode("Sede Principal(Av. Jr. Calle)"), 1, 0, "L",true);
        $this->fpdf->Cell($this->sumar_array($columnas,array(1,2,3,4,5,6)), $fila,"", 0, 1);//Para rellenar
        $this->fpdf->SetFont('Arial','B',9);
        $this->fpdf->Cell($this->sumar_array($columnas,array(0,1,2,3,4)), $fila, utf8_decode("Dirección del IEST"), 1, 0, "L",true);
        $this->fpdf->Cell($this->sumar_array($columnas,array(5,6,7,8,9)), $fila*2, utf8_decode($this->infoInstitucional['local']), 1, 1, "C");
        $this->fpdf->Ln(-$fila);
        $this->fpdf->SetFont('Arial','',7);
        $this->fpdf->Cell($this->sumar_array($columnas,array(0,1,2,3,4)), $fila, utf8_decode("Local a donde corresponde el registro de matricula"),1,1,"L",true);
        $this->fpdf->Ln(2);
        
    }

    /**
     * Para mostrar los datos delconsolidado de matriculas
     */
    function tablaConsolidadoMatriculas($udSemestre, $estMatriculados){
        $fila = 5;
        $columnas = array(10,20,40,5);
        
        $this->cabeceraTablaMatriculas($udSemestre);    
        $num = 1;
        for ($i=0; $i < 46; $i++) { 
            
            if(isset($estMatriculados[$i])){
                $this->fpdf->SetFont('Arial','',8);
                $this->fpdf->Cell($columnas[0], $fila, $num++, 1, 0, "C");
                $this->fpdf->Cell($columnas[1], $fila, $estMatriculados[$i]['dni'], 1, 0, "C");
                $this->fpdf->Cell($this->sumar_array($columnas, array(1,2)), $fila, utf8_decode($estMatriculados[$i]['apEst']." ".$estMatriculados[$i]['amEst']. " ".$estMatriculados[$i]['nombreEst']), 1, 0, "L");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->SetFont('ZapfDingbats','',10);
                $this->fpdf->Cell($columnas[1], $fila, "", 1, 1, "C");
            }

            else if ($i == 20) {

                $this->fpdf->AddPage();
                $this->cabeceraTablaMatriculas($udSemestre);
            }

            else if(!isset($estMatriculados[$i])){
                $this->fpdf->SetFont('Arial','',8);
                $this->fpdf->Cell($columnas[0], $fila, $num++, 1, 0, "C");
                $this->fpdf->Cell($columnas[1], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($this->sumar_array($columnas, array(1,2)), $fila, "", 1, 0, "L");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($columnas[3], $fila, "", 1, 0, "C");
                $this->fpdf->SetFont('ZapfDingbats','',10);
                $this->fpdf->Cell($columnas[1], $fila, "", 1, 1, "C");
            }
        }
        $this->fpdf->SetFont('Arial','',10);
        $this->fpdf->Ln($fila*3);
        $hoy = getdate();
        $this->fpdf->Cell($columnas[2]*4,$fila,"Ilave, ". $this->meses[$hoy['mon']-1]. " del ". $hoy['year'],0,1,"R");
        $this->fpdf->ln($fila*8);
        $this->fpdf->Cell($columnas[1],$fila);
        $this->fpdf->Cell($this->sumar_array($columnas,array(0,2)),$fila,"Director General", "T", 0, "C");
        $this->fpdf->Cell($columnas[1]*2,$fila);
        $this->fpdf->Cell($this->sumar_array($columnas,array(0,2)),$fila,"Secretaria General", "T", 0, "C");
        $this->fpdf->Cell($columnas[1],$fila);
        
    }
    
    function cabeceraTablaMatriculas($ud){
        $fila = 6;
        $columnas = array(10,20,40,5);
        $this->fpdf->SetFont('Arial','B',10);
        $this->fpdf->Cell($this->sumar_array($columnas,array(2,0)),$fila,utf8_decode("Código Modular del IESTP:"),1,0,"L",true);
        $this->fpdf->Cell($columnas[2], $fila,$this->infoInstitucional['codigo'],1,0,"C",true);
        $this->fpdf->VCell($columnas[3], $fila*10, "SEXO" ,1 ,0, "C", true);
        $this->fpdf->VCell($columnas[3], $fila*10, "EDAD" ,1 ,0, "C", true);
        $this->fpdf->VCell($columnas[3], $fila*10, "PERSONA CON DISCAPACIDAD" ,1 ,0, "C", true);
        $this->fpdf->Cell($columnas[3]*11, $fila, "UNIDADES DIDACTICAS" ,1 ,0, "C", true);
        $this->fpdf->Cell($columnas[1], $fila*10, "OBS." ,1 ,0, "C", true);
        $this->fpdf->Ln($fila);
        $this->fpdf->Cell($columnas[0], $fila*9, utf8_decode("Nº Ord."), 1, 0, "C", true);
        $this->fpdf->Cell($columnas[1], $fila*9, "DNI", 1, 0, "C", true);
        $this->fpdf->Cell($this->sumar_array($columnas,array(1,2)), $fila*9, "APELLIDOS Y NOMBRES\n(EN ORDEN ALFABETICO)", 1, 0, "C", true);
        $this->fpdf->Cell($columnas[3]*3, $fila, "", 0, 0);//Para insertar columnas de relleno
        for($i = 0; $i < 11; $i++){  //Para la insercion de las unidades didacticas
            if(isset($ud[$i])){
                $this->fpdf->SetFont('Arial','',8);
                $this->fpdf->VCell($columnas[3], $fila*8, utf8_decode($ud[$i]['nombreUd']), 1, 0, "D", true);
            }
            else{
                $this->fpdf->VCell($columnas[3], $fila*8, "", 1, 0, "C", true);
            }
        }
        $this->fpdf->ln($fila*8);
        $this->fpdf->Cell($this->sumar_array($columnas, array(0,1,1,2,3,3,3)),$fila, "", 0, 0);//Para rellenar columnas
        for ($i=1; $i <= 11; $i++) { 
            $this->fpdf->SetFont('Arial','B',9);
            $this->fpdf->Cell($columnas[3], $fila, $i, 1, 0, "C", true);
        }
        $this->fpdf->Ln($fila);
        //Para empezar a rellenar los datos de los estudiantes
    }

    function cabeceraConsolidadoNotas($posicionX = 15, $posicionY = 15, $title, $pl, $ep, $sem, $udSemestre){
        $fila = 6;
        $col = array(5,6,15,20,30,70);
        $this->fpdf->setXY($posicionX, $posicionY);
        //$this->fpdf->SetLineWidth(1);
        $this->fpdf->SetFont('Arial','B',14);
        $this->fpdf->image(asset_url().'/ilave/img/logo-minedu.png', $posicionX + 5, $posicionY, 50, 18);
        $this->fpdf->image(asset_url().'/ilave/img/logo.png', $posicionX + 220,$posicionY - 5, 25, 25);
        $this->fpdf->Cell(267,$fila,utf8_decode(strtoupper($title)), 0,1,"C");
        $this->fpdf->Cell(267,$fila,utf8_decode("EDUCACION SUPERIOR TECNOLOGICA"), 0,1,"C");
        $this->fpdf->Cell(267,$fila,utf8_decode("AÑO (". $pl['anio'] .") PERIODO LECTIVO (". $pl['anio']."-".$pl['periodo'].")"), 0,1,"C");
        $this->fpdf->Ln($fila);
        //Parte de los datos
        $this->fpdf->SetFont('Arial','',10);
        $this->fpdf->SetFillColor(106, 177, 222);
        $this->fpdf->Cell($this->sumar_array($col, array(0,3)), $fila, "Nombre del IEST", 1, 0, "L", true);
        $this->fpdf->Cell($this->sumar_array($col, array(0,2,3,3,3,3)),$fila,utf8_decode($this->infoInstitucional['nombre']), 1, 0,"C");
        $this->fpdf->Cell($col[1]*13,$fila,utf8_decode("UNIDADES DIDÁCTICAS"), 1, 0,"C");
        $this->fpdf->Cell($col[5],$fila,utf8_decode("CARRERA:"), "TLR", 0,"D");
        $this->fpdf->Ln($fila);
        $this->fpdf->Cell($this->sumar_array($col, array(0,3)), $fila, utf8_decode("Nº de Codgo Modular"), 1, 0, "L", true);
        $this->fpdf->Cell($this->sumar_array($col, array(0,2,3,3)),$fila,utf8_decode($this->infoInstitucional['codigo']), 1, 0,"C");
        $this->fpdf->Cell($col[3],$fila,utf8_decode("Tipo de Gestión"), 1, 0,"C",true);
        $this->fpdf->Cell($col[3],$fila,utf8_decode("Público"), 1, 0,"C");
        //UD`s
        for ($i=0; $i < 11; $i++) { 
            $this->fpdf->SetFont('Arial','',7);
            if(isset($udSemestre[$i]))
                $this->fpdf->VCell($col[1], $fila*7,utf8_decode($udSemestre[$i]['nombreUd']), 1, 0,"D");
            else
                $this->fpdf->VCell($col[1], $fila*7, "", 1, 0, "D");
        }
        $this->fpdf->VCell($col[1], $fila*9, utf8_decode("Número de Unidades Didácticas Aprobadas"),1,0,"C");
        $this->fpdf->VCell($col[1], $fila*9, utf8_decode("Número de Unidades Didácticas Desaprobadas"),1,0,"C");
        $this->fpdf->SetFont('Arial','',10);
        $this->fpdf->Cell($col[5], $fila, utf8_decode(strtoupper($ep['nombreEscuelaProfesional'])),"LR",0,"C");
        $this->fpdf->Ln($fila);
        $this->fpdf->Cell($this->sumar_array($col, array(0,3)), $fila, "Departamento", 1, 0, "L", true);
        $this->fpdf->Cell($col[3], $fila, utf8_decode($this->infoInstitucional['departamento']), 1, 0, "C");
        $this->fpdf->Cell($col[3],$fila,utf8_decode("Provincia"), 1, 0, "L", true);
        $this->fpdf->Cell($col[3],$fila,utf8_decode($this->infoInstitucional['provincia']), 1, 0, "C");
        $this->fpdf->Cell($col[3],$fila,utf8_decode("Distrito"), 1, 0, "L", true);
        $this->fpdf->Cell($col[3],$fila,utf8_decode($this->infoInstitucional['distrito']), 1, 0, "C");
        $this->fpdf->Cell($col[1]*13,$fila,"",0, 0);//relleno
        $this->fpdf->Cell($col[5], $fila*2, utf8_decode("MENCION: PROFESIONAL TECNICO"),"LR", 0, "L");
        $this->fpdf->Ln($fila);
        $this->fpdf->Cell($this->sumar_array($col, array(0,3)), $fila, utf8_decode("Dirección del IEST"), 1, 0, "L", true);
        $this->fpdf->Cell($col[3]*3, $fila, utf8_decode($this->infoInstitucional['direccion local']), 1, 0, "C");
        $this->fpdf->Cell($col[3],$fila,utf8_decode("DRE-GRE"), 1, 0, "L", true);
        $this->fpdf->Cell($col[3],$fila,utf8_decode($this->infoInstitucional['DRE']), 1, 0, "C");
        $this->fpdf->Ln($fila);
        $this->fpdf->Cell($this->sumar_array($col, array(0,3,3)), $fila, utf8_decode("Resolución de Autorización"), 1, 0, "L", true);
        $this->fpdf->Cell($col[3]*4, $fila, utf8_decode($ep['res_autorizacion']."      ".$ep['fecha_autorizacion']), 1, 0, "C");
        $this->fpdf->Cell($col[1]*13, $fila, "", 0,0);//relleno
        $this->fpdf->Cell($col[5], $fila*2, utf8_decode("PERIODO ACADÉMICO: " . strtoupper($sem['nombre'])), "RL",0); 
        $this->fpdf->Ln($fila);
        $this->fpdf->Cell($this->sumar_array($col, array(0,3,3)), $fila, utf8_decode("Resolución de Revalidación"), 1, 0, "L", true);
        $this->fpdf->Cell($col[3]*4, $fila, utf8_decode($ep['res_revalidacion']."      ".$ep['fecha_revalidacion']), 1, 0, "C");
        $this->fpdf->Ln($fila);
        $this->fpdf->SetFont('Arial','B',8);
        $this->fpdf->Cell($col[0], $fila*4, utf8_decode("Nº"), 1, 0, "C");
        $this->fpdf->Cell($col[3], $fila*4, utf8_decode("Número de\nDocumento de\nIdentidad"), 1, 0, "C");
        $this->fpdf->SetFont('Arial','B',11);
        $this->fpdf->Cell($col[3]*5, $fila*4, utf8_decode("APELLIDOS Y NOMBRES\n(En orden Alfabético)"), 1, 0, "C");
        $this->fpdf->Cell($col[1]*13, $fila, "", 0,0);//relleno
        $this->fpdf->SetFont('Arial','',10);
        $this->fpdf->Cell($col[5], $fila, "SECCION: UNICA", "RL",0);
        $this->fpdf->Ln($fila);
        $this->fpdf->Cell($col[1]*13+$col[3]*6+$col[0], $fila, "", 0,0);//relleno
        $this->fpdf->Cell($col[5], $fila, "TURNO: DIURNO", "BRL",0);
        $this->fpdf->Ln($fila);
        $this->fpdf->Cell($col[3]*6+$col[0], $fila, "", 0,0);//relleno
        $this->fpdf->Cell($col[1]*11, $fila, utf8_decode("CRÉDITOS"), 1, 0, "C");
        $this->fpdf->Cell($col[1]*2, $fila, "", 0,0);//relleno
        $this->fpdf->Cell($col[5], $fila*2, "OBSERVACIONES", 1,0,"C");
        $this->fpdf->Ln($fila);
        $this->fpdf->Cell($col[3]*6+$col[0], $fila, "", 0,0);//relleno
        //UD`s creditos
        for ($i=0; $i < 11; $i++) { 
            $this->fpdf->SetFont('Arial','', 8);
            if(isset($udSemestre[$i]))
                $this->fpdf->Cell($col[1], $fila,utf8_decode($udSemestre[$i]['credito']), 1, 0,"D");
            else
                $this->fpdf->Cell($col[1], $fila, "", 1, 0, "D");
        }
        $this->fpdf->ln($fila);

        
    }

    function tablaConsolidadoNotas($udSemestre, $estMatriculados){
        $fila = 4.5;
        $col = array(5, 6, 20, 70, 100);
        $index = 1;
        for ($i=0; $i < 45; $i++) { 
            if(isset($estMatriculados[$i])){
                $this->fpdf->Cell($col[0], $fila, $index++, 1, 0, "C");
                $this->fpdf->Cell($col[2], $fila, $estMatriculados[$i]['dni'], 1, 0, "C");
                $this->fpdf->Cell($col[4], $fila, $estMatriculados[$i]['apEst']." ".$estMatriculados[$i]['amEst']." ".$estMatriculados[$i]['nombreEst'], 1, 0, "L");
                //for para nota de unidades
                for ($j=0; $j < 11; $j++) { 
                    $this->fpdf->Cell($col[1], $fila, "", 1, 0, "C");
                }
                $this->fpdf->Cell($col[1], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($col[1], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($col[3], $fila, "", 1, 0, "C");
                $this->fpdf->ln($fila);
                
                if ($i == 19) {
                    $this->fpdf->AddPage();
                }
            }
            else{
                $this->fpdf->Cell($col[0], $fila, $index++, 1, 0, "C");
                $this->fpdf->Cell($col[2], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($col[4], $fila, "", 1, 0, "C");
                //for para nota de unidades
                for ($j=0; $j < 11; $j++) { 
                    $this->fpdf->Cell($col[1], $fila, "", 1, 0, "C");
                }
                $this->fpdf->Cell($col[1], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($col[1], $fila, "", 1, 0, "C");
                $this->fpdf->Cell($col[3], $fila, "", 1, 0, "C");
                $this->fpdf->ln($fila);
                if ($i == 19) {
                    $this->fpdf->AddPage();
                }
            }
        }
    }

    function cabeceraTablaNotas($udSemestre){
        $fila = 6;
        $col = array(5, 6, 20, 70, 100);
        $index = 1;
        for ($i=0; $i < 46; $i++) { 
            if(isset($udSemestre[$i])){
                $this->fpdf->Cell($col[0], $fila, $index++, 1, 0, "C");
            }
        }
    }

    function sumar_array($array , $posiciones){
        $sumatoria = 0;
        for ($i=0; $i < sizeof($posiciones); $i++) { 
            $sumatoria += $array[$posiciones[$i]];
        }
        return $sumatoria;
    }

}
?>
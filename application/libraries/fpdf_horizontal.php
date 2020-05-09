<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class fpdf_horizontal{
	public function __construct(){
		require_once APPPATH.'third_party/fpdf/CELLpdf.php';
		$fpdf = NEW CellPDF('L', 'mm', 'A4');
		$fpdf->SetMargins(15,15,15,15);
        $fpdf->AddPage();
        $fpdf->SetAuthor("IESTP-ILAVE");
        $fpdf->setTitle("Documentos");
		$fpdf->AliasNbPages('(np)');
		$fpdf->SetAutoPageBreak(false);
		$CI =& get_instance();
		$CI->fpdf = $fpdf;
	}

}
?>
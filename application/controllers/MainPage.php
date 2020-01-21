<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainPage extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set("AMERICA/LIMA");
	}

	public function index()
	{
		$data['js'] = '3';
		$data['titulo'] = 'Prueba';
		$data['header1'] = 'HEADER 1';
		$data['header2'] = 'HEADER 2';
		$data['contenido'] = "welcome/index";
		$this->load->view('layouts/content',$data);
	}
}

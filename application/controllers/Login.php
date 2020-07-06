<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model("Usuario_model");
    } 

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data[]='';
		if ($this->session->userdata('login')) {
			redirect(base_url().'dashboard');
		}else{
			 $data['_view'] = 'template/main/login';
            // $this->load->view('login/login');
             $this->load->view('layouts/login',$data);
		}
		
		
		
	}
	public function login(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$temp=$this->Usuario_model->login($username,$password);
		$response = $this->Usuario_model->get_login(trim($username),trim($password));
		// var_dump($temp);
		// echo json_encode($response);
		
		if ($response['response'] === "success") {
			if ( $response['data']['tipo'] === "admin" ) {
				$data = array(
					'idusuario' => $response['data']['idusuario'], 
					'nombre' => $response['data']['nombrecompleto'], 
					'rol' => 1, 
					'login' => TRUE, 
				);
				$this->session->set_userdata($data);
				redirect(base_url()."admin/");
			}else if ( $response['data']['tipo'] === "cliente" ) {
				$data = array(
					'idusuario' => $response['data']['idusuario'], 
					'nombre' => $response['data']['nombrecompleto'], 
					'rol' => 1, 
					'login' => TRUE, 
				);
				$this->session->set_userdata($data);
				redirect(base_url()."dashboard");
			}
		}
		redirect(base_url().'login');
		/*
		if (!$temp) {
			redirect(base_url().'login');
		}else{
			
			$data = array(
				'id' => $temp->id_usuario, 
				'nombre' => 'admin', 
				'rol' => '1', 
				'login' => TRUE, 
			);
			$this->session->set_userdata($data);
			redirect(base_url().'admin');
		}
		*/
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'login');
	}
}


<?php
 
class Escuelaprofesional extends CI_Controller{

    public $disponibilidad = array("0"=>"deshabilitado","1"=>"habilitado");

    function __construct()
    {
        parent::__construct();
        $this->load->model('Escuelaprofesional_model');
    } 

    /*
     * Listing of escuelaprofesional
     */
    function index()
    {
        $data['escuelaprofesional'] = $this->Escuelaprofesional_model->get_all_escuelaprofesional();
        
        $data['_view'] = 'escuelaprofesional/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new escuelaprofesional
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombreEscuelaProfesional' => $this->input->post('nombreEscuelaProfesional'),
				'fechaCreacion' => $this->input->post('fechaCreacion'),
				'res_autorizacion' => $this->input->post('res_autorizacion'),
				'fecha_autorizacion' => $this->input->post('fecha_autorizacion'),
				'res_revalidacion' => $this->input->post('res_revalidacion'),
				'fecha_revalidacion' => $this->input->post('fecha_revalidacion'),
				'disponibilidad' => 1,
            );
            
            $escuelaprofesional_id = $this->Escuelaprofesional_model->add_escuelaprofesional($params);
            redirect('escuelaprofesional/index');
        }
        else
        {            
            $data['_view'] = 'escuelaprofesional/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a escuelaprofesional
     */
    function edit($idEscuelaProfesional)
    {   
        // check if the escuelaprofesional exists before trying to edit it
        $data['escuelaprofesional'] = $this->Escuelaprofesional_model->get_escuelaprofesional($idEscuelaProfesional);
        
        if(isset($data['escuelaprofesional']['idEscuelaProfesional']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nombreEscuelaProfesional' => $this->input->post('nombreEscuelaProfesional'),
					'fechaCreacion' => $this->input->post('fechaCreacion'),
					'res_autorizacion' => $this->input->post('res_autorizacion'),
					'fecha_autorizacion' => $this->input->post('fecha_autorizacion'),
					'res_revalidacion' => $this->input->post('res_revalidacion'),
					'fecha_revalidacion' => $this->input->post('fecha_revalidacion'),
					'disponibilidad' => $this->input->post('disponibilidad'),
                );

                $this->Escuelaprofesional_model->update_escuelaprofesional($idEscuelaProfesional,$params);            
                redirect('escuelaprofesional/index');
            }
            else
            {
                $data['_view'] = 'escuelaprofesional/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The escuelaprofesional you are trying to edit does not exist.');
    } 

    /*
     * Deleting escuelaprofesional
     */
    function remove($idEscuelaProfesional)
    {
        $escuelaprofesional = $this->Escuelaprofesional_model->get_escuelaprofesional($idEscuelaProfesional);

        // check if the escuelaprofesional exists before trying to delete it
        if(isset($escuelaprofesional['idEscuelaProfesional']))
        {
            $this->Escuelaprofesional_model->delete_escuelaprofesional($idEscuelaProfesional);
            redirect('escuelaprofesional/index');
        }
        else
            show_error('The escuelaprofesional you are trying to delete does not exist.');
    }
    
}

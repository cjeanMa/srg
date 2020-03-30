<?php

 
class Practica extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Practica_model');
    } 

    /*
     * Listing of practicas
     */
    function index()
    {
        $data['practicas'] = $this->Practica_model->get_all_complete_practicas();
        
        $data['_view'] = 'practica/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new practica
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'idModulo' => $this->input->post('idModulo'),
				'institucion' => $this->input->post('institucion'),
				'encargado' => $this->input->post('encargado'),
				'direccion' => $this->input->post('direccion'),
				'idEstudiante' => $this->input->post('idEstudiante'),
            );
            
            $practica_id = $this->Practica_model->add_practica($params);
            redirect('practica/index');
        }
        else
        {            
            $data['javascript'] = array('persona/addPersona.js','modulo/getModulo.js');
            $data['_view'] = 'practica/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a practica
     */
    function edit($idPracticas)
    {   
        // check if the practica exists before trying to edit it
        $data['practica'] = $this->Practica_model->get_all_practica($idPracticas);
        
        if(isset($data['practica']['idPracticas']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'idModulo' => $this->input->post('idModulo'),
					'institucion' => $this->input->post('institucion'),
					'encargado' => $this->input->post('encargado'),
					'direccion' => $this->input->post('direccion'),
					'idEstudiante' => $this->input->post('idEstudiante'),
                );

                $this->Practica_model->update_practica($idPracticas,$params);            
                redirect('practica/index');
            }
            else
            {
                $data['_view'] = 'practica/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The practica you are trying to edit does not exist.');
    } 

    /*
     * Deleting practica
     */
    function remove($idPracticas)
    {
        $practica = $this->Practica_model->get_practica($idPracticas);

        // check if the practica exists before trying to delete it
        if(isset($practica['idPracticas']))
        {
            $this->Practica_model->delete_practica($idPracticas);
            redirect('practica/index');
        }
        else
            show_error('The practica you are trying to delete does not exist.');
    }
    
}

<?php

 
class Mcapacidade extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcapacidade_model');
        $this->load->model('Modulo_model');
        $this->load->model('Escuelaprofesional_model');
    } 

    /*
     * Listing of mcapacidades
     */
    function index()
    {
        $data['mcapacidades'] = $this->Mcapacidade_model->get_all_mcapacidades();
        
        $data['_view'] = 'mcapacidade/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new mcapacidade
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombreMcapacidades' => $this->input->post('nombreMcapacidades'),
				'idModulo' => $this->input->post('idModulo'),
            );
            
            $mcapacidade_id = $this->Mcapacidade_model->add_mcapacidade($params);
            redirect('mcapacidade/index');
        }
        else
        {            
            $data['modulos'] = $this->Modulo_model->get_all_modulo();
            $data['_view'] = 'mcapacidade/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a mcapacidade
     */
    function edit($idMcapacidades)
    {   
        // check if the mcapacidade exists before trying to edit it
        $data['mcapacidade'] = $this->Mcapacidade_model->get_mcapacidade($idMcapacidades);
        
        if(isset($data['mcapacidade']['idMcapacidades']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nombreMcapacidades' => $this->input->post('nombreMcapacidades'),
					'idModulo' => $this->input->post('idModulo'),
                );

                $this->Mcapacidade_model->update_mcapacidade($idMcapacidades,$params);            
                redirect('mcapacidade/index');
            }
            else
            {
                $data['modulos'] = $this->Modulo_model->get_all_modulo();
                $data['_view'] = 'mcapacidade/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The mcapacidade you are trying to edit does not exist.');
    } 

    /*
     * Deleting mcapacidade
     */
    function remove($idMcapacidades)
    {
        $mcapacidade = $this->Mcapacidade_model->get_mcapacidade($idMcapacidades);

        // check if the mcapacidade exists before trying to delete it
        if(isset($mcapacidade['idMcapacidades']))
        {
            $this->Mcapacidade_model->delete_mcapacidade($idMcapacidades);
            redirect('mcapacidade/index');
        }
        else
            show_error('The mcapacidade you are trying to delete does not exist.');
    }


    /*
     * Lista de capacidades por modulo
     */
    function mCapacidadeByModulo($idModulo, $idEscuelaProfesional)
    {
        $data['modulo']=$this->Modulo_model->get_modulo($idModulo);
        $data['escuelaProfesional'] = $this->Escuelaprofesional_model->get_escuelaprofesional($idEscuelaProfesional);
        $data['mcapacidades'] = $this->Mcapacidade_model->get_mcapacidades_by_modulo($idModulo);
        
        $data['_view'] = 'mcapacidade/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new mcapacidade
     */
    function addByModulo($idmodulo,$idEscuelaProfesional)
    {   

        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombreMcapacidades' => $this->input->post('nombreMcapacidades'),
				'idModulo' => $this->input->post('idModulo'),
            );
            
            $mcapacidade_id = $this->Mcapacidade_model->add_mcapacidade($params);
            redirect('mcapacidade/mCapacidadeByModulo/'.$idmodulo."/".$idEscuelaProfesional);
        }
        else
        {            
            $data['escuelaProfesional'] = array('idEscuelaProfesional' => $idEscuelaProfesional);
            $data['modulo']=$this->Modulo_model->get_modulo($idmodulo);
            $data['_view'] = 'mcapacidade/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editar mCapaciaddes dsde la vista filtrada por modulos
     */
    function editByModulo($idMcapacidades, $idModulo, $idEscuelaProfesional)
    {   
        // check if the mcapacidade exists before trying to edit it
        $data['mcapacidade'] = $this->Mcapacidade_model->get_mcapacidade($idMcapacidades);
        
        if(isset($data['mcapacidade']['idMcapacidades']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nombreMcapacidades' => $this->input->post('nombreMcapacidades'),
					'idModulo' => $this->input->post('idModulo'),
                );

                $this->Mcapacidade_model->update_mcapacidade($idMcapacidades,$params);            
                redirect('mcapacidade/mCapacidadeByModulo/'.$idModulo."/".$idEscuelaProfesional);
            }
            else
            {
                $data['escuelaProfesional'] = array('idEscuelaProfesional' => $idEscuelaProfesional);
                $data['modulo'] = $this->Modulo_model->get_modulo($idModulo);
                $data['_view'] = 'mcapacidade/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The mcapacidade you are trying to edit does not exist.');
    } 
    
}

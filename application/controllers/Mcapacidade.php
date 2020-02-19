<?php

 
class Mcapacidade extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcapacidade_model');
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
    
}

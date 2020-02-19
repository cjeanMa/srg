<?php

 
class Unidaddidactica extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Unidaddidactica_model');
    } 

    /*
     * Listing of unidaddidactica
     */
    function index()
    {
        $data['unidaddidactica'] = $this->Unidaddidactica_model->get_all_unidaddidactica();
        
        $data['_view'] = 'unidaddidactica/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new unidaddidactica
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombreUnidadDidactica' => $this->input->post('nombreUnidadDidactica'),
				'creditos' => $this->input->post('creditos'),
				'horasunidad' => $this->input->post('horasunidad'),
				'idSemestre' => $this->input->post('idSemestre'),
				'idModulo' => $this->input->post('idModulo'),
            );
            
            $unidaddidactica_id = $this->Unidaddidactica_model->add_unidaddidactica($params);
            redirect('unidaddidactica/index');
        }
        else
        {            
            $data['_view'] = 'unidaddidactica/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a unidaddidactica
     */
    function edit($idUnidadDidactica)
    {   
        // check if the unidaddidactica exists before trying to edit it
        $data['unidaddidactica'] = $this->Unidaddidactica_model->get_unidaddidactica($idUnidadDidactica);
        
        if(isset($data['unidaddidactica']['idUnidadDidactica']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nombreUnidadDidactica' => $this->input->post('nombreUnidadDidactica'),
					'creditos' => $this->input->post('creditos'),
					'horasunidad' => $this->input->post('horasunidad'),
					'idSemestre' => $this->input->post('idSemestre'),
					'idModulo' => $this->input->post('idModulo'),
                );

                $this->Unidaddidactica_model->update_unidaddidactica($idUnidadDidactica,$params);            
                redirect('unidaddidactica/index');
            }
            else
            {
                $data['_view'] = 'unidaddidactica/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The unidaddidactica you are trying to edit does not exist.');
    } 

    /*
     * Deleting unidaddidactica
     */
    function remove($idUnidadDidactica)
    {
        $unidaddidactica = $this->Unidaddidactica_model->get_unidaddidactica($idUnidadDidactica);

        // check if the unidaddidactica exists before trying to delete it
        if(isset($unidaddidactica['idUnidadDidactica']))
        {
            $this->Unidaddidactica_model->delete_unidaddidactica($idUnidadDidactica);
            redirect('unidaddidactica/index');
        }
        else
            show_error('The unidaddidactica you are trying to delete does not exist.');
    }
    
}

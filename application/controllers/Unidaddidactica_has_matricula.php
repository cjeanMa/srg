<?php

 
class Unidaddidactica_has_matricula extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Unidaddidactica_has_matricula_model');
    } 

    /*
     * Listing of unidaddidactica_has_matricula
     */
    function index()
    {
        $data['unidaddidactica_has_matricula'] = $this->Unidaddidactica_has_matricula_model->get_all_unidaddidactica_has_matricula();
        
        $data['_view'] = 'unidaddidactica_has_matricula/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new unidaddidactica_has_matricula
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'unidadDidactica_idUnidadDidactica' => $this->input->post('unidadDidactica_idUnidadDidactica'),
				'matricula_idMatricula' => $this->input->post('matricula_idMatricula'),
				'observacion' => $this->input->post('observacion'),
            );
            
            $unidaddidactica_has_matricula_id = $this->Unidaddidactica_has_matricula_model->add_unidaddidactica_has_matricula($params);
            redirect('unidaddidactica_has_matricula/index');
        }
        else
        {            
            $data['_view'] = 'unidaddidactica_has_matricula/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a unidaddidactica_has_matricula
     */
    function edit($unidadDidactica_idunidadDidactica)
    {   
        // check if the unidaddidactica_has_matricula exists before trying to edit it
        $data['unidaddidactica_has_matricula'] = $this->Unidaddidactica_has_matricula_model->get_unidaddidactica_has_matricula($unidadDidactica_idunidadDidactica);
        
        if(isset($data['unidaddidactica_has_matricula']['unidadDidactica_idunidadDidactica']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nota' => $this->input->post('nota'),
					'notaLetras' => $this->input->post('notaLetras'),
					'observacion' => $this->input->post('observacion'),
                );

                $this->Unidaddidactica_has_matricula_model->update_unidaddidactica_has_matricula($unidadDidactica_idunidadDidactica,$params);            
                redirect('unidaddidactica_has_matricula/index');
            }
            else
            {
                $data['_view'] = 'unidaddidactica_has_matricula/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The unidaddidactica_has_matricula you are trying to edit does not exist.');
    } 

    /*
     * Deleting unidaddidactica_has_matricula
     */
    function remove($unidadDidactica_idunidadDidactica)
    {
        $unidaddidactica_has_matricula = $this->Unidaddidactica_has_matricula_model->get_unidaddidactica_has_matricula($unidadDidactica_idunidadDidactica);

        // check if the unidaddidactica_has_matricula exists before trying to delete it
        if(isset($unidaddidactica_has_matricula['unidadDidactica_idunidadDidactica']))
        {
            $this->Unidaddidactica_has_matricula_model->delete_unidaddidactica_has_matricula($unidadDidactica_idunidadDidactica);
            redirect('unidaddidactica_has_matricula/index');
        }
        else
            show_error('The unidaddidactica_has_matricula you are trying to delete does not exist.');
    }
    
}

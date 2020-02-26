<?php

 
class Unidaddidactica extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Unidaddidactica_model');
        $this->load->model('Modulo_model');
        $this->load->model('Semestre_model');
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
        $data['semestre'] = $this->Semestre_model->get_all_semestre();
        $data['modulos'] = $this->Modulo_model->get_all_modulo();
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
        $data['unidaddidactica'] = $this->Unidaddidactica_model->get_unidaddidactica_modulo($idUnidadDidactica);
        $data['semestre'] = $this->Semestre_model->get_all_semestre();
        
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

    /*
     * Lista de unidades didacticas filtradas por modulo
     */
    function unidades_by_modulo($idModulo,$idEscuelaProfesional)
    {
        $data['escuelaProfesional'] = array('idEscuelaProfesional'=>$idEscuelaProfesional);
        $data['modulo']=$this->Modulo_model->get_modulo($idModulo);
        $data['unidaddidactica'] = $this->Unidaddidactica_model->get_unidadesdidacticas_by_modulo($idModulo);
        
        $data['_view'] = 'unidaddidactica/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Add desde la lista de modulo filtrados por carrera - para que directamente inserte en un modulo seleccionado
     */
    function add_unidad_by_modulo($idModulo, $idEscuelaProfesional){

        $data['semestre'] = $this->Semestre_model->get_all_semestre();
        $data['modulo'] = $this->Modulo_model->get_modulo($idModulo); 
        $data['escuelaProfesional'] = array("idEscuelaProfesional"=>$idEscuelaProfesional);
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombreUnidadDidactica' => $this->input->post('nombreUnidadDidactica'),
				'creditos' => $this->input->post('creditos'),
				'horasunidad' => $this->input->post('horasunidad'),
				'idSemestre' => $this->input->post('idSemestre'),
				'idModulo' => $idModulo,
            );
            
            $unidaddidactica_id = $this->Unidaddidactica_model->add_unidaddidactica($params);
            redirect('unidaddidactica/unidades_by_modulo/'.$idModulo."/".$idEscuelaProfesional);
        }
        else
        {            
            $data['_view'] = 'unidaddidactica/add';
            $this->load->view('layouts/main',$data);
        }
    }

    
}

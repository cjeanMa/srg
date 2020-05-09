<?php

 
class Matricula extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Matricula_model');
        $this->load->model('Estudiante_model');
        $this->load->model('Persona_model');
        $this->load->model('Modulo_model');
        $this->load->model('Unidaddidactica_model');
        $this->load->model('Semestre_model');
        $this->load->model('Tipomatricula_model');
        $this->load->model('Plazomatricula_model');
         $this->load->model('Unidaddidactica_has_matricula_model');
        
        
    } 

    /*
     * Listing of matricula
     */
    function index()
    {
        $data['matricula'] = $this->Matricula_model->get_all_matricula();
        
        $data['_view'] = 'matricula/index';
        $this->load->view('layouts/matricula',$data);
    }

    /*
     * Adding a new matricula
     */
    function add()
    {   
        // echo "string";
        $id_estudiante=$_COOKIE["idEstudiante"];
        $data['modulos']='';
        $array_modulos=array();
        $array_unidades=array();
        $array_semestre=array();
        $all_unidades=array();
        $semestre=$this->Semestre_model->get_all_semestre();
        // var_dump($semestre);
        $tipo_matricula=$this->Tipomatricula_model->get_all_tipomatricula();
        // $idPersona = $this->input->post('idPersona');
        // echo  $idPersona ;
        // $estudiante=$this->Estudiante_model->get_estudiante_idPersona($idPersona);
        $estudiante=$this->Estudiante_model->get_estudiante($id_estudiante);

        // var_dump($estudiante);
        // echo json_encode($escuela);
        // echo $escuela['idEscuelaProfesional'];
        // $modulos=$this->Modulo_model->get_all_modulo_by_ep($estudiante['idEscuelaProfesional']);
        $unidades=$this->Unidaddidactica_model->get_unidadesdidacticas_by_modulos_by_semestres_by_escuela($estudiante['idEscuelaProfesional']);
        $unidades_aprobadas=$this->Unidaddidactica_has_matricula_model->get_all_unidaddidactica_has_idestudiante($id_estudiante);
        // $unidades_merge=array_merge($unidades,$unidades_aprobadas);
        // var_dump($unidades_merge);
        // $unidades_faltantes=array_diff($unidades,$unidades_aprobadas);
         // $unidades_faltantes=array_unique($unidades_merge);
        $unidades_faltantes = array_diff(array_map('json_encode', $unidades), array_map('json_encode', $unidades_aprobadas));
        $unidades_faltantes = array_map('json_decode', $unidades_faltantes);


        // $unidades_faltantes=get_object_vars($unidades_faltantes);
        // var_dump($unidades_faltantes);
        // var_dump($unidades[0]);
        // var_dump($unidades_aprobadas);
        $unidades_faltantes2=json_decode(json_encode($unidades_faltantes),true);

        foreach ($unidades_faltantes2 as $key => $value) {
            $all_unidades[$value['idUnidadDidactica']] = array(
                'creditos'=>$value['creditos'],
                'idUnidadDidactica'=>$value['idUnidadDidactica'],
                'nombreUnidadDidactica'=>$value['nombreUnidadDidactica'],
            );
        }
        

        foreach ($unidades_faltantes2 as $key => $value) {
            $array_unidades[$value['romanos']][]= array(
                'idUnidadDidactica'=> $value['idUnidadDidactica'],
                'nombreUnidadDidactica'=> $value['nombreUnidadDidactica'],
                'creditos'=> $value['creditos'],
                'horasunidad'=> $value['horasunidad'],
                'idSemestre'=> $value['idSemestre'],
                'idModulo'=> $value['idModulo'],
                'romanos'=> $value['romanos'],
                'nombre'=> $value['nombre'],
                'nombreModulo'=> $value['nombreModulo'],
                );
        }
        foreach ($semestre as $key => $value) {
            $array_semestre[] = array(
                'idSemestre'=>$value['idSemestre'],
                'romanos'=>$value['romanos'],
                'nombre'=>$value['nombre'],
                'prenombre'=>(int)$value['prenombre'],
                'unidadDidacticas'=>(@$array_unidades[$value['romanos']]?@$array_unidades[$value['romanos']]:[]),
            );
        }

        $plazo_matricula=$this->Plazomatricula_model->get_plazo_matricula();
        // var_dump($plazo_matricula);
        $cursos='';
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
				'fechaMatricula' => date('Y/m/d H:i:s'),
				'observacion' => $this->input->post('observacion'),
				'idEstudiante' => $this->input->post('idEstudiante'),
				'tipoMatricula_idTipoMatricula' => $this->input->post('idTipo_Matricula'),
            );
            
            $matricula_id = $this->Matricula_model->add_matricula($params);
            // var_dump($this->input->post('cursos'));
            $curso=$this->input->post('cursos');
            $count = count($curso);
            if ($matricula_id) {
                for ($i = 0; $i < $count; $i++) {
                    $params_curso = array(
                        'unidadDidactica_idUnidadDidactica' => $curso[$i],
                        'matricula_idMatricula' => $matricula_id,
                        'observacion' => '',
                    );
                    $unidaddidactica_has_matricula_id = $this->Unidaddidactica_has_matricula_model->add_unidaddidactica_has_matricula($params_curso);
                    // echo $unidaddidactica_has_matricula_id.' - '.$curso[$i];
                }
            }
           
          
                
                
                
            
            // redirect('matricula/index');
        }
        else
        {
            $data['plazo_matricula']=$plazo_matricula;
            // $data['idpersona']=$_COOKIE["idPersona"];
            $data['tipo_matricula']=$tipo_matricula;
            $data['modulos'] =  $array_modulos;    
            $data['estudiante']=$estudiante;
            $data['semestre'] =  $array_semestre;  
            $data['all_unidades'] = $all_unidades;
            // var_dump($array_semestre);
        
            // var_dump( $array_modulos);

            $data['_view'] = 'matricula/add';
            $this->load->view('layouts/matricula',$data);
        }
    }  

    /*
     * Editing a matricula
     */
    function edit($idMatricula)
    {   
        // check if the matricula exists before trying to edit it
        $data['matricula'] = $this->Matricula_model->get_matricula($idMatricula);
        
        if(isset($data['matricula']['idMatricula']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
					'nota' => $this->input->post('nota'),
					'notaLetra' => $this->input->post('notaLetra'),
					'fechaMatricula' => $this->input->post('fechaMatricula'),
					'observacion' => $this->input->post('observacion'),
					'idEstudiante' => $this->input->post('idEstudiante'),
					'idEstado' => $this->input->post('idEstado'),
					'idEstadoModular' => $this->input->post('idEstadoModular'),
					'tipo_Matricula_idTipo_Matricula' => $this->input->post('tipo_Matricula_idTipo_Matricula'),
                );

                $this->Matricula_model->update_matricula($idMatricula,$params);            
                redirect('matricula/index');
            }
            else
            {
                $data['_view'] = 'matricula/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The matricula you are trying to edit does not exist.');
    } 

    /*
     * Deleting matricula
     */
    function remove($idMatricula)
    {
        $matricula = $this->Matricula_model->get_matricula($idMatricula);

        // check if the matricula exists before trying to delete it
        if(isset($matricula['idMatricula']))
        {
            $this->Matricula_model->delete_matricula($idMatricula);
            redirect('matricula/index');
        }
        else
            show_error('The matricula you are trying to delete does not exist.');
    }
    function searchEstudiante()
    {
            $idPersona = $this->input->post('id');

         // echo json_encode($this->Estudiante_model->get_estudiante_persona($idPersona));
        $temp_persona=$this->Persona_model->get_persona($idPersona);
        $temp_estudiante['estudiante']=$this->Estudiante_model->get_estudiante_idPersona($idPersona);
        // var_dump($temp_estudiante);
         $persona = json_encode($temp_persona);
         $estudiante = json_encode($temp_estudiante);
         // echo $persona;
         // echo $estudiante;
         // echo ($estudiante=null);
         if ($temp_estudiante==null) {
            echo $persona;
            // echo "no estudiante";
         }else{
             echo json_encode(array_merge(json_decode($persona, true), json_decode($estudiante, true)));
            // echo "estudiante";
             

        }
         
        
        // echo "nada";
        // var_dump($estudiante);
    }
    
}

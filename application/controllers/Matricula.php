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
        $this->load->model('Semestreacademico_model');
        
        
    } 

    /*
     * Listing of matricula
     */
    function index()
    {
        $idEstudiante=$_COOKIE["idEstudiante"];
        $idPersona=$_COOKIE["idPersona"];

        $semestre_academico=$this->plazo_matricula();
        // $data['state_fecha']=plazo_matricula($semestre_academico);
        // $data['matricula'] = $this->Matricula_model->get_all_matricula();
        $data['semestre_academico']=$semestre_academico;

        $get_matricula_semestreacademico=$this->Matricula_model->get_matricula_has_idestudiante_has_semestre_academico($idEstudiante,$semestre_academico['idSemestreAcademico']);

        // var_dump($get_matricula_semestreacademico);
        // if ($get_matricula_semestreacademico==NULL) {
        //     echo "no tiene matricula";
        // }else{
        //     echo "tiene matricula";
        // }
        $data['unidaddidactica_has_matricula']=$get_matricula_semestreacademico;
        $data['_view'] = 'matricula/index';
        $this->load->view('layouts/matricula',$data);
    }

    /*
     * Adding a new matricula
     */
    function add()
    {
        $data['modulos']='';
        // $array_modulos=array();
        $array_unidades=array();
        $array_semestre=array();
        // $all_unidades=array();   
        $unidaddidactica_has_matricula_id=array();
        $array_estudiante_curso_escuela_x_semestre=array();
        $id_estudiante=$_COOKIE["idEstudiante"];
        $semestre_academico=$this->plazo_matricula();
        $estudiante=$this->Estudiante_model->get_estudiante_persona($id_estudiante);
        $tipo_matricula=$this->Tipomatricula_model->get_all_tipomatricula();
        // $plazo_matricula=$this->Plazomatricula_model->get_plazo_matricula();
        $get_matricula_semestreacademico=$this->Matricula_model->get_matricula_has_idestudiante_has_semestre_academico($id_estudiante,$semestre_academico['idSemestreAcademico']);
        // var_dump($get_matricula_semestreacademico);
        if ($semestre_academico['state_plazo_matricula']==false) {
            redirect('matricula/');
        }else{
            if ($get_matricula_semestreacademico==NULL) {
                $array_estudiante_curso_escuela_x_semestre=$this->make_table_cursos($estudiante);
                 // var_dump($array_estudiante_curso_escuela_x_semestre);
            
            }else{
                // $array_estudiante_curso_escuela_x_semestre=$this->Unidaddidactica_model->get_unidadesdidacticas_has_idmatricula($get_matricula_semestreacademico['idMatricula']);
                // var_dump($array_estudiante_curso_escuela_x_semestre);
            }
        }
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
				'fechaMatricula' => date('Y/m/d H:i:s'),
				'observacion' => $this->input->post('observacion'),
				'idEstudiante' => $this->input->post('idEstudiante'),
				'idTipoMatricula' => $this->input->post('idTipo_Matricula'),
            );
            
            $matricula_id = $this->Matricula_model->add_matricula($params);
            // var_dump($this->input->post('cursos'));
            $curso=$this->input->post('cursos');
            $count = count($curso);
            if ($matricula_id) {
                for ($i = 0; $i < $count; $i++) {
                    $params_curso = array(
                        'idUnidadDidactica' => $curso[$i],
                        'idMatricula' => $matricula_id,
                        'observacion' => '',
                    );
                    $unidaddidactica_has_matricula_id[] = $this->Unidaddidactica_has_matricula_model->add_unidaddidactica_has_matricula($params_curso);
                    // echo $unidaddidactica_has_matricula_id.' - '.$curso[$i];
                }
            }
            if (empty($unidaddidactica_has_matricula_id)) {
                $this->Unidaddidactica_has_matricula_model->delete_matricula($matricula_id);
                // echo "borrar matricula";
            }
            // var_dump(count($unidaddidactica_has_matricula_id));
            
           
          
                
                
                
            
            // redirect('matricula/index');
        }
        else
        {
            $data['semestre_academico']=$semestre_academico;
            // $data['idpersona']=$_COOKIE["idPersona"];
            $data['tipo_matricula']=$tipo_matricula;
            // $data['modulos'] =  $array_modulos;    
            $data['estudiante']=$estudiante;
            // var_dump($estudiante);
            $data['data'] =  $array_estudiante_curso_escuela_x_semestre;  
            // $data['all_unidades'] = $all_unidades;
            // var_dump($all_unidades);
        
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
    public function  plazo_matricula(){

         $semestre_academico=$this->Semestreacademico_model->get_lastsemestreacademico();         
        $semestre_academico['state_plazo_matricula']=(date("Y-m-d")>=$semestre_academico['fechaInicio']&&date("Y-m-d")<=$semestre_academico['fechaLimite']);

        // array_push($semestre_academico, array('state_plazo_matricula'=>$state_plazo_matricula));
        // var_dump($semestre_academico);
         return $semestre_academico;
       // return 
    }
    function make_table_cursos($estudiante){
        $data=array();
        $cursos_escuela=array();
            $semestre=$this->Semestre_model->get_all_semestre();
                
                

                $unidades=$this->Unidaddidactica_model->get_unidadesdidacticas_by_modulos_by_semestres_by_escuela($estudiante['idEscuelaProfesional']);
                $unidades_aprobadas=$this->Unidaddidactica_has_matricula_model->get_all_unidaddidactica_has_idestudiante($estudiante['idEstudiante']);
            // merge arrays
                $unidades_faltantes = array_diff(array_map('json_encode', $unidades), array_map('json_encode', $unidades_aprobadas));
                $unidades_faltantes = array_map('json_decode', $unidades_faltantes);

                $unidades_faltantes2=json_decode(json_encode($unidades_faltantes),true);

                foreach ($unidades_faltantes2 as $key => $value) {
                    $cursos_escuela[$value['idUnidadDidactica']] = array(
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
                // var_dump($semestre);
                foreach ($semestre as $key => $value) {
                    $array_semestre[] = array(
                        'idSemestre'=>$value['idSemestre'],
                        'romanos'=>$value['romanos'],
                        'nombre'=>$value['nombre'],
                        'prenombre'=>(int)$value['prenombre'],
                        'unidadDidacticas'=>(@$array_unidades[$value['romanos']]?@$array_unidades[$value['romanos']]:[]),
                    );
                }
                $data['cursos_escuela']=$cursos_escuela;
                $data['cursos_x_semestre']=$array_semestre;

                return $data;


    }
}

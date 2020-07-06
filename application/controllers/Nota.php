
<?php

 
class Nota extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nota_model');
        $this->load->model('Unidaddidactica_has_matricula_model');
        $this->load->model('Matricula_model');
    } 

    /*
     * Listing of permisos
     */
    function index()
    {
        $data=array();
        $unidadDidactica=array();
        $id_persona = @$_COOKIE['idPersona'];
        $id_docente = @$_COOKIE['idDocente'];

        $temp_unidadDidactica=$this->Nota_model->get_list_unidadD_docente(1);

        foreach ($temp_unidadDidactica as $key => $value) {
            // $unidadDidactica[$value['idEscuelaProfesional']][]
            $unidadDidactica[$value['nombreEscuelaProfesional']][]=array(
                'idEscuelaProfesional'=>$value['idEscuelaProfesional'], 
                'nombreEscuelaProfesional'=>$value['nombreEscuelaProfesional'],
                'idUnidadDidactica'=>$value['idUnidadDidactica'],
                'nombreUnidadDidactica'=>$value['nombreUnidadDidactica'],
            );
            
        }
        $data['unidadDidactica']=$unidadDidactica;
        // var_dump($unidadDidactica);
        $data['_view'] = 'nota/index';
        $this->load->view('layouts/sia',$data);
    }
    function registro($idUnidadDodactica){
        $data=array();
        $estudiantes=array();
        $id_persona = @$_COOKIE['idPersona'];
        $id_docente = @$_COOKIE['idDocente'];

        $estudiantes=$this->Nota_model->get_list_estudiantes_ep(1,$idUnidadDodactica);
        
        if(isset($_POST) && count($_POST) > 0) {
// $params = array(
//                 'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
//                 'fechaMatricula' => date('Y/m/d H:i:s'),
//                 'observacion' => $this->input->post('observacion'),
//                 'idEstudiante' => $this->input->post('idEstudiante'),
//                 'idTipoMatricula' => $this->input->post('idTipo_Matricula'),
//             );
            
//             $matricula_id = $this->Matricula_model->add_matricula($params);
//             $curso=$this->input->post('cursos');

            $nota=array_filter($this->input->post('nota'), "strlen") ;
            $count_nota=count($nota);
            $count_estudiantes=count($estudiantes);
            if ($count_nota==$count_estudiantes) {
               foreach ($nota as $key => $value) {
                    $status_nota=0;
                    if ($value>10) {
                        $status_nota=2;
                    }else{
                        $status_nota=3;
                    }
                    $params = array(
                        'nota' => $value,
                        'idEstadoUnidadDidactica' => $status_nota,
                    );
                    $params_where = array(
                        'idUnidadDidactica' => $idUnidadDodactica,
                        'idMatricula' => $key,
                    );
                    $this->Nota_model->add_nota_unidaddidactica_has_matricula($params_where,$params);
                    
                }
            }else{
                show_error('Error, cantidad de estudiantes y notas');    
            }                        
            // redirect('nota/'.$idUnidadDodactica);
            



            // array_filter($values, "strlen")

        }else{
        // var_dump($estudiantes);
        $data['estudiantes']=$estudiantes;
        $data['_view'] = 'nota/add';
        $data['idUnidadDodactica']=$idUnidadDodactica;
        $this->load->view('layouts/sia',$data);
        }
    }

    // /*
    //  * Adding a new permiso
    //  */
    // function add()
    // {   
    //     if(isset($_POST) && count($_POST) > 0)     
    //     {   
    //         $params = array(
				// 'nombrePermiso' => $this->input->post('nombrePermiso'),
				// 'descripcion' => $this->input->post('descripcion'),
    //         );
            
    //         $permiso_id = $this->Permiso_model->add_permiso($params);
    //         redirect('permiso/index');
    //     }
    //     else
    //     {            
    //         $data['_view'] = 'permiso/add';
    //         $this->load->view('layouts/main',$data);
    //     }
    // }  

    // /*
    //  * Editing a permiso
    //  */
    // function edit($idPermiso)
    // {   
    //     // check if the permiso exists before trying to edit it
    //     $data['permiso'] = $this->Permiso_model->get_permiso($idPermiso);
        
    //     if(isset($data['permiso']['idPermiso']))
    //     {
    //         if(isset($_POST) && count($_POST) > 0)     
    //         {   
    //             $params = array(
				// 	'nombrePermiso' => $this->input->post('nombrePermiso'),
				// 	'descripcion' => $this->input->post('descripcion'),
    //             );

    //             $this->Permiso_model->update_permiso($idPermiso,$params);            
    //             redirect('permiso/index');
    //         }
    //         else
    //         {
    //             $data['_view'] = 'permiso/edit';
    //             $this->load->view('layouts/main',$data);
    //         }
    //     }
    //     else
    //         show_error('The permiso you are trying to edit does not exist.');
    // } 

    // /*
    //  * Deleting permiso
    //  */
    // function remove($idPermiso)
    // {
    //     $permiso = $this->Permiso_model->get_permiso($idPermiso);

    //     // check if the permiso exists before trying to delete it
    //     if(isset($permiso['idPermiso']))
    //     {
    //         $this->Permiso_model->delete_permiso($idPermiso);
    //         redirect('permiso/index');
    //     }
    //     else
    //         show_error('The permiso you are trying to delete does not exist.');
    // }
    
}

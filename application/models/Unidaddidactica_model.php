<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Unidaddidactica_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get unidaddidactica by idUnidadDidactica
     */
    function get_unidaddidactica($idUnidadDidactica)
    {
        return $this->db->get_where('unidaddidactica',array('idUnidadDidactica'=>$idUnidadDidactica))->row_array();
    }
        
    /*
     * Get all unidaddidactica
     */
    function get_all_unidaddidactica()
    {
        $this->db->order_by('idUnidadDidactica', 'desc');
        return $this->db->get('unidaddidactica')->result_array();
    }
        
    /*
     * Get unidaddidactica con el nombre del modulo para el formulario de editar
     */
    function get_unidaddidactica_modulo($idUnidadDidactica)
    {
        $this->db->from('unidaddidactica ud');
        $this->db->join('modulo m','ud.idModulo = m.idModulo','left');
        $this->db->where('ud.idUnidadDidactica',$idUnidadDidactica);
        return $this->db->get()->row_array();
    }

    /*
     * function to add new unidaddidactica
     */
    function add_unidaddidactica($params)
    {
        $this->db->insert('unidaddidactica',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update unidaddidactica
     */
    function update_unidaddidactica($idUnidadDidactica,$params)
    {
        $this->db->where('idUnidadDidactica',$idUnidadDidactica);
        return $this->db->update('unidaddidactica',$params);
    }
    
    /*
     * function to delete unidaddidactica
     */
    function delete_unidaddidactica($idUnidadDidactica)
    {
        return $this->db->delete('unidaddidactica',array('idUnidadDidactica'=>$idUnidadDidactica));
    }

     /*
     * Unidades didacticas x Modulo
     */
    function get_unidadesdidacticas_by_modulo($idModulo)
    {
        $condicional = array('idModulo'=>$idModulo);
        $this->db->order_by('idUnidadDidactica', 'desc');
        return $this->db->get_where('unidaddidactica',$condicional)->result_array();
    }
    function get_unidadesdidacticas_by_modulos_by_semestres_by_escuela($idEscuelaProfesional){
        $query = $this->db->query("SELECT ud.idUnidadDidactica,ud.nombreUnidadDidactica,ud.creditos,ud.horasunidad,ud.idSemestre,ud.idModulo, s.romanos, s.nombre, m.nombreModulo, e.idEstudiante, e.idPersona, e.idEscuelaProfesional 
            FROM unidaddidactica as ud 
            LEFT JOIN semestre as s 
            ON ud.idSemestre=s.idSemestre 
            left JOIN modulo as m 
            on m.idModulo=ud.idModulo 
            left join unidaddidactica_has_matricula as udm 
            on udm.idUnidadDidactica=ud.idUnidadDidactica
            left JOIN matricula as ma
            on ma.idMatricula = udm.idMatricula
            left join estudiante as e 
            on e.idEstudiante=ma.idEstudiante
            WHERE m.idEscuelaProfesional=".$idEscuelaProfesional.";");
        return $query->result_array();

    }
}

<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Plazomatricula_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get plazomatricula by idPlazoMatricula
     */
    function get_plazomatricula($idPlazoMatricula)
    {
        $this->db->from('plazomatricula pm');
        $this->db->join('semestreacademico sa', 'pm.idSemestreAcademico = sa.idSemestreAcademico', 'left');
        $this->db->where('pm.idPlazoMatricula',$idPlazoMatricula);
        return $this->db->get()->row_array();
    }
        
    /*
     * Get all plazomatricula
     */
    function get_all_plazomatricula()
    {
        $this->db->from('plazomatricula pm');
        $this->db->join('semestreacademico sa', 'pm.idSemestreAcademico = sa.idSemestreAcademico', 'left');
        $this->db->order_by('pm.idSemestreAcademico', 'desc');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new plazomatricula
     */
    function add_plazomatricula($params)
    {
        $this->db->insert('plazomatricula',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update plazomatricula
     */
    function update_plazomatricula($idPlazoMatricula,$params)
    {
        $this->db->where('idPlazoMatricula',$idPlazoMatricula);
        return $this->db->update('plazomatricula',$params);
    }
    
    /*
     * function to delete plazomatricula
     */
    function delete_plazomatricula($idPlazoMatricula)
    {
        return $this->db->delete('plazomatricula',array('idPlazoMatricula'=>$idPlazoMatricula));
    }
}

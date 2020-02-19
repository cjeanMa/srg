<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Matricula_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get matricula by idMatricula
     */
    function get_matricula($idMatricula)
    {
        return $this->db->get_where('matricula',array('idMatricula'=>$idMatricula))->row_array();
    }
        
    /*
     * Get all matricula
     */
    function get_all_matricula()
    {
        $this->db->order_by('idMatricula', 'desc');
        return $this->db->get('matricula')->result_array();
    }
        
    /*
     * function to add new matricula
     */
    function add_matricula($params)
    {
        $this->db->insert('matricula',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update matricula
     */
    function update_matricula($idMatricula,$params)
    {
        $this->db->where('idMatricula',$idMatricula);
        return $this->db->update('matricula',$params);
    }
    
    /*
     * function to delete matricula
     */
    function delete_matricula($idMatricula)
    {
        return $this->db->delete('matricula',array('idMatricula'=>$idMatricula));
    }
}

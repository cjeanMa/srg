<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Persona_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get persona by idPersona
     */
    function get_persona($idPersona)
    {
        return $this->db->get_where('persona',array('idPersona'=>$idPersona))->row_array();
    }
        
    /*
     * Get all persona
     */
    function get_all_persona()
    {
        $this->db->order_by('idPersona', 'desc');
        return $this->db->get('persona')->result_array();
    }
        
    /*
     * function to add new persona
     */
    function add_persona($params)
    {
        $this->db->insert('persona',$params);
        return $this->db->insert_id();
        // return $temp;
    }
    
    /*
     * function to update persona
     */
    function update_persona($idPersona,$params)
    {
        $this->db->where('idPersona',$idPersona);
        return $this->db->update('persona',$params);
    }
    
    /*
     * function to delete persona
     */
    function delete_persona($idPersona)
    {
        return $this->db->delete('persona',array('idPersona'=>$idPersona));
    }
}

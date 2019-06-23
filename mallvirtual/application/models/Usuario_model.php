<?php
 
class Usuario_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get usuario by id
     */
    function get_usuario($id)
    {
        return $this->db->get_where('usuarios',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all usuarios
     */
    function get_all_usuarios()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('usuarios')->result_array();
    }
        
    /*
     * function to add new usuario
     */
    function add_usuario($params)
    {
        $this->db->insert('usuarios',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update usuario
     */
    function update_usuario($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('usuarios',$params);
    }
    
    /*
     * function to delete usuario
     */
    function delete_usuario($id)
    {
        return $this->db->delete('usuarios',array('id'=>$id));
    }
}

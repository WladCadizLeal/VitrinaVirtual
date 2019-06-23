<?php
 
class Sucursal_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get sucursal by id
     */
    function get_sucursal($id)
    {
        return $this->db->get_where('sucursales',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all sucursales
     */
    function get_all_sucursales()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('sucursales')->result_array();
    }
        
    /*
     * function to add new sucursal
     */
    function add_sucursal($params)
    {
        $this->db->insert('sucursales',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update sucursal
     */
    function update_sucursal($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('sucursales',$params);
    }
    
    /*
     * function to delete sucursal
     */
    function delete_sucursal($id)
    {
        return $this->db->delete('sucursales',array('id'=>$id));
    }
}

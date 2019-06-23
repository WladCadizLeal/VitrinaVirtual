<?php
 
class Marca_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get marca by id
     */
    function get_marca($id)
    {
        return $this->db->get_where('marcas',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all marcas
     */
    function get_all_marcas()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('marcas')->result_array();
    }
        
    /*
     * function to add new marca
     */
    function add_marca($params)
    {
        $this->db->insert('marcas',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update marca
     */
    function update_marca($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('marcas',$params);
    }
    
    /*
     * function to delete marca
     */
    function delete_marca($id)
    {
        return $this->db->delete('marcas',array('id'=>$id));
    }
}

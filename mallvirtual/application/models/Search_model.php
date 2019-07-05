<?php

class Search_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function search($keyword)
    {
        $this->db->select('p.id, p.nombre, p.descripcion, p.precio, p.categoria_fk, p.destacado, p.imagen, p.creado_en, m.nombre as marca, c.nombre as categoria, l.nombre as local');
        $this->db->from('productos p');
        $this->db->join('marcas m', 'm.id = p.marca_fk');
        $this->db->join('categorias c', 'c.id = p.categoria_fk');
        $this->db->join('locales l', 'l.id = p.local_fk');
        $this->db->like('p.nombre', $keyword);
        $query  =   $this->db->get();
        return $query->result();
    }
}

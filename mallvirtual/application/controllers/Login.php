<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function login()
    {
        if ($this->input->post('login')) {
            $correo = $this->input->post('correo');
            $contrasena = $this->input->post('contrasena');

            $que = $this->db->query("select * from usuarios where correo='" . $correo . "' and contrasena='$contrasena'");
            $row = $que->num_rows();
            if ($row) {
                redirect('Login/dashboard');
            } else {
                $data['error'] = "<h3 style='color:red'>Invalid login details</h3>";
            }
        }
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }

    function dashboard()
    {
        $this->load->view('Dashboard');
        //redirect('sucursal/index');
    }

    function cerrarSesion(){
        //$this->session->sess_destroy();
        $this->load->view('Login');
    }
}

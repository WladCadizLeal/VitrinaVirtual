<?php
defined('BASEPATH') or exit('No existe el script alojado');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Usuarios_model");
    }
    public function index()
    {
        if ($this->session->userdata("login")) {
            redirect(base_url() . "producto");
        } else {
            $this->load->view('vitrina/login');
        }
    }
    public function login()
    {
        $correo = $this->input->post("email");
        $contrasena = $this->input->post("password");
        $res = $this->Usuarios_model->login($correo, md5($contrasena));
        if (!$res) {
            /*  redirect(base_url()); */
            echo ("Usuario o contraseña incorrectos");
        } else {
            $data = array(
                'id' => $res->id,
                'nombre' => $res->nombre,
                'correo' => $res->correo,
                'login' => TRUE
            );
            $this->session->set_userdata($data);
            redirect(base_url() . "dashboard");
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('vitrina/login');
    }
}

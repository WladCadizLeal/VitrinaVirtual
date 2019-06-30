<?php

class Sucursal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sucursal_model');
    }

    /*
     * Listing of sucursales
     */
    function index()
    {
        if ($this->session->userdata("login")) {
            $data['sucursales'] = $this->Sucursal_model->get_all_sucursales();

            $data['_view'] = 'sucursal/index';
            $this->load->view('layouts/main', $data);
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Adding a new sucursal
     */
    function add()
    {
        if ($this->session->userdata("login")) {
            if (isset($_POST) && count($_POST) > 0) {
                $file = $_FILES['file'];

                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $allowed = array('jpg', 'jpeg', 'png');

                if (in_array($fileActualExt, $allowed)) {
                    if ($fileError === 0) {
                        if ($fileSize < 1000000) {
                            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                            $fileDestination = 'includes/img/' . $fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);
                        } else {
                            echo "Tu archivo es demasiado grande";
                        }
                    } else {
                        echo "Hubo un error al subir tu imagen";
                    }
                } else {
                    echo "No puedes subir archivos de este tipo";
                }
                $params = array(
                    'nombre' => $this->input->post('nombre'),
                    'direccion' => $this->input->post('direccion'),
                    'imagen' => $fileDestination
                );

                $sucursal_id = $this->Sucursal_model->add_sucursal($params);
                redirect('sucursal/index');
            } else {
                $data['_view'] = 'sucursal/add';
                $this->load->view('layouts/main', $data);
            }
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Editing a sucursal
     */
    function edit($id)
    {
        if ($this->session->userdata("login")) {
            // check if the sucursal exists before trying to edit it
            $data['sucursal'] = $this->Sucursal_model->get_sucursal($id);

            if (isset($data['sucursal']['id'])) {
                if (isset($_POST) && count($_POST) > 0) {
                    $file = $_FILES['file'];

                    $fileName = $_FILES['file']['name'];
                    $fileTmpName = $_FILES['file']['tmp_name'];
                    $fileSize = $_FILES['file']['size'];
                    $fileError = $_FILES['file']['error'];
                    $fileType = $_FILES['file']['type'];

                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));

                    $allowed = array('jpg', 'jpeg', 'png');

                    if (in_array($fileActualExt, $allowed)) {
                        if ($fileError === 0) {
                            if ($fileSize < 1000000) {
                                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                                $fileDestination = 'includes/img/' . $fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                            } else {
                                echo "Tu archivo es demasiado grande";
                            }
                        } else {
                            echo "Hubo un error al subir tu imagen";
                        }
                    } else {
                        echo "No puedes subir archivos de este tipo";
                    }
                    $params = array(
                        'nombre' => $this->input->post('nombre'),
                        'direccion' => $this->input->post('direccion'),
                        'imagen' => $fileDestination
                    );

                    $this->Sucursal_model->update_sucursal($id, $params);
                    redirect('sucursal/index');
                } else {
                    $data['_view'] = 'sucursal/edit';
                    $this->load->view('layouts/main', $data);
                }
            } else
                show_error('The sucursal you are trying to edit does not exist.');
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Deleting sucursal
     */
    function remove($id)
    {
        if ($this->session->userdata("login")) {
            $sucursal = $this->Sucursal_model->get_sucursal($id);

            // check if the sucursal exists before trying to delete it
            if (isset($sucursal['id'])) {
                $this->Sucursal_model->delete_sucursal($id);
                redirect('sucursal/index');
            } else
                show_error('The sucursal you are trying to delete does not exist.');
        } else {
            $this->load->view('vitrina/login');
        }
    }
}

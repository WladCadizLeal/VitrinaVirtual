<?php

class Local extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Local_model');
    }

    /*
     * Listing of locales
     */
    function index()
    {
        if ($this->session->userdata("login")) {
            $data['locales'] = $this->Local_model->get_all_locales();

            $data['_view'] = 'local/index';
            $this->load->view('layouts/main', $data);
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Adding a new local
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
                    'sucursal_fk' => $this->input->post('sucursal_fk'),
                    'telefono_fk' => $this->input->post('telefono_fk'),
                    'nombre' => $this->input->post('nombre'),
                    'imagen' => $fileDestination,
                    'descripcion' => $this->input->post('descripcion'),
                );

                $local_id = $this->Local_model->add_local($params);
                redirect('local/index');
            } else {
                $this->load->model('Sucursal_model');
                $data['all_sucursales'] = $this->Sucursal_model->get_all_sucursales();

                $this->load->model('Telefono_model');
                $data['all_telefonos'] = $this->Telefono_model->get_all_telefonos();

                $data['_view'] = 'local/add';
                $this->load->view('layouts/main', $data);
            }
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Editing a local
     */
    function edit($id)
    {
        if ($this->session->userdata("login")) {
            // check if the local exists before trying to edit it
            $data['local'] = $this->Local_model->get_local($id);

            if (isset($data['local']['id'])) {
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
                        'sucursal_fk' => $this->input->post('sucursal_fk'),
                        'telefono_fk' => $this->input->post('telefono_fk'),
                        'nombre' => $this->input->post('nombre'),
                        'imagen' => $fileDestination,
                        'descripcion' => $this->input->post('descripcion'),
                    );

                    $this->Local_model->update_local($id, $params);
                    redirect('local/index');
                } else {
                    $this->load->model('Sucursal_model');
                    $data['all_sucursales'] = $this->Sucursal_model->get_all_sucursales();

                    $this->load->model('Telefono_model');
                    $data['all_telefonos'] = $this->Telefono_model->get_all_telefonos();

                    $data['_view'] = 'local/edit';
                    $this->load->view('layouts/main', $data);
                }
            } else
                show_error('The local you are trying to edit does not exist.');
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Deleting local
     */
    function remove($id)
    {
        if ($this->session->userdata("login")) {
            $local = $this->Local_model->get_local($id);

            // check if the local exists before trying to delete it
            if (isset($local['id'])) {
                $this->Local_model->delete_local($id);
                redirect('local/index');
            } else
                show_error('The local you are trying to delete does not exist.');
        } else {
            $this->load->view('vitrina/login');
        }
    }
}

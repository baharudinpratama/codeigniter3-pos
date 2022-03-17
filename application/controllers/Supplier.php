<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        user_not_login();
        $this->load->model('supplier_model');
    }

    public function index()
    {
        $data['suppliers'] = $this->supplier_model->get();
        $this->template->load('template', 'supplier/index', $data);
    }

    public function delete($id)
    {
        $this->supplier_model->deleteSupplierById($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script> alert('Data deleted.') </script>";
        }
        echo "<script> window.location='" . site_url('supplier') . "' </script>";
    }
}

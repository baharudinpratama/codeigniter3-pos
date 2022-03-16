<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        user_not_login();
        $this->load->model('user_model');
    }

    public function index()
    {
        $data['users'] = $this->user_model->get();
        $this->template->load('template', 'user/index', $data);
    }

    public function create()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('username', 'username', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[4]');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[password]');
        $this->form_validation->set_rules('level', 'level', 'required', ['required' => 'Please select user %s.']);
        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'user/create');
        } else {
            $post = $this->input->post(null, true);
            $this->user_model->addNewUser($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script> alert('Data added successfully.') </script>";
            }
            echo "<script> window.location='" . site_url('user') . "' </script>";
        }
    }
}

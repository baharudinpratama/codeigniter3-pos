<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        user_not_login();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['users'] = $this->user_model->get();
        $this->template->load('template', 'user/index', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('username', 'username', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[4]|matches[passconf]');
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

    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('username', 'username', 'required|min_length[5]|callback_username_check');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'password', 'min_length[4]|matches[passconf]');
        }
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('passconf', 'confirm password', 'matches[password]');
        }
        $this->form_validation->set_rules('level', 'level', 'required', ['required' => 'Please select user %s.']);
        if ($this->form_validation->run() == false) {
            $query = $this->user_model->get($id);
            if ($query->num_rows() > 0) {
                $data['user'] = $query->row();
                $this->template->load('template', 'user/edit', $data);
            } else {
                echo "  <script>
                            alert('User data not found.')
                            window.location='" . site_url('user') . "'
                        </script>";
            }
        } else {
            $post = $this->input->post(null, true);
            $this->user_model->updateUserById($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script> alert('Data updated successfully.') </script>";
            }
            echo "<script> window.location='" . site_url('user') . "' </script>";
        }
    }

    public function username_check()
    {
        $post = $this->input->post(null, true);
        $query = $this->db->query("SELECT * FROM users WHERE username = '$post[username]' AND id != '$post[id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', 'This {field} already used.');
            return false;
        } else {
            return true;
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->user_model->deleteUserById($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script> alert('Data deleted.') </script>";
        }
        echo "<script> window.location='" . site_url('user') . "' </script>";
    }
}

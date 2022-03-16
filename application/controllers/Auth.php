<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        user_already_login();
        $this->load->view('auth/login');
    }

    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($post['login'])) {
            $this->load->model('user_model');
            $query = $this->user_model->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = [
                    'id' => $row->id,
                    'level' => $row->level,
                ];
                $this->session->set_userdata($params);
                echo "<script>
                    alert('Log in success');
                    window.location='" . site_url('dashboard') . "';
                </script>";
            } else {
                echo "<script>
                    alert('Log in failed, wrong username / password');
                    window.location='" . site_url('auth/login') . "';
                </script>";
            }
        }
    }

    public function logout()
    {
        $params = ['id', 'level'];
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}

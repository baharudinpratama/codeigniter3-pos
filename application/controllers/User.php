<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        user_not_login();
        $this->load->model('user_model');
        $data['users'] = $this->user_model->get();
        $this->template->load('template', 'user/index', $data);
    }
}

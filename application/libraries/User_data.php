<?php

class User_data
{

    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login_data()
    {
        $this->ci->load->model('user_model');
        $user_id = $this->ci->session->userdata('id');
        $user_data = $this->ci->user_model->get($user_id)->row();
        return $user_data;
    }
}

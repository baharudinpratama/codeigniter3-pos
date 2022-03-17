<?php

function user_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id');
    if ($user_session) {
        redirect('dashboard');
    }
}

function user_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id');
    if (!$user_session) {
        redirect('auth/login');
    }
}

function check_admin()
{
    $ci = &get_instance();
    $ci->load->library('user_data');
    if ($ci->user_data->user_login_data()->level != 1) {
        redirect('dashboard');
    }
}

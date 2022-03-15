<?php

class Template
{
    var $template_data = [];

    public function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    public function load($template = '', $view = '', $view_data = [], $return = false)
    {
        $this->CI = &get_instance();
        $this->set('contents', $this->CI->load->view($view, $view_data, true));
        return $this->CI->load->view($template, $this->template_data, $return);
    }
}

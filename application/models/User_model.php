<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('users');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function addNewUser($post)
    {
        $data['username'] = $post['username'];
        $data['password'] = sha1($post['password']);
        $data['name'] = $post['name'];
        $data['address'] = $post['address'] != "" ? $post['address'] : null;
        $data['level'] = $post['level'];
        $this->db->insert('users', $data);
    }

    public function updateUserById($post)
    {
        $data['username'] = $post['username'];
        if (!empty($post['password'])) {
            $data['password'] = sha1($post['password']);
        }
        $data['name'] = $post['name'];
        $data['address'] = $post['address'] != "" ? $post['address'] : null;
        $data['level'] = $post['level'];
        $this->db->where('id', $post['id']);
        $this->db->update('users', $data);
    }

    public function deleteUserById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}

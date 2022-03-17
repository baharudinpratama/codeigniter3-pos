<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('suppliers');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function deleteSupplierById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('suppliers');
    }
}

<?php
class SexoModel extends CI_Model {

    public $table = 'sexo';
    public $table_id = 'idsexo';

    public function findAll() {
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result_array();
    }
}
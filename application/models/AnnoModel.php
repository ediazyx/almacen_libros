<?php
class AnnoModel extends CI_Model {

    public $table = 'anno';
    public $table_id = 'idanno';

    public function findAll() {
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result_array();
    }
}
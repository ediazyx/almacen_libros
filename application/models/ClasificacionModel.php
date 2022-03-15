<?php
class ClasificacionModel extends CI_Model {

    public $table = 'clasificacion';
    public $table_id = 'idclasificacion';

    public function findAll() {
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result_array();
    }

}
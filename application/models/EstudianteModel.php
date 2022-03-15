<?php
class EstudianteModel extends CI_Model {

    public $table = 'estudiante';
    public $table_id = 'carnet_identidad';

    public function find($id) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id, $id);

        $query = $this->db->get();
        return $query->row();
    }

    public function findAll() {
       /* $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result_array();
        */
        $sql = "SELECT carnet_identidad, nombre_completo, direccion, sexo.descripcion AS s_descripcion, anno.descripcion AS a_descripcion";
        $sql = $sql." FROM (estudiante INNER JOIN sexo ON  estudiante.sexo_idsexo = sexo.idsexo) INNER JOIN anno"; 
        $sql = $sql." ON estudiante.anno_idanno = anno.idanno";
                
        $query = $this->db->query($sql);
        //$query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
     {             
        $this->db->insert($this->table, $data);
     } 

     public function delete($codigo)
     {             
        $this->db->delete($this->table, array($this->table_id => $codigo));
     }
}
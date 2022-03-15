<?php
class LibroModel extends CI_Model {

    public $table = 'libro';
    public $table_id = 'codlibro';

    public function find($id) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where('codlibro', $id);

        $query = $this->db->get();
        return $query->row();
    }

    public function findAll() {
       /* $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result_array();
        */
        $sql = "SELECT codlibro, titulo, autor, libro.descripcion, isbn, editorial, cantidad_existencia, precio, clasificacion.descripcion AS c_descripcion, anno.descripcion AS a_descripcion";
        $sql = $sql." FROM (libro INNER JOIN clasificacion ON  libro.clasificacion_idclasificacion = clasificacion.idclasificacion) INNER JOIN anno"; 
        $sql = $sql." ON libro.anno_idanno = anno.idanno ORDER BY precio ASC";
        
        // $this->db->select('*');
        // $this->db->from($this->table);
        // $this->db->join('clasificacion', 'clasificacion.idclasificacion = libro.clasificacion_idclasificacion');
        // $this->db->join('anno', 'anno.idanno = libro.anno_idanno');
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

     public function listAutores()
     {
         $this->db->select('autor, codlibro, titulo');
         $this->db->from($this->table);         

         $query = $this->db->get();
         return $query->result_array();
     }
}
<?php
include_once MODEL_DIR . 'connect.php';

/**
*
*/
class AnualModel extends Database {
    
    
    const DATAOUTPUT = ['id', 'period_name', 'value']; 
    public function __construct() {
        parent::__construct();
    }

    public function getAnual($id = null) {
        if (!empty($id)) {
            $conditions = ["AND" => ["id" => $id]];
            $this->user = $this->db->get('Ok_anual', self::DATAOUTPUT, $conditions);
            return $this;
        } elseif (!empty($conditional)) {
            // Menerapkan penyaringan kondisional
            $this->user = $this->db->select('Ok_anual', self::DATAOUTPUT, $conditional);
            return $this->user;
        } else {
            return $this;
        }
    }


    // public function setRouter() {} 
    
    public function all() {
        $this->anual = $this->db->select('Ok_anual', self::DATAOUTPUT);
        return $this;
    }

    public function get() {
        return $this->anual;
    }
    
    public function tambah_anual($period_name, $value){
        return $this->db->insert('Ok_anual',['period_name'=>$period_name, 'value'=>$value]);
    }
    
    public function update_anual($data, $where){
         return $this->db->update('Ok_anual', $data, $where);
    }
    
    public function hapus_anual($idAn){
        return $this->db->delete('Ok_anual', ['id'=> $idAn]);
    }

    public function addRouter(){
        
       
        
    }



}
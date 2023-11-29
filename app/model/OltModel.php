<?php
include_once MODEL_DIR . 'connect.php';

/**
*
*/
class OltModel extends Database {
    
    
    const DATAOUTPUT = ['id', 'nama', 'type','merk']; 
    public function __construct() {
        parent::__construct();
    }

    public function getOlt($id=null) {
        if (!empty($id)) {
            $conditions = ["AND" => ["id" => $id]];
            $this->user = $this->db->get('Ok_OLT', self::DATAOUTPUT, $conditions);
            return $this;
        } elseif (!empty($conditional)) {
            // Menerapkan penyaringan kondisional
            $this->user = $this->db->select('Ok_OLT', self::DATAOUTPUT, $conditional);
            return $this->user;
        } else {
            return $this;
        }
    }


    public function setOlt() {}

    public function all() {
        $this->olt = $this->db->select('Ok_OLT',self::DATAOUTPUT);
        return $this;
    }

    public function get() {
        return $this->olt;
    }

    public function tambah_olt($nama, $type, $merk){
      return $this->db->insert('Ok_OLT',['nama'=>$nama, 'type'=>$type, 'merk'=>$merk]);
    }
   
    public function edit_olt($data,$where) {
        return $this->db->update('Ok_OLT', $data, $where);
    }
    
    public function delete_olt($idOlt) {
        $conditions = ["AND" => ["id_olt" => $idOlt]];
        $cek = $this->db->get('Ok_ODC' ,"*", $conditions);
        
        if (empty($cek)) {
            return $this->db->delete('Ok_OLT',['id'=>$idOlt]);
        }
        return false;
    }
    
    
    
    // public function delete_olt($idOlt){
    //     return $this->db->delete('Ok_OLT',['id'=>$idOlt]);
    // }
}
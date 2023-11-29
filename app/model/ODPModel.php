<?php
include_once MODEL_DIR . 'connect.php';

/**
*
*/
class ODPModel extends Database {
    
    
    const DATAOUTPUT = ['id', 'id_odc', 'nama', 'port','status']; 
    public function __construct() {
        parent::__construct();
    }

    public function getODP($id = null) {
        if (!empty($id)) {
            $conditions = ["AND" => ["id" => $id]];
            $this->user = $this->db->get('Ok_ODP', self::DATAOUTPUT, $conditions);
            return $this;
        } elseif (!empty($conditional)) {
            // Menerapkan penyaringan kondisional
            $this->user = $this->db->select('Ok_ODP', self::DATAOUTPUT, $conditional);
            return $this->user;
        } else {
            return $this;
        }
    }


    // public function setRouter() {} 
    
    public function all() {
        $this->subs = $this->db->select('Ok_ODP', self::DATAOUTPUT);
        return $this;
    }

    public function get() {
        return $this->subs;
    }

    public function tambah_odp($id_odc, $nama, $port, $status){
        return  $this->db->insert('Ok_ODP',['id_odc'=>$id_odc, 'nama'=>$nama, 'port'=>$port, 'status'=>$status]);
        
    }
    
    public function edit_odp($data, $where){
         return $this->db->update('Ok_ODP', $data, $where);
    }
    
    public function hapus_odp($idOdp){
        return $this->db->delete('Ok_ODP', ['id'=>$idOdp]);
    }



}
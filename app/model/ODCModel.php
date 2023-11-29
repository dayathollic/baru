<?php
include_once MODEL_DIR . 'connect.php';

/**
*
*/
class ODCModel extends Database {
    
    
    const DATAOUTPUT = ['id', 'id_olt','nama', 'port','status', 'latitude', 'longitude', 'created_at', 'updated_at']; 
    public function __construct() {
        parent::__construct();
    }

    public function getODC($id = null) {
        if (!empty($id)) {
            $conditions = ["AND" => ["id" => $id]];
            $this->user = $this->db->get('Ok_ODC', self::DATAOUTPUT, $conditions);
            return $this;
        } elseif (!empty($conditional)) {
            // Menerapkan penyaringan kondisional
            $this->user = $this->db->select('Ok_ODC', self::DATAOUTPUT, $conditional);
            // $this->user = "select * from table Ok_ODC Join table Ok_OLT.id = table Ok_ODC.id_olt";
            return $this->user;
        } else {
            return $this;
        }
    }


    // public function setRouter() {} 
    
    public function all() {
        $this->subs = $this->db->select('Ok_ODC', self::DATAOUTPUT);
        return $this;
    }

    public function get() {
        return $this->subs;
    }

    public function tambah_odc($id_olt, $nama, $port, $status, $lat, $lng, $date ){
        return  $this->db->insert('Ok_ODC',['id_olt'=>$id_olt, 'nama'=>$nama, 'port'=>$port, 'status'=>$status, 'latitude'=>$lat, 'longitude'=>$lng, 'created_at'=>$date]);
    }
    
    public function ubah_odc($data, $where){
        return $this->db->update('Ok_ODC', $data, $where);
        //  return $this;
    }
    
    public function hapus_odc($idOdc){
        $conditions = ["AND" => ["id_odc" => $idOdc]];
        $cek = $this->db->get('Ok_ODP', "*", $conditions);
        if (empty($cek)){
            return $this->db->delete('Ok_ODC', ['id'=>$idOdc]);
        }
        return false;
    }
    
    
    // public function hapus_odc($idOdc){
    //     return $this->db->delete('Ok_ODC', ['id'=>$idOdc]);
    // }



}
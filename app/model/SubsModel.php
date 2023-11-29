<?php
include_once MODEL_DIR . 'connect.php';

/**
*
*/
class SubsModel extends Database {
    
    
    const DATAOUTPUT = ['id', 'package', 'profile','service', 'amount', 'updated_at', 'created_at']; 
    public function __construct() {
        parent::__construct();
    }

    public function getSubs( $id = null) {
        if (!empty($id)) {
            $conditions = ["AND" => ["id" => $id]];
            $this->user = $this->db->get('Ok_subscriptions', self::DATAOUTPUT, $conditions);
            return $this;
        } elseif (!empty($conditional)) {
            // Menerapkan penyaringan kondisional
            $this->user = $this->db->select('Ok_subscriptions', self::DATAOUTPUT, $conditional);
            return $this->user;
        } else {
            return $this;
        }
    }


    // public function setRouter() {} 
    
    public function all() {
        $this->subs = $this->db->select('Ok_subscriptions', self::DATAOUTPUT);
        return $this;
    }

    public function get() {
        return $this->subs;
    }
    
    public function tambah_subs($package, $profile, $service, $amount){
      return $this->db->insert('Ok_subscriptions',['package'=>$package, 'profile'=>$profile, 'service'=>$service, 'amount'=>$amount]);
    }
    
    public function edit_subs($data, $where){
         return $this->db->update('Ok_subscriptions', $data, $where);
    }
    
    public function hapus_subs($idSubs){
        return $this->db->delete('Ok_subscriptions', ['id'=> $idSubs]);
    }
    
    



}
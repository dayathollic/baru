<?php
include_once MODEL_DIR . 'connect.php';

/**
*
*/
class RouterModel extends Database {
    
    
    const DATAOUTPUT = ['id', 'name', 'description','host', 'username', 'password', 'port', 'status', 'updated_at', 'created_at']; 
    public function __construct() {
        parent::__construct();
    }

    public function getRouter($id = null) {
        if (!empty($id)) {
            $conditions = ["AND" => ["id" => $id]];
            $this->user = $this->db->get('Ok_router', self::DATAOUTPUT, $conditions);
            return $this;
        } elseif (!empty($conditional)) {
            // Menerapkan penyaringan kondisional
            $this->user = $this->db->select('Ok_router', self::DATAOUTPUT, $conditional);
            return $this->user;
        } else {
            return $this;
        }
    }


    public function setRouter() {}

    public function all() {
        $this->router = $this->db->select('Ok_router', self::DATAOUTPUT);
        return $this;
    }

    public function get() {
        return $this->router;
    }
    
    public function tambah_router($name, $description, $host, $username, $password, $port, $status){
        $hashed_passsword = md5($password);
     return $this->db->insert('Ok_router',['name'=>$name, 'description'=>$description, 'host'=>$host, 'username'=>$username, 'password'=>$hashed_passsword, 'port'=>$port, 'status'=>$status]);
    }
    
    public function edit_router($data, $where) {
        return $this->db->update('Ok_router', $data, $where);
    }
    
    public function delete_router($idRouter){
        return $this->db->delete('Ok_router', ['id'=>$idRouter]);
    }
    
    public function getUserByPassword($oldpassword){
        $conditions = ["AND" => ["password" => $oldpassword]]; 
        $cek = $this->db->get('Ok_router', "*", $conditions);
        return $cek;
    }
    
    public function change_p($new, $where){
        return $this->db->update('Ok_router', ['password' => $new], $where );
    }
    

   

}
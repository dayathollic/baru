<?php

include_once MODEL_DIR . 'connect.php';

class UserModel extends Database {
    protected $username;
    protected $password;
    public $id;
    public $userid;
    
     const DATAOUTPUT = ['id', 'name', 'username','password', 'email', 'permission_levels', 'role']; 
    public function __construct() {
        parent::__construct();
    }
        /**
         * Mengidentifikasi profil pengguna berdasarkan ID pengguna atau menerapkan penyaringan kondisional
         * @param string|int|null $id ID pengguna (opsional)
         * @param array $conditional Array asosiatif untuk penyaringan kondisional (opsional)
         * @return $this|array|bool
         */
        public function authenticateUser($username, $password) {
            // Validate input
            if (empty($username) || empty($password)) {
                return false;
            }
            $conditions = ["AND" => ["OR" => [ "username" => $username,"email" => $username,], "password" => $password]];
            if ($this->db->has('Ok_users', $conditions)) {
                 $this->userid = $this->db->get('Ok_users', 'id',  ["AND" => ["OR" => [ "username" => $username,"email" => $username,]]]);
                return true;
            } else {
                return false;
            }
        }
        /**
         * Mengidentifikasi profil pengguna berdasarkan ID pengguna atau menerapkan penyaringan kondisional
         * @param string|int|null $id ID pengguna (opsional)
         * @param array $conditional Array asosiatif untuk penyaringan kondisional (opsional)
         * @return $this|array|bool
         */
         
        // public function getUser($id = null, $conditional = []) {
        //     if (!empty($id)) {
        //         $conditions = ["AND" => ["id" => $id]];
        //         $this->user = $this->db->get('Ok_users', self::DATAOUTPUT , $conditions);
        //         return $this;
        //     } elseif (!empty($conditional)) {
        //         // Menerapkan penyaringan kondisional
        //         $this->user = $this->db->select('Ok_users', self::DATAOUTPUT, $conditional);
        //         return $this->user;
        //     } else {
        //         return $this;
        //     }
        // }
        
        
        public function getUser($id = null) {
        if (!empty($id)) {
            $conditions = ["AND" => ["id" => $id]];
            $this->user = $this->db->get('Ok_users', self::DATAOUTPUT, $conditions);
            return $this;
        } elseif (!empty($conditional)) {
            // Menerapkan penyaringan kondisional
            $this->user = $this->db->select('Ok_users', self::DATAOUTPUT, $conditional);
            return $this->user;
        } else {
            return $this;
        }
    }
    
    public function tambah_user($nama, $username, $email, $password, $level, $role ){
        $hashed_password = md5($password);
        return $this->db->insert('Ok_users',['name'=>$nama, 'username'=>$username, 'email'=>$email, 'password'=>$hashed_password, 'permission_levels'=>$level, 'role'=>$role]);
    }
        
        /**
         * Mengambil semua data pengguna
         * @return array|bool
         */
        public function all() {
            $this->user = $this->db->select('Ok_users', self::DATAOUTPUT);
            return $this->user;
        }
        
        public function get() {
            return $this->user;
        }
        
        public function edit_user($data, $where){
            // $salt = uniqid();
            // $hashed = password_hash($salt . $pass, PASSWORD_DEFAULT);
            return $this->db->update('Ok_users', $data, $where);
        }
        
        public function hapus_user($idUser){
         return $this->db->delete('Ok_users', ['id'=>$idUser]);   
        }
        
        public function getUserByPassword($oldpassword){
            $conditions = ["AND" => ["password" => $oldpassword]];
            $cek = $this->db->get('Ok_users', "*", $conditions);  
            // print_r($conditions);
            // exit();
            return $cek;
        }
        
        public function change_p($new, $where){
            return $this->db->update('Ok_users', ['password'=>$new], $where); 
              
        }
}

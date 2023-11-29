<?php
include_once MODEL_DIR . 'UserModel.php';
include_once CONTROLLER_DIR . 'SessionController.php';
include_once CONTROLLER_DIR . 'validationController.php';  

/**
*
*/
class staffController extends validation
{

    /**
    *
    */
    public function __construct() {
        parent::__construct();
        $this->urlSegments = URLController::getSegments();
        $this->init();
    }

    public function init() {

        $this->UserModel = new UserModel();
        $this->session = new session();
        array_shift($this->urlSegments);
        error_reporting(1);
        if ($this->requestMethod === 'GET') {
            if ($this->urlSegments) {
                switch ($this->urlSegments[0]) {
                    case 'user':
                        /////block router
                        switch ($this->urlSegments[1]) {
                        case 'add':
                            return $this->add();
                            break;
                        case 'edit':
                            switch ($this->urlSegments[2]) {
                            case 'change':
                                return $this->change();
                                break;

                            default:
                                return $this->edit();
                                break;
                            }
                        case 'hapus':
                            return $this->hapus();
                            break;

                        default:
                            return $this->getUser();
                            break;
                        }
                }
            }

        } else if ($this->requestMethod === 'POST') {
            $db = new Database();
            if ($aksi = $_GET['aksi']) {
                if ($aksi == "tambah") {
                    $queryEdit = $this->UserModel->tambah_user($_POST['nama'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['level'], $_POST['role']);
                    if ($queryEdit == true) {
                        $this->session->set('notif_berhasil', 'User berhasil ditambah');
                    } else {
                        $this->session->set('notif_gagal', 'User gagal diatambah');
                    }
                    header('location: /staff/user');


                } else if ($aksi == "edit") {
                    $id = $_GET['id'];
                    $data['name'] = $_POST['nama'];
                    $data['username'] = $_POST['username'];
                    $data['email'] = $_POST['email'];
                    //   $pass['password'] = $_POST['password'];
                    $data['permission_levels'] = $_POST['permission'];
                    $data['role'] = $_POST['role'];

                    $where = ['id' => $id];
                    $queryEdit = $this->UserModel->edit_user($data, $where);
                    if ($queryEdit == true) {
                        $this->session->set('notif_berhasil', 'User berhasil diedit');
                    } else {
                        $this->session->set('notif_gagal', 'User gagal diedit');
                    }
                    header('location: /staff/user');


                } elseif ($aksi == "change") {
                    $id = $_GET['id'];
                    $old = $_POST['oldpassword'];
                    $new = $_POST['new'];
                    $confirm = $_POST['confirm'];

                    $where = ['id' => $id];
                    $cekpassword = $this->UserModel->getUserByPassword(md5($old));
                    // print_r(md5($old));
                    // exit();
                    if(!empty($cekpassword)){
                        if($new == $confirm){
                            $queryEdit = $this->UserModel->change_p(md5($new), $where);
                                if ($queryEdit == true) {
                                    $this->session->set('notif_berhasil', 'Password berhasil diupdate');
                                    header('location: /staff/user');
                                    exit();
                                } else {
                                    $this->session->set('notif_alert_gagal', 'Password gagal diupdate');
                                } 
                        }else{
                            $this->session->set('notif_alert_gagal', 'Konfirmasi password tidak cocok');
                        }
                    }else{
                        $this->session->set('notif_alert_gagal', 'password tidak tersedia');
                    }  header('location: /staff/user/edit/change/'.$id);
                }
            }
        }

    }


    public function add() {
        $this->title = 'Add User - Okebiling';
        $this->layout()->view('adduser', []);
    }


    public function getUser() {
        $this->userall = $this->UserModel->all();
        $this->title = 'User - Okebiling';
        return $this->layout()->view('user', []);
    }

    public function edit() {
        $idUser = $this->urlSegments[2];
        $this->userEdit = $this->UserModel->getUser($idUser)->user;
        $this->title = 'Edit USER';
        // var_dump($idUSer);
        // die;
        $this->layout()->view('edituser', []);
    }

    public function hapus() {
        $idUser = $this->urlSegments[2];
        $queryEdit = $this->UserModel->hapus_user($idUser);
        if ($queryEdit == true) {
            $this->session->set('notif_berhasil', 'User berhasil dihapus');
        } else {
            $this->session->set('notif_gagal', 'User gagal dihapus');
        }
        header('location: /staff/user');
    }

    public function change() {
        $idUser = $this->urlSegments[3];
        $this->userEdit = $this->UserModel->getUser($idUser)->user;
        $this->title = 'Ubah Password';
        $this->layout()->view('change', []);
    }
}
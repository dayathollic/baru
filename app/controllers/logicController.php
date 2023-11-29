<?php

include_once MODEL_DIR . 'RouterModel.php';
include_once MODEL_DIR . 'OltModel.php';
include_once CONTROLLER_DIR . 'SessionController.php';
include_once CONTROLLER_DIR . 'validationController.php';  

/**
*
*/
class logicController extends validation
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

        $this->RouterModel = new RouterModel();
        $this->OltModel = new OltModel();
        $this->session = new session();
        array_shift($this->urlSegments);
        error_reporting(1);

        if ($this->requestMethod === 'GET') {
            if ($this->urlSegments) {
                switch ($this->urlSegments[0]) {
                    case 'router':
                        /////block router
                        switch ($this->urlSegments[1]) {
                        case 'add':
                            return $this->add();
                            break;
                        case 'edit':
                                switch ($this->urlSegments[2]) {
                                case 'passrouter':
                                    return $this->passrouter();
                                    break;
    
                                default:
                            return $this->editrouter();
                            break;
                                }
                        case'delete':
                            return $this->deleterouter();
                            break;
                        default:
                            return $this->getRouter();
                            break;
                        }
                    case'olt':
                        switch ($this->urlSegments[1]) {
                        case 'addolt':
                            return $this->addolt();
                            break;
                        case'edit':
                            return $this->editolt();
                            break;
                        case'delete':
                            return $this->deleteolt();
                            break;
                        default:
                            return $this->getOlt();
                            break;
                        }

                }
            }
        } else if ($this->requestMethod === 'POST') {

            $db = new Database();
            if ($aksi = $_GET['aksi']) {
                if ($aksi == "plus") {
                    $queryEdit = $this->RouterModel->tambah_router($_POST['nama'], $_POST['deskripsi'], $_POST['host'], $_POST['username'], $_POST['password'], $_POST['port'], $_POST['status']);
                    if ($queryEdit == true) {
                        $this->session->set('notif_berhasil', 'Router Berhasil ditambah');
                    } else {
                        $this->session->set('notif_gagal', 'Router gagal ditambah');
                    }

                    header('location: /logic/router');
                } else if ($aksi == "tambah") {
                    $queryEdit = $this->OltModel->tambah_olt($_POST['nama'], $_POST['type'], $_POST['merk']);
                    if ($queryEdit == true) {
                        $this->session->set('notif_berhasil', 'OLT Berhasil ditambah');
                    } else {
                        $this->session->set('notif_gagal', 'OLT Gagal ditambah');
                    }
                    header('location: /logic/olt');

                } elseif ($aksi == 'edit') {
                    $id = $_GET['id'];
                    $data['nama'] = $_POST['nama'];
                    $data['type'] = $_POST['type'];
                    $data['merk'] = $_POST['merk'];

                    $where = ['id' => $id];

                    $queryEdit = $this->OltModel->edit_olt($data, $where);

                    if ($queryEdit == true) {
                        $this->session->set('notif_berhasil', 'OLT Berhasil di edit');
                    } else {
                        $this->session->set('notif_gagal', 'OLT Gagal di edit');
                    }
                    header('location: /logic/olt');
                    
                } else if ($aksi == 'update') {
                    $id = $_GET['id'];

                    $data['name'] = $_POST['nama'];
                    $data['description'] = $_POST['deskripsi'];
                    $data['host'] = $_POST['host'];
                    $data['username'] = $_POST['username'];
                    $data['password'] = $_POST['password'];
                    $data['port'] = $_POST['port'];
                    $data['status'] = $_POST['status'];

                    $where = ['id' => $id];

                    $queryEdit = $this->RouterModel->edit_router($data, $where);

                    if ($queryEdit == true) {
                        $this->session->set('notif_berhasil', 'Router berhasil diedit');
                    } else {
                        $this->session->set('notif_gagal', 'Router gagal diedit');
                    }

                    header('location: /logic/router');
                } elseif($aksi == 'change'){
                    $id = $_GET['id'];
                    
                    $old = $_POST['oldpassword'];
                    $new = $_POST['new'];
                    $confirm = $_POST['confirm'];
                    
                    $where = ['id' => $id];
                    $cekpassword = $this->RouterModel->getUserByPassword(md5($old));
                    // var_dump($id, $old, $new, $confirm);
                    // die();
                    if(!empty($cekpassword)){
                        if($new == $confirm){
                            $queryEdit = $this->RouterModel->change_p(md5($new), $where);
                            if($queryEdit == true){
                                $this->session->set('notif_berhasil', 'Password berhasil diupdate');
                                header('location: /logic/router');
                                exit();
                            }else{
                                $this->session->set('notif_alert_gagal', 'Password gagal diupdate');
                            }
                        }else{
                            $this->session->set('notif_alert_gagal', 'Konfirmasi password tidak cocok');
                        }
                    }else{
                        $this->session->set('notif_alert_gagal', 'Password tidak tersedia');
                    } header('location: /logic/router/edit/passrouter/'.$id);
                    
                }
            }
        }
    }



    //konfigurasi ROUTER
    public function getRouter() {
        $this->routerall = $this->RouterModel->all();
        $this->title = 'Router - Okebiling';
        return $this->layout()->view('router', []);
    }

    public function add() {
        $this->title = 'Add Router - Okebiling';
        $this->layout()->view('addrouter', []);
    }

    public function editrouter() {
        $idRouter = $this->urlSegments[2];
        $this->routerEdit = $this->RouterModel->getRouter($idRouter)->user;
        $this->title = 'Edit ROUTER - Okebiling';
        $this->layout()->view('editrouter', []);
    }
    public function deleterouter() {
        $idRouter = $this->urlSegments[2];
        $queryEdit = $this->RouterModel->delete_router($idRouter);
        if ($queryEdit == true) {
            $this->session->set('notif_berhasil', 'Router berhasil dihapus');
        } else {
            $this->session->set('notif_gagal', 'Router gagal dihapus');
        }
        header('location: /logic/router');
    }


    //konfigurasi OLT
    public function getOlt() {
        $this->oltall = $this->OltModel->all();
        $this->title = 'Olt - Okebiling';
        return $this->layout()->view('olt', []);
    }

    public function addolt() {
        $this->title = 'Add OLT - Okebiling';
        $this->layout()->view('addolt', []);
    }

    public function editolt() {
        $idOlt = $this->urlSegments[2];
        $this->oltEdit = $this->OltModel->getOlt($idOlt)->user;
        $this->title = 'Edit OLT - Okebiling';
        $this->layout()->view('editolt', []);
    }

    public function deleteolt() {
        $idOlt = $this->urlSegments[2];
        $queryEdit = $this->OltModel->delete_olt($idOlt);
        if ($queryEdit == true) {
            $this->session->set('notif_berhasil', 'OLT Berhasil dihapus');
        } elseif ($queryEdit == false) {
            $this->session->set('notif_error', 'OLT gagal dihapus karena terkoneksi dengan ODC');
        } else {
            $this->session->set('notif_gagal', 'OLT gagal dihapus');
        }
        header('location: /logic/olt');
    }

    public function passrouter(){
        $idRouter = $this->urlSegments[3];
        $this->routerEdit = $this->RouterModel->getRouter($idRouter)->user;
        $this->title = 'Ubah Pasword';
        $this->layout()->view('passrouter', []);
    }




}
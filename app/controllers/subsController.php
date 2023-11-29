<?php
include_once MODEL_DIR . 'SubsModel.php';
include_once MODEL_DIR . 'AnualModel.php';
include_once CONTROLLER_DIR. 'SessionController.php';
include_once CONTROLLER_DIR . 'validationController.php';  

/**
 * 
 */
class subsController extends validation
{
    
    /**
     * 
     */
    public function __construct(){
    parent::__construct();
     $this->urlSegments =URLController::getSegments();
     $this->init();
    }
    
    public function init() {

        $this->SubsModel = new SubsModel();
        $this->AnualModel = new AnualModel();
        $this->session = new session();
        array_shift($this->urlSegments);
        error_reporting(1);
        if ($this->requestMethod === 'GET') {
            if ($this->urlSegments){
                switch ($this->urlSegments[0]) {
                    case 'subs':
                        /////block router
                        switch ($this->urlSegments[1]) {
                            case 'add':
                                return $this->add();
                                break;
                            case 'edit':
                                return $this->edit();
                                break;
                            case 'hapus':
                                return $this->hapus();
                                break;
                        default:
                            return $this->getSubs();
                            break;
                        }
                    case'anual':
                        switch ($this->urlSegments[1]){
                            case 'addanual':
                                return $this->addanual();
                            break;
                            case 'update':
                                return $this->update();
                            break;
                            case 'delete':
                                return $this->delete();
                                break;
                            
                        default:
                            return $this->getAnual();
                            break;
                            }
                }
            }
            
        } else if ($this->requestMethod === 'POST') {
            $db = new Database();
            if($aksi = $_GET['aksi']){
                if($aksi == "tambah"){
                    $queryEdit = $this->AnualModel->tambah_anual($_POST['periode'], $_POST['value']);
                    if($queryEdit == true){
                        $this->session->set('notif_berhasil', 'Anual berhasil ditambah');
                    }else{
                        $this->session->set('notif_gagal', 'Anual gagal ditambah');
                    }
                    header('location: /subs/anual');
                } else if ($aksi == "plus"){
                    $queryEdit =  $this->SubsModel->tambah_subs($_POST['package'], $_POST['profile'], $_POST['service'], $_POST['amount']);
                    if($queryEdit == true){
                        $this->session->set('notif_berhasil', 'Subscriptions berhasil ditambah');
                    }else{
                        $this->session->set('notif_gagal', 'Subscriptions gagal ditambah');
                    }
                    header('location: /subs/subs');
                } else if ($aksi == "edit"){
                    
                    $id = $_GET['id'];
                    $data['package'] = $_POST['package'];
                    $data['profile'] = $_POST['profile'];
                    $data['service'] = $_POST['service'];
                    $data['amount'] = $_POST['amount'];
                    
                    $where = ['id' => $id];
                    $queryEdit = $this->SubsModel->edit_subs($data,$where);
                    if($queryEdit == true){
                        $this->session->set('notif_berhasil', 'Subscriptions berhasil diedit');
                    }else{
                        $this->session->set('notif_gagal', 'Subscriptions gagal diedit');
                    }
                    header('location: /subs/subs');
                } else if ($aksi == "update"){
                    
                    $id = $_GET['id'];
                    $data['period_name'] = $_POST['periode'];
                    $data['value'] = $_POST['value'];
                    
                    $where = ['id' => $id];
                    $queryEdit = $this->AnualModel->update_anual($data,$where);
                    if($queryEdit == true){
                        $this->session->set('notif_berhasil', 'Anual berhasil diedit');
                    }else{
                        $this->session->set('notif_gagal', 'Anual gagal diedit');
                    }
                   
                    header('location: /subs/anual');
               } 
            
            }
        }

    }
    
    
    public function add(){
        $this->title = 'Add Subscriptions - Okebiling';
        $this->layout()->view('addsubs', []);
    } 
    public function addanual(){
        $this->title = 'Add Anual - Okebiling';
        $this->layout()->view('addanual', []);
    }
    
    
    public function edit(){
        $idSubs = $this->urlSegments[2];
        $this->subsEdit = $this->SubsModel->getSubs($idSubs)->user;
        $this->title = 'Edit Subscriptions - OKE Biling';
        $this->layout()->view('editsubs', []);
    }
    
    public function update(){
        $idAn = $this->urlSegments[2];
        $this->anEdit = $this->AnualModel->getAnual($idAn)->user;
        $this->title = 'Edit Anual - OKE Biling';
        $this->layout()->view('editanual', []);
    }
    
    
    
    public function getSubs(){
        $this->subsall= $this->SubsModel->all();
        $this->title = 'Subscriptions - Okebiling';
        return  $this->layout()->view('subs', []);
    }
    
    public function getAnual(){
        $this->anualall= $this->AnualModel->all();
        $this->title = 'Anual - Okebiling';
        return  $this->layout()->view('anual', []);
    }
    
    
    
    public function hapus(){
        $idSubs = $this->urlSegments[2];
        $queryEdit = $this->SubsModel->hapus_subs($idSubs);
        if($queryEdit == true){
            $this->session->set('notif_berhasil', 'Subscriptions berhasil dihapus');
        }else{
            $this->session->set('notif_gagal', 'Subscriptions gagal dihapus');
        }
        header('location: /subs/subs');
    }
    
    public function delete(){
        $idAn = $this->urlSegments[2];
        $queryEdit = $this->AnualModel->hapus_anual($idAn);
        if($queryEdit == true){
            $this->session->set('notif_berhasil', 'Anual berhasil dihapus');
        }else{
            $this->session->set('notif_gagal', 'Anual gagal dihapus');
        }
        
        header('location: /subs/anual');
    }
    
    
}
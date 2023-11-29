<?php
include_once MODEL_DIR .'ODPModel.php';
include_once MODEL_DIR .'ODCModel.php';
include_once MODEL_DIR .'OltModel.php';
include_once CONTROLLER_DIR . 'SessionController.php';
include_once CONTROLLER_DIR . 'validationController.php'; 


/** * */
class InfraController extends validation {
    /** * */
    public function __construct() {
        parent::__construct();
        $this->urlSegments = URLController::getSegments();
        $this->init();
    }
    public function init() {
        $this->ODPModel = new ODPModel();
        $this->ODCModel = new ODCModel();
        $this->OltModel = new OltModel();
        $this->session = new session();
        array_shift($this->urlSegments);
        error_reporting(1);
        if ($this->requestMethod === 'GET') {
            if ($this->urlSegments) {
                switch ($this->urlSegments[0]) {
                    case'ODP': 
                        switch ($this->urlSegments[1]) {
                            case'add': return $this->add();
                                break;
                            case'edit': return $this->edit();
                                break;
                            case'hapus': return $this->hapus();
                                break;
                       default: return $this->getODP();
                            break; 
                    }
                    
                    case'ODC': 
                        switch ($this->urlSegments[1]) {
                            case'addodc': return $this->addodc();
                                break;
                            case 'ubah': return $this->ubahodc();
                                break;
                            case 'hapus': return $this->hapus_odc();
                        break;
                        
                    }
                    default: return $this->getODC();
                            break;
                }
            }
        } else if ($this->requestMethod === 'POST') {
            $db = new Database();
            if ($aksi = $_GET['aksi']) {
                if ($aksi == "tambah") {
                    $queryEdit = $this->ODPModel->tambah_odp($_POST['id_odc'], $_POST['nama'], $_POST['port'], $_POST['status']);
                    if($queryEdit == true){
                        $this->session->set('notif_berhasil', 'ODP berhasil ditambah');
                    }else{
                        $this->session->set('notif_gagal', 'ODP gagal ditambah');
                    }
                    header('location: /Infra/ODP');
                    
                    
                } elseif($aksi == "plus") {
                    $queryEdit = $this->ODCModel->tambah_odc($_POST['id_olt'], $_POST['nama'], $_POST['port'], $_POST['status'], $_POST['lat'], $_POST['lng'],date('Y-m-d H:i:s'));
                    if($queryEdit == true){
                        $this->session->set('notif_berhasil', 'ODC berhasil ditambah');
                    }else{
                        $this->session->set('notif_gagal', 'ODC gagal ditambah');
                    }
                    header('location: /Infra/odc');
                    
                    
                } else if ($aksi == "edit") {
                    $id = $_GET['id'];
                    $data['id_odc'] = $_POST['id_odc'];
                    $data['nama'] = $_POST['nama'];
                    $data['port'] = $_POST['port'];
                    $data['status'] = $_POST['status'];
                    $where = ['id' => $id];
                    $queryEdit = $this->ODPModel->edit_odp($data, $where);
                    
                    if($queryEdit == true){
                        $this->session->set('notif_berhasil', 'ODP Berhasil diedit');
                    }else{
                        $this->session->set('notif_gagal', 'ODP gagal diedit');
                    }
                    header('location: /Infra/ODP');
                    
                    
                } else if ($aksi == "ubah") {
                    $id = $_GET['id'];
                    $data['id_olt'] = $_POST['id_olt'];
                    $data['nama'] = $_POST['nama'];
                    $data['port'] = $_POST['port'];
                    $data['status'] = $_POST['status'];
                    $data['latitude'] = $_POST['lat'];
                    $data['longitude'] = $_POST['lng'];
                    $where = ['id' => $id];
                    $queryEdit = $this->ODCModel->ubah_odc($data, $where);
                    
                    if($queryEdit == true){
                        $this->session->set('notif_berhasil', 'ODC Berhasil diedit');
                    }else{
                        $this->session->set('notif_gagal', 'ODC gagal diedit');
                    }
                    header('location: /Infra/ODC');
                    
                }
                
              
            }
        }
    }
    
     // ini adalah function untuk ODP
    public function add() {
        $this->odcall = $this->ODCModel->all();
        $this->title = 'Add ODP - Okebiling';
        $this->layout()->view('addodp', []);
    }
    public function getODP() {
        $this->odpall = $this->ODPModel->all();
        $this->title = 'ODP - Okebiling';
        return $this->layout()->view('odp', []);
    }
    public function edit() {
        $this->odcall = $this->ODCModel->all();
        $idOdp = $this->urlSegments[2];
        $this->odpEdit = $this->ODPModel->getODP($idOdp)->user;
        $this->title = 'Edit ODP';
        $this->layout()->view('editodp', []);
    }
    public function hapus() {
        $idOdp = $this->urlSegments[2];
        $queryEdit = $this->ODPModel->hapus_odp($idOdp);
        if($queryEdit == true){
                        $this->session->set('notif_berhasil', 'ODP Berhasil dihapus');
                    }else{
                        $this->session->set('notif_gagal', 'ODP gagal dihapus');
                    }
        header('location: /Infra/ODP');
    }
    
    // ini adalah function untuk ODC
    public function getODC() {
        $this->odcall = $this->ODCModel->all();
        
        $this->title = 'ODC - Okebiling';
        return $this->layout()->view('odc', []);
    }
    public function addodc() {
        $this->oltall = $this->OltModel->all();
        $this->title = 'Add ODC - Okebiling';
        $this->layout()->view('addodc', []);
    }
    public function ubahodc(){
        $this->oltall = $this->OltModel->all();
        $idOdc = $this->urlSegments[2];
        $this->odcUbah = $this->ODCModel->getODC($idOdc)->user;
        $this->title = 'Edit ODC';
        $this->layout()->view('editodc', []);
    }
    public function hapus_odc(){
        $idOdc = $this->urlSegments[2];
        $queryEdit = $this->ODCModel->hapus_odc($idOdc);
        if($queryEdit == true){
            $this->session->set('notif_berhasil', 'ODC berhasil dihapus');
        }elseif($queryEdit == false){
            $this->session->set('notif_gagal', 'ODC gagal dihapus karena terhubung dengan ODP');
        }
        header('location: /Infra/odc');
    }
    
}
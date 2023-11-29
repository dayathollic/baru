<?php
include_once MODEL_DIR . 'UserModel.php';
include_once CONTROLLER_DIR . 'validationController.php';  
include_once CONTROLLER_DIR . 'SessionController.php';
class dashboardController extends validation{
    private $isLogin;
    private $doLogin;

    public function __construct() {
        //  if(!session::get('logged_in')){
        //      session::destroy();
        //     header("Location:".URLController::getBaseUrl()."/login");
        //     exit(); 
        //  }
        parent::__construct();
        if ($this->requestMethod === 'GET') {
            $this->init();
        } else if ($this->requestMethod === 'POST') {
            $this->processPost();
        }
    }
    public function init() {
        $this->title = 'Dashboard - Okebiling';
        $this->layout()->view('dashboard', $this->LoadLib());
        $this->UserModel = new UserModel();
        $this->session = new session();
        array_shift($this->urlSegments);
        error_reporting(1);
        
    }
  
    public function LoadLib() {
        return [
            'cssLinks' => [            ],
            'scripts' => [            ],
        ];
    }
    
    
}
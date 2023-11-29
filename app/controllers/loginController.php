<?php
include_once MODEL_DIR . 'UserModel.php';
include_once CONTROLLER_DIR . 'SessionController.php';  

/**
 * Controller for handling user login.
 */
class LoginController extends App {
    private $userModel;
    private $password;
    public function __construct(){
        parent::__construct();
        $this->userModel = new UserModel();
        $this->session = new session();
        // print_r(session::get("logged_in"));
        session::destroy();
        if ($this->requestMethod === 'GET') {
            $this->showLoginForm();
        } else if ($this->requestMethod === 'POST') {
            $this->processLogin();
        }
    }
    /**
     * Display the login form.
     */
    public function showLoginForm(){
        $this->title = 'Login - OKEBiling';
        $this->loadLoginForm();
    }
    private function loadLoginForm($error = null, $message = null) {
        $data = [
            'error' => $error,
            'message' => $message,
            'title' => 'Login Error - OKEBiling',
        ];
        $this->layout('loginLayout')->view('login', $data);
    
    }
    private function doLogin(){
        $result = new stdClass();
        if ($this->userModel->authenticateUser($this->username, $this->password)) {
            $result->id    =   $this->userModel->userid;
            $result->error = false;
        } else {
            // Login gagal, atur properti error dan pesan
            $result->error = true;
            $result->message = 'Login gagal. Periksa kembali username dan password Anda.';
        }
        return $result;
    }
    private function login(){
        // Validasi input
        if ($this->requestMethod == 'POST') {
            $this->username = isset($_POST['username']) ? $_POST['username'] : '';
            $this->password = isset ($_POST['password']) ? md5($_POST['password']) : '';
        }
        return $this;
    }
    /**
     * Process the login form submission.
     */
    public function processLogin(){
        $result = $this->login()->doLogin();
      
        if ($result->error) {
            $this->loadLoginForm($result->error, $result->message);
        } else {
            session::set('username',$this->username);
            session::set('_id',$result->id);
            // print_r($this->username. $result->id);
            // exit();
            session::set('logged_in',true);
            header("Location: ".URLController::getBaseUrl()."/dashboard");
            exit();
        }
    }
    
    public function logout(){
        session::destroy();
        header('Location: '.URLController::getBaseUrl().'/login');
        exit();
    }
}

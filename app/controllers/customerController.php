<?php
include_once MODEL_DIR . 'CustomerModel.php';
include_once CONTROLLER_DIR . 'validationController.php'; 

/**
 * 
 */
class customerController extends validation
{
    
    /**
     * 
     */
    public function __construct(){
    parent::__construct();
     $this->urlSegments =URLController::getSegments();
     $this->init();
    }
    
    public function init(){
       $this->CustomerModel = new CustomerModel();
        array_shift($this->urlSegments);
       if ($this->requestMethod === 'GET') {
        if($this->urlSegments){
              switch ($this->urlSegments[0]) {
                  case 'add':
                      return  $this->add();   
                      break;
                  case 'del':
                      break;
                  default:
                      return  $this->getCustomer();   
                      break;
              }
              
              
        }else{
          
        $this->getCustomer();  
        }

        } else if ($this->requestMethod === 'POST') {
            $this->processPost();
        }

    }
    
    
    public function add(){
        $this->title = 'Add Customer - Okebiling';
        $this->layout()->view('addcustomer', []);
        
    } 
    
    
    
    public function getCustomer(){
        
        $this->customerall= $this->CustomerModel->all();
        $this->title = 'Customer - Okebiling';
        return  $this->layout()->view('customer', []);
        
        
    }
}
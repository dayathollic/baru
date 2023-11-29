<?php



include_once MODEL_DIR.'DataModel.php';

define("database_type", "mysql");
define("server", "localhost");
define("database_name", "testbiling");
define("username", "testbiling");
define("password", "testbiling");
define("charset", "utf8");
/**
 * 
 */
class Database{
   /**
     * 
     */
    public function __construct()
    {
    $this->db = new medoo([
            'database_type' => database_type,
            'database_name' => database_name,
            'server' => server,
            'username' => username,
            'password' => password,
        ]);
    }
    
    
}
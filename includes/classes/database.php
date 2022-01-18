<?php

//includes config file with Constants
//require_once('config.php');

class DatabaseClass {

        public $connection;
        public $db;

    function __construct(){

        $this->db = $this->open_db_connection();

    }

    public function open_db_connection(){

        //new version
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        //checks db if connection is OK
            if($this->connection-> connect_errno){
                die("Database connection was not succesfull" . $this->connection-> connect_error);
                } //else {echo 'connection with Database Class established';};
                return $this->connection;
    }

    public function query($sql){

        //new version
        $result = $this->db->query($sql);
        $this->confirm_query($result);

    return $result;

    }

    private function confirm_query($result){
      if(!$result){
          die('Query failed' . $this->db->error);
        }
    }

    public function escape_string($string){

    //new version
    $escaped_string = $this->db->real_escape_string($string);
    return $escaped_string;
    }

}

$databaseClass = new DatabaseClass();



?>

<?php

class SessionClass {

        private $signed_in = false;
        public  $user_id;

    function __construct(){
        session_start();    
    }

    public function is_signed_in(){
       return $this->signed_in;
    }

    public function login($user){

        //if user is logged in
        if($user){ //from User class sets id

            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }

    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }

}

$sessionClass = new SessionClass();

?>

<?php

//language function. Language is STORED in Session
//-------------------------------------------------------------------------
function language(){    
    if(isset($_SESSION['lang'])){        
        include "languages/" .$_SESSION['lang']. ".php";        
    } else {        
       include "languages/en.php"; 
    }
}
//-------------------------------------------------------------------------

//redirect
//-------------------------------------------------------------------------
function redirect($location) {
        header("Location: {$location}");
}
//-------------------------------------------------------------------------
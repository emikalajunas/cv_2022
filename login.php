<?php 

//1. Classes connection
//-------------------------------------------------------------------------
require_once 'includes/init.php';
//-------------------------------------------------------------------------

//1. $_GETs lang, 2. sets $_SESSION, 3. includes language file 
if(isset($_GET['lang']) && !empty($_GET['lang'])){    
    $_SESSION['lang'] = $_GET['lang'];
        if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){ 
            
        //refreshing a page
        echo "<script type='ttext/javascript'>location.reload();</script>";        
    }
}

//2. Language setup function
//-------------------------------------------------------------------------
language();
//-------------------------------------------------------------------------

//3. Login function: checks submition, checks db, sets error message
//-------------------------------------------------------------------------
if(isset($_POST['submit'])){    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

//CHECKS database IS USER THERE (Calling STATIC method with ::)
    $user_found = UserClass::verify_user($username, $password);  

//IF USER IS FOUND in database
if($user_found){
    
    //makes a $_SESSION[] all data
    $sessionClass->login($user_found);
//    $var = $sessionClass->user_id;
//    
//    if ($sessionClass->is_signed_in() == TRUE) {
//        $var2 = "true";
//    } else {
//        $var2 = 'false';
//    }
    redirect("includes/cv.php");
} else {
    $the_message = _LOGIN_ERROR;
    }

} else {
    $username       = null;
    $password       = null; 
    $the_message    = null;
}
//-------------------------------------------------------------------------

?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <?php //echo $sessionClass->user_id;?>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex" />        
<!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
<!-- Custom CSS -->
        <link href="css/styles.css" rel="stylesheet">        
<!--Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,300;1,200&display=swap" rel="stylesheet">
            <title><?php echo _PAGETITLE; ?></title>
  </head>
  <body> 
          <div class="container">
              <div class="row justify-content-md-center">
                    <div class="col-md-6">                                          
<!--Login form start-->                                                
<!--   Language selector start-->
                        <div class="login_page_form">  
                       <form action="" method="get" id="language_form">
                                <select class="form-control mb-4" aria-label="Default select example" name="lang" onchange="changeLanguage()">         
                                  <option value="">Choose language</option>
                                  <option value="en" <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){echo "selected";} ?> >English</option>
                                  <option value="lt" <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'lt'){echo "selected";} ?>>Lietuviškai</option>
                                </select> 
                       </form>
<!--   Language selector end     -->  
<!--   Text inputs block start-->
<!--Error message start-->                            
                           <p><?php echo $the_message; ?></p>                           
<!--Error message end-->                            
                        <form  action="" method="post">
                               <div class="input-group">
                                   <input type="text" name="username" placeholder="<?php echo _LOGIN_USERNAME;?>" class="form-control">
                               </div>
                                <div class="input-group">
                                    <input type="password" name="password" placeholder="<?php echo _LOGIN_PASSWORD;?>" class="form-control">
                               </div> 
                               <div class="login_page_submit_button text-center">
                                    <input type="submit" name="submit" value="<?php echo _LOGIN_BUTTON;?>" class="btn btn-primary"> 
                               </div>
                        </form>
                        </div> 
<!--   Text inputs block end-->                          
<!--Login form end-->                                                                    
                        </div>
                  </div>
          </div>        
    <footer>         
          <div class="login_page_footer">              
              <div class="text-center">
                  <a href="tel:+37067389506"><img src="images/icons/callto_icon.png" alt="Call to Icon" width="40" height="40"></a>     
              </div>
     </div>
    </footer>
<!-- jQuery -->
    <script src="js/jquery.js"></script>    
<!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>
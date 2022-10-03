<?php
//1. Classes connection
//-------------------------------------------------------------------------
require_once 'init.php';
//-------------------------------------------------------------------------

//2. authentification
//-------------------------------------------------------------------------
if(!$sessionClass->is_signed_in()){redirect('logout.php');}
//-------------------------------------------------------------------------

//3. Language setup function
//-------------------------------------------------------------------------
language();
//-------------------------------------------------------------------------

?>
<!DOCTYPE html>
<html lang="en">
  <head>   
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex" />        
<!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">        
<!-- Custom CSS -->
        <link href="../css/styles.css" rel="stylesheet">
<!--Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,300;1,200&display=swap" rel="stylesheet">
            <title><?php echo _PAGETITLE; ?></title> 
  </head>
  <body>
     <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">    
                   <?php $_SESSION['lang'] == 'en' ? include 'tables/table_en.php' : include 'tables/table_lt.php'; ?>   
                </div>
            </div>
     </div>
    <footer>         
          <div class="cv_page_footer">              
              <div class="text-center">
                  <a href="tel:+37067389506"><img src="../images/icons/callto_icon.png" alt="Call to Icon" width="40" height="40"></a>     
              </div>
         </div>
    </footer>  
<!-- jQuery -->
    <script src="../js/jquery.js"></script>    
<!-- Custom JS -->
    <script src="../js/scripts.js"></script>
  </body>
</html>
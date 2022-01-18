<?php 

//---------------- LOCAL adjustmens----------------------------------------------------
//DIRECTORY_SEPARATOR chooses by win or OS / \ separator autom
defined('DS') ? null : define ('DS', DIRECTORY_SEPARATOR); 

//<-Acer pc
define ('SITE_ROOT', DS . 'wampn64' . DS . 'www' . DS . 'cv_2022');

//defines constant  INCLUDES_PATH_CLASSES to get path of classes
defined('INCLUDES_PATH_CLASSES') ? null : define ('INCLUDES_PATH_CLASSES', SITE_ROOT . DS . 'includes' . DS . 'classes');

//defines constant  INCLUDES_PATH to get to includes
defined('INCLUDES_PATH') ? null : define ('INCLUDES_PATH', SITE_ROOT . DS . 'includes');

//connects classes and other files
require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."config.php");
require_once(INCLUDES_PATH_CLASSES.DS."database.php");
require_once(INCLUDES_PATH_CLASSES.DS."core.php");
require_once(INCLUDES_PATH_CLASSES.DS."session.php");
require_once(INCLUDES_PATH_CLASSES.DS."user.php");


//---------------- REMOTE adjustmens----------------------------------------------------
//DIRECTORY_SEPARATOR chooses by win or OS / \ separator 
//remote link /home/addparklt/domains/emsis.lt/public_html/cv_2022
//defined('DS') ? null : define ('DS', DIRECTORY_SEPARATOR); 
//
////<-Acer pc
//define ('SITE_ROOT', DS . 'home' . DS . 'addparklt' . DS . 'domains' . DS . 'emsis.lt' . DS . 'public_html' . DS . 'cv_2022');
//
////defines constant  INCLUDES_PATH_CLASSES to get path of classes
//defined('INCLUDES_PATH_CLASSES') ? null : define ('INCLUDES_PATH_CLASSES', SITE_ROOT . DS . 'includes' . DS . 'classes');
//
////defines constant  INCLUDES_PATH to get to includes
//defined('INCLUDES_PATH') ? null : define ('INCLUDES_PATH', SITE_ROOT . DS . 'includes');
//
////connects classes and other files
//require_once(INCLUDES_PATH.DS."functions.php");
//require_once(INCLUDES_PATH.DS."config.php");
//require_once(INCLUDES_PATH_CLASSES.DS."database.php");
//require_once(INCLUDES_PATH_CLASSES.DS."core.php");
//require_once(INCLUDES_PATH_CLASSES.DS."session.php");
//require_once(INCLUDES_PATH_CLASSES.DS."user.php");

?>
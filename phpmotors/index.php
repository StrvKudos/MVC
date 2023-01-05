<?php  
 // Get the database connection file
 require_once 'library/connection.php';
 // Get the PHP Motors model for use as needed
 require_once  'model/main-model.php';
 // Build a navigation bar using the $classifications array
 require_once 'library/functions.php';
 // Get the array of classifications

 session_start();

 $classifications = getClassifications();


 $navList = "<ul id='primaryNav'>";
 $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
 foreach ($classifications as $classification) {
  $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
 }
 $navList .= '</ul>';

 // Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   }

 $action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
// week 8 cookie
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   }


 switch ($action){
    case 'template':
        include 'view/template.php';
         break;
    default:
            include 'view/home.php';
 }
 ?>
 
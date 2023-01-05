<?php  
 require_once '../library/connection.php';
 require_once  '../model/main-model.php';
 require_once '../model/accounts-model.php';
 require_once '../model/vehicle-model.php';
 require_once '../library/functions.php';
 require_once '../model/reviews-model.php';

 session_start();
 $classifications = getClassifications();

 //Navigation
 $navList = '<ul>';
 $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
 foreach ($classifications as $classification) {
  $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
 }
 $navList .= '</ul>';

 $action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 

//LOG IN MY ACCOUNT
switch ($action){
     case 'login':
          include '../view/login.php';
          break;
     case 'Login':
               $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
               $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
              
               $clientEmail = checkEmail($clientEmail);
               $checkPassword = checkPassword($clientPassword);
            
               if(empty($clientEmail) || empty($checkPassword)){
                   $message = '<p>Please provide information for all empty form fields.</p>';
                   include '../view/login.php';
                   exit; 
               }
               $clientData = getClient($clientEmail);
               $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);

               if(!$hashCheck){
                 $message = '<p class="notice">Please check your password and try again.</p>';
                 include '../view/login.php';
                 exit;
               }
          
               $_SESSION['loggedin'] = TRUE;
               
               array_pop($clientData);
               $_SESSION['clientData'] = $clientData;

               include '../view/admin.php';
               break;
               
     case 'Logout':
          session_unset(); 
          session_destroy();
          header('Location: /phpmotors/');
          
          break;

     case 'registration':
          include '../view/registration.php';
          break;



     case 'register':
          // echo 'You are in the register case statement.';
          //FirstName 
          $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
          //LastName
          $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname' , FILTER_SANITIZE_FULL_SPECIAL_CHARS));
          //Email
          $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
          $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

          $existingEmail = checkExistingEmail($clientEmail);

          // Check for existing email address in the table
          if($existingEmail){
           $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
           include '../view/registration.php';
           exit;
          }
          //Functions
          $clientEmail = checkEmail($clientEmail);
          $checkPassword = checkPassword($clientPassword);

          //Empty error
          if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
               $message = '<p>Please provide information for all empty form fields.</p>';
               include '../view/registration.php';
          exit; }

          
          //Password Hashing
          $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);


          // Send the data to the model
          $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

          // Check and report the result
          if($regOutcome === 1){
               setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
               $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
               include '../view/login.php';
               exit;
          }
          else {
               $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
               include '../view/registration.php';
               exit;
          }

          case 'adminpage':

            $clientId = $_SESSION['clientData']['clientId'];
            $reviewsCL = getReviewsByClient($clientId);
            $reviewAdminDisplay = buildReviewsAdminDisplay($reviewsCL);
          

            include '../view/admin.php';
            exit;
            break;


          case 'mod':

               include '../view/client-update.php';
               exit;
              break;

          case 'updateclient':
               if($_SESSION['clientData']['clientEmail'] == trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL))){
                   $clientEmail = $_SESSION['clientData']['clientEmail'];
               } else {
               $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
       
                   $emailExisting = isEmailExist($clientEmail);
       
                   if($emailExisting){
                       $account_message = '<p class="notice">That email address already exists. Please choose input a different email.</p>';
                       include '../view/client-update.php';
                       exit;
                   }
       
                   $clientEmail = checkEmail($clientEmail);
               }
       
               $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
               $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
               $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
              
               if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
                   $account_message = '<p>Please provide valid information for all of the fields.</p>';
                   include '../view/client-update.php';
                   exit; 
               }
       
               $updateResult = updateClient($clientEmail, $clientFirstname, $clientLastname, $clientId);
       
               if($updateResult){
                   $message = "<p class='notify'>Congratulations, your account has been successfully updated.</p>";
                   $_SESSION['message'] = $message;
                   $clientData = getClientById($clientId);
                   array_pop($clientData);
                   $_SESSION['clientData'] = $clientData;
       
                   header('location: /phpmotors/accounts/');
       
                   exit;
               } else {
                   $message = "<p>Sorry, your account has not been updated successfully.</p>";
                   header('location: /phpmotors/accounts/');
       
                   exit;
               }
               
               break;
          


               case 'updatepassword':
                    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                    $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        
                    $checkPassword = checkPassword($clientPassword);
        
                    if(empty($checkPassword)){
                        $password_message = '<p>Please provide valid information for password field</p>';
                        include '../view/client-update.php';
                        exit; 
                    }
        
                    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
                    $updateResult = updateClientPassword($hashedPassword, $clientId);
        
                    if($updateResult){
                        $message = "<p class='notify'>Congratulations, your password has been successfully updated.</p>";
                        $_SESSION['message'] = $message;
            
                        header('location: /phpmotors/accounts/');
            
                        exit;
                    } else {
                        $message = "<p>Sorry, your password has not been updated successfully.</p>";
                        header('location: /phpmotors/accounts/');
            
                        exit;
                    }
           




     default:
   

               include '../view/admin.php';
          break;
     
          }

 ?>
 
<?php

// Image Uploads Controller

session_start();

require_once '../library/connection.php';
require_once '../model/main-model.php';
require_once '../model/vehicle-model.php';
require_once '../model/upload-model.php';
require_once '../model/reviews-model.php';
require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
//$navList = buildNavigation($classifications);




$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
switch ($action) {
    case'addReview':
        $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING));
        $invId = $_SESSION['details'][0]['invId'];
        $invModel = $_SESSION['details'][0]['invModel'];
        $clientId = $_SESSION['clientData']['clientId'];




        if (empty($reviewText)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/vehicle-detail.php';
            exit; 
           }

           $reviewOutcome = addReview($reviewText, $invId, $clientId);

           if($reviewOutcome === 1) {
            $message = "<p>Your new review was added successfully</p>";
            include '../view/vehicle-detail.php';
            exit;
         } else {
            $message = "<p>Sorry, your review was not added.</p>";
            include '../view/vehicle-detail.php';
            exit;
         }



        break;

        case 'delrevs':
            $clientId = $_SESSION['clientData']['clientId'];
          //$reviewsCL = getReviewsByClient($clientId);
            $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
            $reviewInfo = getInfoByReview($reviewId);
            $invId = $reviewInfo['invId'];
            $invInfo = getInvItemInfo($invId);
            //var_dump($reviewInfo);
            //exit;
            if (count($reviewInfo) < 1) {
                  $message = 'Sorry, no review information could be found.';
               }
               include '../view/review-delete.php';
               exit;
               break;

               
        case 'modrevs':
            $clientId = $_SESSION['clientData']['clientId'];
          //$reviewsCL = getReviewsByClient($clientId);
            $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
            $reviewInfo = getInfoByReview($reviewId);
            $invId = $reviewInfo['invId'];
            $invInfo = getInvItemInfo($invId);
            //var_dump($reviewInfo);
            //exit;
            if (count($reviewInfo) < 1) {
                  $message = 'Sorry, no review information could be found.';
               }
               include '../view/review-modify.php';
               exit;
               break;

              case 'deleteReview':
           $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
         $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
         $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
         $deleteResult = deleteReview($reviewId);
         if ($deleteResult) {
             $message = "<p class='notice'>Congratulations the, review was	successfully deleted.</p>";
             $_SESSION['message'] = $message;
             header('location: /phpmotors/reviews/');
             exit;
         } else {
             $message = "<p class='notice'>Error: the review was not
         deleted.</p>";
             $_SESSION['message'] = $message;
             header('location: /phpmotors/reviews/');
             exit;
         }

               break;
         case 'modifyReview':

           //$reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
           $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
           $reviewInfo = getInfoByReview($reviewId);
           $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
           $reviewDate = $reviewInfo['reviewDate'];
           $invId = $reviewInfo['invId'];
           $clientId = $reviewInfo['clientId'];


           
           $modifyResult = updateReview($reviewId, $reviewText, $invId, $clientId);

           if ($modifyResult) {
               $message = "<p class='notice'>Congratulations the, review was successfully modified.</p>";
               $_SESSION['message'] = $message;
               header('location: /phpmotors/reviews/');
               exit;
           } else {
               $message = "<p class='notice'>Error: the review was not
           changed.</p>";
               $_SESSION['message'] = $message;
               header('location: /phpmotors/reviews/');
               exit;
           }
    
                  break;

        
         
 
        default:
        include '../view/admin.php';
        exit;
        break;


        
    }
?>
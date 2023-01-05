<?php  
// Get the database connection file
require_once '../library/connection.php';
// Get the PHP Motors model for use as needed
require_once  '../model/main-model.php';


// Build a navigation bar using the $classifications array
require_once '../model/accounts-model.php';
require_once '../model/vehicle-model.php';
require_once '../model/upload-model.php';
require_once '../model/reviews-model.php';

require_once '../library/functions.php';

 // Get the accounts model

// Get the array of classifications

 session_start();

$classifications = getClassifications();

$navList = navList($classifications);

$action = filter_input(INPUT_POST, 'action');

if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}
 
switch ($action){
    case "add_classification":
        include "../view/add-classification.php";
        break;

    case "save_classification":
        $classificationName = filter_input(INPUT_POST, 'classificationName');

        if(empty($classificationName)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-classification.php';
            exit;
        }

        $regOutcome = addCarClassification($classificationName);

        if($regOutcome === 1){
            header('Location: http://localhost/phpmotors/vehicle');
            exit;
        } else {
            include '../view/add-classification.php';
            exit;
        }

    case 'addvehicle';
        include '../view/addvehicle.php';
        break;

    //Add Vehicle 
    case 'save_vehicle':
        // Filter and store the data
        $invMake = trim(filter_input(INPUT_POST, 'invMake',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invModel = trim(filter_input(INPUT_POST, 'invModel',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invDescription = trim(filter_input(INPUT_POST, 'invDescription',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invImage = trim(filter_input(INPUT_POST, 'invImage',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invStock = trim(filter_input(INPUT_POST, 'invStock',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invColor = trim(filter_input(INPUT_POST, 'invColor',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));

        // Check for missing data
        if(empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || 
            empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/addvehicle.php';
            exit;
        }
    
        // Send the data to the model
        $regOutcome = regInventory($invMake, $invModel,$invDescription,$invThumbnail,$invImage, $invStock, $invColor, $invPrice,  $classificationId);

        // Check and report the result
        if($regOutcome === 1){
            $message = "<p> $invModel has been added successfully</p>";
            include '../view/addvehicle.php';
            exit;
        } else {
            $message = "<p>Sorry $invModel addition has failed. Please try again.</p>";
            include '../view/addvehicle.php';
            exit;
        }

    
    case 'getInventoryItems': 
            // Get the classificationId 
            $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
            // Fetch the vehicles by classificationId from the DB 
            $inventoryArray = getInventoryByClassification($classificationId); 
            // Convert the array to a JSON object and send it back 
            echo json_encode($inventoryArray); 
            break;
       
    


    case 'updateVehicle':
                $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
                $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
                $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
                
                if (empty($classificationId) || empty($invMake) || empty($invModel) 
                || empty($invDescription) || empty($invImage) || empty($invThumbnail)
                || empty($invPrice) || empty($invStock) || empty($invColor)) {
              $message = '<p>Please complete all information for the item! Double check the classification of the item.</p>';
                 include '../view/vehicle-update.php';
             exit;
            }
            
            $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
            if ($updateResult) {
             $message = "<p class='notice'>Congratulations, the $invMake $invModel was successfully updated.</p>";
                $_SESSION['message'] = $message;
                header('location: /phpmotors/vehicle/');
                exit;
            } else {
                $message = "<p class='notice'>Error. the $invMake $invModel was not updated.</p>";
                 include '.. /view/vehicle-update.php';
                 exit;
                }
            break;
    case 'mod':
                $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
                $invInfo = getInvItemInfo($invId);
                if(count($invInfo)<1){
                 $message = 'Sorry, no vehicle information could be found.';
                }
                include '../view/vehicle-update.php';
                exit;
               break;


    case 'del':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
		$message = 'Sorry, no vehicle information could be found.';
	}
	    include '../view/vehicle-delete.php';
	    exit;
	    break;

	case 'deleteVehicle':
            $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
            
            $deleteResult = deleteVehicle($invId);
            if ($deleteResult) {
                $message = "<p class='notice'>Congratulations the, $invMake $invModel was	successfully deleted.</p>";
                $_SESSION['message'] = $message;
                header('location: /phpmotors/vehicle/');
                exit;
            } else {
                $message = "<p class='notice'>Error: $invMake $invModel was not
            deleted.</p>";
                $_SESSION['message'] = $message;
                header('location: /phpmotors/vehicle/');
                exit;
            }
            break;			

        case 'classification':
            $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $vehicles = getVehiclesByClassification($classificationName);
            if(!count($vehicles)){
             $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
            } else {
             $vehicleDisplay = buildVehiclesDisplay($vehicles);
            }
            include '../view/classification.php';
            break;
       
            
    
            case 'getVehicleDetail':
             
                $invId = filter_input(INPUT_GET, 'valueId', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $vehicleDetail = getInvItemInfo($invId);
                $assocThumbnail = getThumbnailById($invId);


                $invModel = filter_input(INPUT_GET, 'invModel', FILTER_SANITIZE_STRING);
                $details = getDetailsByVehicles($invModel);
                $invModel = filter_input(INPUT_GET, 'invModel', FILTER_SANITIZE_STRING);
                // reviews-model.php
                $reviews = getReviewsByVehicle($invModel);
               
                if (count($vehicleDetail)<1) {
                    $message = 'Sorry, no vehicle information could be found';
                }
                else{
                    $vehicleDetailDisplay = displayVehicleDetail($vehicleDetail, $assocThumbnail);
                     //    buildReviewsDisplay($reviews) in library/functions
                   $reviewDisplay = buildReviewsDisplay($reviews);
                }
                $_SESSION['details'] = $details;
                            include '../view/vehicle-detail.php';  
                         
            break;
           
            // case 'vehicle-detail':
            //     echo ('good');
            //     exit;
            //     $invModel = filter_input(INPUT_GET, 'invModel', FILTER_SANITIZE_STRING);

            //     // vehicle-mode.php
            //     $details = getDetailsByVehicles($invModel);

            //     // reviews-model.php
            //     $reviews = getReviewsByVehicle($invModel);
            //     //$invId = $_SESSION['details'][0]['invId'];
            //     //var_dump($details[0]['invModel']);
            //     //exit;
            //     $invModel = $details[0]['invModel'];
               
            //     if(!count($details)){
            //        $message = "<p class='notice'>Sorry, no $invModel details could be found.</p>";
            //       } else {
            //     // buildVehiclesDetailDisplay($details);in library/functions 
            //        $detailDisplay = buildVehiclesDetailDisplay($details);
            //     //    buildReviewsDisplay($reviews) in library/functions
            //        $reviewDisplay = buildReviewsDisplay($reviews);
       
       
        
            //       }
                 
       
            //       $_SESSION['details'] = $details;
            //     include '../view/vehicle-detail.php';
           
            //     break;
    default:

        $classificationList = buildClassificationList($classifications);


        include '../view/veh-man.php';
        break;
}
?>
 
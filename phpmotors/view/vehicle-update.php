<?php 
// Build dynamic select using the $classifications array
$classificationList = '<select name="classificationId">';

$classificationList .= '<option value="0" selected>Choose Car Classification</option>';

foreach($classifications as $classification){
    $classificationList .= "<option value='$classification[classificationId]' ";
    
    if(isset($classificationId)){
        if($classificationId == $classification['classificationId']){
            $classificationList .= "selected";
        }
    }
    else if (isset($invInfo['classificationId'])) {
        if($invInfo['classificationId'] == $classification['classificationId']){
            $classificationList .= "selected";
        }
    }

    $classificationList .= " >$classification[classificationName]</option>";
}

$classificationList .= '</select>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="phpmotors"                                 content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
            if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	            echo "Modify $invInfo[invMake] $invInfo[invModel]";
            } elseif(isset($invMake) && isset($invModel)) { 
		        echo "Modify $invMake $invModel"; 
            }
        ?> 
        | PHP Motors
    </title>
    <link href="../css/small.css" rel="stylesheet">
    <link href="../css/week1.css" rel="stylesheet">
</head>                          
<body>
<header>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
</header>
    <nav> 
         <?php //require $_SERVER['DOCUMENT_ROOT'] .'/snippets/nav.php';?> 
        <?php echo $navList; ?>
    </nav>
<main class="form_class"> 


    <h1>
                <?php 
                    if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	                    echo "Modify $invInfo[invMake] $invInfo[invModel]";
                    } elseif(isset($invMake) && isset($invModel)) { 
	                    echo "Modify$invMake $invModel"; 
                    }
                ?>
    </h1>
    


    <h3 > Vehicle Management</h3>

    
    <?php if (isset($message)) {
 echo $message; }?>
<form action="/phpmotors/vehicle/index.php" method="POST">
  <div  class="form-div car-classification">
                    <label>Classification</label>
                    <?php echo $classificationList ?>
  </div>
  <br>
  <!-- make -->
  <label for="invMake" >Make:</label><br>
  <input type="text" id="invMake" name="invMake" <?php
  if(isset($invMake)){ echo $invMake; }
  elseif(isset($invInfo['invMake'])) 
  {echo "value='$invInfo[invMake]'"; }
  ?> required>
  <br>
  <!-- model -->
  <label for="invModel">Model:</label><br>
  <input type="text" id="invModel" name="invModel" <?php if(isset($invModel)){ echo $invModel; }
  elseif(isset($invInfo['invModel']))
  {echo "value='$invInfo[invModel]'"; }?> required>
  <br>
  <!-- Description -->
  <label for="invDescription">Description:</label><br>
  <input type="text" id="invDescription" name="invDescription" <?php 
  if(isset($invDescription)){ echo $invDescription; }
  elseif(isset($invInfo['invDescription']))
  {echo "value='$invInfo[invDescription]'"; }?> required>
  <br>
  <!-- Thumbnail -->
  <label for="invThumbnail">Thumbnail:</label><br>
  <input type="text" id="invThumbnail" name="invThumbnail"
  <?php 
  if(isset($invThumbnail)){ echo $invThumbnail ;} 
  elseif(isset($invInfo['invThumbnail'])) 
  {echo "value='$invInfo[invThumbnail]'"; }?> required>
  <br>
  <!-- Image Path -->
  <label for="invImage" >Image Path:</label><br>
  <input type="text" id="invImage" name="invImage" <?php if(isset($invImage)){ echo $invImage ;} 
  elseif(isset($invInfo['invImage']))
  {echo "value='$invInfo[invImage]'"; }?>">
  <br>
  <!-- In Stock -->
  <label for="invStock"> In Stock:</label><br>
  <input type="text" id="invStock" name="invStock" <?php
  if(isset($invStock)){ echo $invStock; }
  elseif(isset($invInfo['invStock']))
  {echo "value='$invInfo[invStock]'"; }?> required>
  <br>
  <!-- Color -->
  <label for="invColor">Color:</label><br>
  <input type="text" id="invColor" name="invColor" <?php if(isset($invColor)){ echo $invColor; }
  elseif(isset($invInfo['invColor']))
  {echo "value='$invInfo[invColor]'"; }?> required>
  <br>
  <!-- Price -->
  <label for="invPrice">Price:</label><br>
  <input type="text" id="invPrice" name="invPrice" <?php if(isset($invPrice)){ echo $invPrice; } 
  elseif(isset($invInfo['invPrice']))
  {echo "value='$invInfo[invPrice]'"; }?> required>
  <br>
  <br>
  <input type="submit" name="submit" value="Update Vehicle">
  <input type="hidden" name="action" value="updateVehicle">
  <input type="hidden" name="invId" value="
 <?php
 if(isset($invInfo['invId']))
 {echo $invInfo['invId'];} 
 elseif(isset($invId)){ echo $invId; } ?>
">
  <br>

</form>  



    </main>

<footer>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
       </footer>


       <style>   /*FORM*/
main form{
        margin-left:10px;
    }
    form label {
        font-size:25px;
    }
    .SignInput{
        background-color:lightblue;
        text-align:center;
        font-size:20px;
        padding: 5px 5px 5px 5px;
        color:black;}
    
    header {
      display:flex; 
      justify-content:flex-end;
    
       } 
    header a {
        font-size:30px;
        margin-top:50px;
       text-decoration:none;
       padding:20px;
      }
    header img {
        margin-right:auto;
    }
    nav ul li a{
        text-decoration:none;
        color:white;
       }
    h3 {
        font-size:40px;
    }
     
    </style>
</body>



</html>
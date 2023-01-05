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
    <title>phpmotors</title>
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
  <input type="text" id="invMake" name="invMake" value="<?php if(isset($invMake)){ echo $invMake; }?>" required>
  <br>
  <!-- model -->
  <label for="invModel">Model:</label><br>
  <input type="text" id="invModel" name="invModel" value="<?php if(isset($invModel)){ echo $invModel; }?>" required>
  <br>
  <!-- Description -->
  <label for="invDescription">Description:</label><br>
  <input type="text" id="invDescription" name="invDescription" value="<?php if(isset($invDescription)){ echo $invDescription; }?>" required>
  <br>
  <!-- Thumbnail -->
  <label for="invThumbnail">Thumbnail:</label><br>
  <input type="text" id="invThumbnail" name="invThumbnail" value= "<?php if(isset($invThumbnail)){ echo $invThumbnail ;} else { echo "../images/no-image.png"; }?>" required>
  <br>
  <!-- Image Path -->
  <label for="invImage" >Image Path:</label><br>
  <input type="text" id="invImage" name="invImage" value="<?php if(isset($invImage)){ echo $invImage ;} else { echo "../images/no-image.png"; }?>">
  <br>
  <!-- In Stock -->1   2
  <label for="invStock"> In Stock:</label><br>
  <input type="text" id="invStock" name="invStock" value="<?php if(isset($invStock)){ echo $invStock; }?>" required>
  <br>
  <!-- Color -->
  <label for="invColor">Color:</label><br>
  <input type="text" id="invColor" name="invColor" value="<?php if(isset($invColor)){ echo $invColor; }?>" required>
  <br>
  <!-- Price -->
  <label for="invPrice">Price:</label><br>
  <input type="text" id="invPrice" name="invPrice" value="<?php if(isset($invPrice)){ echo $invPrice; }?>" required>
  <br>
  <br>
  <input type="submit" name="submit" value="Addvehicle">
  <input type="hidden" name="action" id="regbtn" value="save_vehicle">
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
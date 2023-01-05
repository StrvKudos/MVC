<?php
    if(!isset($_SESSION['loggedin'])){
        header("Location: /phpmotors/");
    } else if ($_SESSION['clientData']['clientLevel'] == 1){
        header("Location: /phpmotors/");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
            if(isset($invInfo['invMake'])){ 
	            echo "Delete $invInfo[invMake] $invInfo[invModel]";
            } 
        ?> | PHP Motors
    </title>
    <link href="../css/small.css" rel="stylesheet">
    <link href="../css/week1.css" rel="stylesheet">
   
</head>
<body>
    <div class="content">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        </header>

        <nav>
            <?php
            //  require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';
                echo $navList;
            ?>
        </nav>

        <main>
            <h1>
                <?php 
                    if(isset($invInfo['invMake'])){ 
	                    echo "Delete $invInfo[invMake] $invInfo[invModel]";
                    } 
                ?>
            </h1>

            <div class="error-message">
                <?php
                    if(isset($message)){
                        echo $message;
                    }
                ?>
            </div>

<form action="/phpmotors/vehicle/index.php" method="POST">
      <!-- make -->
    <div class="form-div">
        <label for="invMake">Make</label><br>
        <input type="text" name="invMake" id="invMake" readonly <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>
    </div>
    <!-- model -->
    <div class="form-div">
        <label for="invModel">Model</label><br>
        <input type="text" name="invModel" id="invModel" readonly <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>
    </div>
    <!-- Description -->
    <div class="form-div">
        <label for="invDescription">Description</label><br>
        <input type="text" name="invDescription" id="invDescription" readonly <?php if(isset($invDescription)){ echo "value='$invDescription'"; } elseif(isset($invInfo['invDescription'])) {echo "value='$invInfo[invDescription]'"; }?>>
    </div>


     <!-- The submit input -->
     <div class="Update-Vehicle">
     <input type="submit" name="submit" value="Delete Vehicle">
     </div>
    <!-- The submit input -->
        <input type="hidden" name="action" value="deleteVehicle">
        <input type="hidden" name="invId" value="
        <?php 
            if(isset($invInfo['invId'])){
                echo $invInfo['invId'];
            } 
        ?>
        ">
    </div>
            </form>
        </main>

        <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>


<style>
    .Update-Vehicle input {
        margin-top:30px;
    }     
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
</html>
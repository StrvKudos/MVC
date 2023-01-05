<?php
    if(!isset($_SESSION['loggedin'])){
        header("Location: /phpmotors/");
    } else if ($_SESSION['clientData']['clientLevel'] == "1"){
        header("Location: /phpmotors/");
    }

    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
    }
?><!DOCTYPE html>
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
        <?php echo $navList; ?>
    </nav>
<main class="form_class"> 
    <h3 > Vehicle Management</h3>
    <ul>
        <li><a href="/phpmotors/vehicle/index.php?action=add_classification">Add Classification</a></li>
        <li><a href="/phpmotors/vehicle/index.php?action=addvehicle">Add Vehicle</a></li>
    </ul>


    <?php

        if (isset($message)) { 
        echo $message; 
        } 
        if (isset($classificationList)) { 
        echo '<h2>Vehicles By Classification</h2>'; 
        echo '<p>Choose a classification to see those vehicles</p>'; 
        echo $classificationList; 
        }
      
    ?>


    <noscript>
                <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
    </noscript>
    <?php
    // echo(buildInventoryList(data));
    // exit;
    ?>
    <table id="inventoryDisplay"></table>


</main>


   




<footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</footer>

<script src="../js/inventory.js"></script>
</body>

<style>   
/*FORM*/
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



</html><?php unset($_SESSION['message']); ?>
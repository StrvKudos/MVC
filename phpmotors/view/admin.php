<?php 
    if($_SESSION['loggedin'] != 1){
       header('Location: /phpmotors/');
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/adminsmall.css" rel="stylesheet">
    <link href="../css/adminweek1.css" rel="stylesheet">
    <title>Admin | PHP Motors</title>
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
            <h1><?php echo $_SESSION['clientData']['clientFirstname'] . " " . $_SESSION['clientData']['clientLastname'] ?></h1>

            <div class="works">
            <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }
            ?>
            </div>
            <ul>
          
                <li>First Name: <?php echo $_SESSION['clientData']['clientFirstname'] ?></li>
                <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname'] ?></li>
                <li>Email: <?php echo $_SESSION['clientData']['clientEmail'] ?></li>
            </ul>
            <div class="admin-div">

        
            <?php 
            if (isset($message)) {
                echo $message;
            
                } 
            


                if($_SESSION['clientData']['clientLevel'] != 1){
                    echo "<h1>Account Management: </h1>";
                    echo "<p>Use this link to account management</p>";
                    echo "<a href='/phpmotors/accounts/index.php?action=mod'>Account Management</a>";
                }
            ?>
          

    


            <?php 
                if($_SESSION['clientData']['clientLevel'] != 1){
                    echo "<h1>Inventory Management: </h1>";
                    echo "<p>Use this link to manage the inventory</p>";
                    echo "<a href='/phpmotors/vehicle'>Vehicle Management</a>";
                }
            ?>
               </div>


               
        <h2>Review Management</h2>
            <p>You may modify your reviews here:</p>

            
            <?php if(isset($reviewAdminDisplay)){
        echo $reviewAdminDisplay;
        } ?>





        </main>

        <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>

    </div>
    <script></script>
</body>
</html>


<img src="images/logo.png" alt="logotop">
     <!--   <a href="/phpmotors/accounts/index.php?action=login">My Account</a> -->

 <?php 
        if(!isset($_SESSION['loggedin'])){
           echo "<a class='my-account-link' href='/phpmotors/accounts/index.php?action=login'>My Account</a>";
        } else {
            echo "-<a href='/phpmotors/accounts/index.php?action=Logout' class='my-account-link'>Logout</a>" . "<a href='/phpmotors/accounts' class='my-account-link'>Welcome " . $_SESSION['clientData']['clientFirstname'] . " </a>";
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/smallvehicle.css" rel="stylesheet">
    <link href="../css/largevehicle.css" rel="stylesheet">

    <title>Update Account | PHP Motors
</title>
</head>
<body>
<div class="content">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        </header>


        <nav>
        <?php echo $navList; ?>
   </nav>
        
<main>
            <h1>Update Account Information</h1>

            <div class="error-message">
                <?php
                    if(isset($account_message)){
                        echo $account_message;
                    }

                    if(isset($message)){
                        echo $message;
                    }
                ?>
            </div>

<form action="/phpmotors/accounts/index.php" method="POST" class="f1">
    <div>
        <label for="clientFirstname">
First Name
        </label>
        <br>
        <input type="text" name="clientFirstname" id="clientFirstname" required value="<?php if(isset($_SESSION['clientData'])){echo $_SESSION['clientData']['clientFirstname'];} else { echo $clientFirstname; } ?>">
      
    </div>

    <div class="last-name form-div">
        <label for="clientLastname">
        Last Name
        </label>
        <br>
        <input type="text" name="clientLastname" id="clientLastname" required value="<?php if(isset($_SESSION['clientData'])){echo $_SESSION['clientData']['clientLastname'];} else { echo $clientLastname; } ?>">
    </div>

    <div class="email form-div">
        <label for="clientEmail">
         Email
        </label>
        <br>
        <input type="email" name="clientEmail" id="clientEmail" required value="<?php if(isset($_SESSION['clientData'])){echo $_SESSION['clientData']['clientEmail'];} else { echo $clientEmail; } ?>">
        
    </div>

    <div class="Update-Vehicle">
    <input type="submit" name="submit" value="UpdateAccount">
    
        <input type="hidden" name="action" value="updateclient">
        <input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
    </div>
</form>

<h1 class="headtwo">Update Password</h1>

<div class="error-message">
    <?php
        if(isset($password_message)){
echo $password_message;
        }
    ?>
</div>

<form action="/phpmotors/accounts/index.php" method="POST">
    <div class="password form-div">
        <label for="clientPassword">Password</label>
        <br>
        <span>*This will update your password and cannot be undone</span><br>
        <span>*Passwords must be atleast 8 characters and contains at least 1 number, 1 capital letter, and 1 special character</span>
        <br>
        <br>
        <input 
type="password" 
name="clientPassword" 
id="clientPassword" 
pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
required
        >
    </div>

        <div class="Update-Vehicle">
        <input type="submit" name="submit" value="UpdatePassword">
        </div>
<input type="hidden" name="action" value="updatepassword">
<input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
        
    
</form>

        </main>

        <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
</div>
</body>


</html>
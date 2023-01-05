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
        <img src="/images/logo.png" alt="logotop">
        <h1>
        My Account
        </h1>
    </header>
    <nav>
        <?php //require $_SERVER['DOCUMENT_ROOT'].'/snippets/nav.php';?
        echo $navList; ?>
    </nav>
    <main class="form_class"> 
    <?php
    if (isset($message)) {
    echo $message;

    }  
?>
<form action="/phpmotors/accounts/index.php" method="post">
<!-- firstname -->
  <label for="fName" >First Name</label><br>
  <input type="text" id="fName" name="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}?> required ><br>
  <!-- lastname -->
  <label for="lName">Last Name</label><br>
  <input type="text" id="lName" name="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}?> required  ><br><br>
  <!-- email -->
  <label for="email">Email</label><br>
  <input type="email" id="email" name="clientEmail" placeholder="Enter a valid email address" 
  <?php if(isset($clientEmail)){echo "value='$clientEmail'";}?> required><br><br>
  <!-- password -->
  <label for="password">Password</label><br>
  <input type="text" id="password" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"> <br><br>
  <!-- input -->
  <input type="submit" name="submit" id="regbtn" value="register">
  <input type="hidden" name="action" value="register">
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
    header a {
        font-size:40px;
        margin-top:50px;
       margin-left:600px;
       text-decoration:none;
      }
    nav ul li a{
        text-decoration:none;
        color:white;
       }
    
    </style>
</body>



</html>
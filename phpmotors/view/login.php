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
   <?php 
   echo $navList; ?>
    </nav>
    <?php
        if (isset($message)) {
            echo $message;
        }
    ?>
<main class="form_class">
    <form action="/phpmotors/accounts/" method="post">
   

        <label >Email</label><br>
        <input type="email"  name="clientEmail" id="clientEmail" required value="<?php if(isset($clientEmail)){echo $clientEmail;}  ?>" ><br>
        <br>
        <span>Passwords must be atleast 8 characters and contains at least 1 number,1 capital letter, and 1 special character</span><br>
        <label>Password:</label><br>
        <input type="text"
               name="clientPassword"
               id="clientPassword" 
               pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required ><br><br>


        <input type="submit" value="Sign-In" size="6" class="SignInput">


        <input type="hidden" name="action" value="Login">
    </form> 
<a class="reg_link" href="/phpmotors/accounts/index.php?action=registration">Not a member yet</a>
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
        color:black;
    }
    header{
        display:flex; 
      justify-content:flex-end;
    
    }
    header a {
        font-size:30px;
        margin-top:50px;
       text-decoration:none;
       margin-right:20px;
      }
    header img {
        margin-right:auto;
       
    }
    nav ul li a{
        text-decoration:none;
        color:white;
       }
    .reg_link{
        margin-top:20px;
        margin-left:10px;
        font-size:20px;
        
      
    }
    </style>
    </main>
<footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</footer>
</body>

</html>
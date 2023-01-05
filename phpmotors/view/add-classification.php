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
   <?php //require $_SERVER['DOCUMENT_ROOT'].'/snippets/nav.php';?
   echo $navList; ?>
    </nav>
    <main class="form_class"> 
<h2 > Add Car Classification</h2>
<form action="/phpmotors/vehicle/index.php" method="POST">
    <label for="classificationName" >Classification Name</label><br>
    <input  type="text" id="classificationName" name="classificationName"   
        value="<?php if(isset($classificationName))
        { echo $classificationName;}?>" required><br>
    <br>
    <input type="submit">
    <input type="hidden" name="action" value="save_classification">
</form>

<!-- YES -->


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
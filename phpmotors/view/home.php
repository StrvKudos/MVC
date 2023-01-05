<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="phpmotors"                                 content="width=device-width, initial-scale=1.0">
    <title>phpmotors</title>
    <link href="css/home/small.css" rel="stylesheet">
    <link href="css/home/medium.css" rel="stylesheet">
    <link href="css/home/large.css" rel="stylesheet">
    <link href="css/home/nomral.css" rel="stylesheet">

</head>                          
<body>
    <header class="heads">
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header2.php'; ?>
    </header>
    <nav>
    <button id=humbergerBtn>&#9776;</button>

   <?php echo $navList; ?>
    </nav>
    <main>
        <div class="phphead">
            <h1>Welcome to PHP Motors</h1>  
            <div class="cup">
           
                    <p>3 Cup Holders Superman doors Fuzzy Dice</p>
                    <button>Own Today</button>
                </div>
                <a href="view/veh-man.php"><img src="images/delorean.jpg" alt="delorean" ></a>
            
        </div>
        <div class="main-2">
        <div class="upgrade">
                <h2> Dolorean Upgrades
                </h2>
                <div></div>
              <div class="dolups">
                <img src="images/flux-cap.png" alt="flex"><p>Flux Capacitor</p>
              </div>
              <div class="dolups">
                <img src="images/flame.jpg" alt="flamable"><p>Flame Decals</p>
              </div>
              
              <div class="dolups">
                <img src="images/bumper_sticker.jpg" alt="bumperstcks"><p>Bumper Stickers</p>
              </div >
              <div class="dolups">
                <img src="images/hub-cap.jpg" alt="hubcaps"><p>Hub Caps</p>
              </div>
            </div>
        <div class="dolor">
            <h3> DMC Dolorean Review
            </h3>
           <ol><li>"So fast its almost like traveling in time." (4/5)</li>
           <li>"80's livin and I love it" (5/5)</li>
           </ol>
        </div>
    </div>

    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php';?>
       </footer>
      
</body>
<script src="js/nav.js"></script>
</html>
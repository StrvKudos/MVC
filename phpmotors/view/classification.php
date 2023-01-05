<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/smallvehicle.css" rel="stylesheet">
    <link href="../css/largevehicle.css" rel="stylesheet">
    <title><?php echo $classificationName; ?> vehicle | PHP Motors, Inc.</title>
</head>
<body>
    <div id="cover_div">
        <header>
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php'; ?>
        </header>
        <nav id="nav_bar">
            <?php echo $navList; ?>
        </nav>
        <main>
            <h1><?php echo $classificationName; ?> Vehicle</h1>
            <!-- Display the message if it is set -->
            <?php if(isset($message)){
                  echo $message; }
            ?>
            <!-- Displays the lists of vehicle based on classifications from the controller -->
           <div class="vehiclespace"> <?php if(isset($vehicleDisplay)){
                  echo $vehicleDisplay;
                
            } ?>  </div>
        </main>
        <footer id="site_footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>
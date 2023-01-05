<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/smallvehicle.css" rel="stylesheet">
    <link href="../css/largevehicle.css" rel="stylesheet">
    <title><?php echo "$vehicleDetail[invMake] $vehicleDetail[invModel]"?> | PHP Motors</title>
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
            <h1>Vehicle Detail</h1>
            <!-- Displays a header to identify the vehicle being displayed -->
            <h1 class="imgDiv"><?php echo "$vehicleDetail[invMake] $vehicleDetail[invModel]"?></h1>
            <!-- Display a message if one is set show an error message -->
            <?php if(isset($message)){
                  echo $message; }
            
            ?>
            
            <?php 
            //PHP block to echo the vehicle information form the function call in the controller
                if (isset($vehicleDetailDisplay)) {
                    echo $vehicleDetailDisplay;
                }
            ?>
            <?php if(isset($detailDisplay)){
            echo $detailDisplay;
            } ?>


            <?php if(isset($reviewDisplay)){
            echo $reviewDisplay;
            } ?>

        </main>
        <footer id="site_footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>
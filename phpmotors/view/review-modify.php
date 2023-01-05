
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>

    <link href="../css/smallvehicle.css" rel="stylesheet">
    <link href="../css/largevehicle.css" rel="stylesheet">



</head>
<body>

<img class="backgroundimg" src="../images/site/small_check.jpg" alt="Racing Checkers">
<div class="whole">

<div class="dropdown">
<?php 
include "../snippets/header.php";
?>
</div>

<main>
    
<h1>
    
    <?php if(isset($invInfo['invMake'])){ 
	echo "Modify review for: $invInfo[invMake] $invInfo[invModel]";} ?></h1>
    <?php
      if (isset($message)) {
       echo $message;
      }
    ?>

<p>Confirm Review Modification. The Modification is permanent.</p>

<form method="post" action="/phpmotors/reviews/">
<fieldset>
	<label for="reviewDate">Review Date</label>
	<input type="text" readonly name="reviewDate" id="reviewDate" <?php
if(isset($reviewInfo['reviewDate'])) {echo "value='$reviewInfo[reviewDate]'"; }?>>

	<label for="invModel">Vehicle</label>
	<input type="text" readonly name="invModel" id="invModel" <?php
if(isset($invInfo['invModel'])) {echo "value='$invInfo[invMake] $invInfo[invModel]'"; }?>>

	<label for="invDescription">Review</label>
	<textarea name="reviewText" id="reviewText"><?php
if(isset($reviewInfo['reviewText'])) {echo $reviewInfo['reviewText']; }
?></textarea>

<input type="submit" class="regbtn" name="submit" value="Modify Review">

	<input type="hidden" name="action" value="modifyReview">
	<input type="hidden" name="reviewId" value="<?php if(isset($reviewInfo['reviewId'])){
echo $reviewInfo['reviewId'];} ?>">

</fieldset>

<?php 
include "../snippets/footer.php";
?>
</div>
    
</body>
</html>
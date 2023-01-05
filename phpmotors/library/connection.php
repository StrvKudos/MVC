<?php
/*Proxy connection to the phpmotors */
function phpmotorsConnect(){
$server ='localhost';
$dbname ='phpweek3';
$username='iClient';
$password='z.Uac!9Yj*1bv3cw';
$dsn = "mysql:host=$server;dbname=$dbname";
$options = array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
// Create connection object and assign it to a variable
try{
    $link = new PDO($dsn, $username, $password, $options);
 
    //  {echo 'It worked';}
     return $link;
}
catch(PDOException $e){
    // echo 'Sorry, the connection failed';
    // exit;
    // echo "It didnt work, error: " .$e->getMessage(); 
    header('Location:/500.php');
    exit;
}
}
phpmotorsConnect();
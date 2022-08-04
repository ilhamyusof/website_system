<?php
// $host_name = "localhost";
// $database = "pmmy";
// $username = "root";
// $password = "";


$servername ="physiomobile.my";
$database = "physiomo_pmmy";
$username = "physiomo_pmmy";
$password = "Pmmy_8816@clinic";


try {
    $conn = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>



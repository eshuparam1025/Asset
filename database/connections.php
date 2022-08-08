<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    // $dbname = "asset";

    // Connecting to database.
    try{
        $conn = new PDO("mysql:host=$servername; dbname=asset", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    }catch(\Exception $e){
        $error_message = $e->getMessage();
        echo $error_message;
    }
?>
<?php
    // $servername = "mysql:host=localhost; dbname=center";
    // $username = "root";
    // $password = "";

    $servername = "mysql:host=lagosulearn.cqusbzcbfvv2.us-east-2.rds.amazonaws.com; dbname=lagos_ulearn_db";
    $username = "db_admin";
    $password = "Excellent&1";
    
    try{

        $pdo = new PDO($servername, $username, $password);

    }catch(PDOException $e){

        echo 'Connection error'. $e->getMessage();
        
    }
?>
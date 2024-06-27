<?php

    function connectdb(){
        
    $servername = "localhost";
    $username = "id21696101_uit_store";
    $password = "Ngocthien@1208";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=id21696101_uit_store", $username, $password);
    // set the PDO error mode to exception

    } catch(PDOException $e) {
  
    }
    return $conn;
    }

?>
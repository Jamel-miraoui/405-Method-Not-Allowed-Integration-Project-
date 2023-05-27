<?php 

    $host = 'localhost';
    $username = 'sammy';
    $password = 'password';
    $dbname = 'greatmove_library';
    
    $dsn = "mysql:host=$host;dbname=$dbname";
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    
    try {
        $db = new PDO($dsn, $username, $password, $options);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }


?>
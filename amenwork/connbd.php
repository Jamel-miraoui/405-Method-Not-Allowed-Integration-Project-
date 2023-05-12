<?php 

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'greatmove_library';
    
    $dsn = "mysql:host=$host;dbname=$dbname";
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
    );
    
    try {
        $conn= new PDO($dsn, $username, $password, $options);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>
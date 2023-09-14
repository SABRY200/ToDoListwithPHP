<?php
try {
    $db_host = "mysql:host=localhost;dbname=todolist";
    $db_user = "root";
    $db_password = "";


    
    $connect = new PDO("$db_host", "$db_user", "$db_password");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    echo "Error is: " . $e->getMessage();
}
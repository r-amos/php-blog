<?php

require "Database.php";

try {

    // Attempt Connection
    
    $database = new Database();

    // Get SQL Script To Excecute
    
    $sql = file_get_contents("ini.sql");

    $database->connection->exec($sql);

    echo "Database Created Successfully";


 } catch (PDOException $error) {

    echo "Error Creating Tables: " . $error;

 }

?>
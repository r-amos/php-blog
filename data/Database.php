<?php

// Display Errors - @TODO: Remove

ini_set('display_errors', 1);

include "config.php";

class Database {

    public $connection;

    function __construct() {

        $this->connect();

    }

    public function connect() {

        try {

            // Create PDO Instance & Set Error Mode
                      
            $this->connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


        } catch (PDOException $error) {

            echo "Connection Failed: " . $error->getMessage();

        }

    }

    // CREATE
    
    public function create($model) {

        // Cast Model Object To Associative Array Of Properties
        
        $data = (array)$model;

        // Use Class Name as Table Name
        
        $table = strtolower(get_class($model));

        // Get Strings Of Columns & Substitution Values
        
        $columns =  implode(", ", array_keys($data));

        $values = ":" . implode(", :", array_keys($data));
  
        $stmt = $this->connection->prepare("INSERT INTO {$table} ({$columns}) VALUES ({$values})");

        // Iterate Associative Data Array & Create Binding By Value
        
        foreach($data as $key => $value) {
                     
            $stmt->bindValue($key, $value);

        }

        $stmt->execute();

    }

    // READ
    
    public function getData($query) {

        return $this->connection->query($query);

    }

}

?>
<?php 

include "templates/header.php";
include "../data/Database.php";

$database = new Database();

$data = $database->getData("SELECT * FROM post");

foreach($data as $row) { ?>

    <div id="container">
        <h2><?php echo $row['title'] ?></h2>
        <p><?php echo $row['content']?></p>
    </div>

<?php } ?>
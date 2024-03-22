<?php
    include("database.php");

    $db = new Database();
    if($db->query("select * from Usuario")) {
        echo "Connected successfully";
    }
?>
<?php
    $username = "root";
    $password = "";
    $db = "wochenjournal_db";

    $connectdb =  new mysqli('localhost', $username, $password, $db) or die("Not able to connect");
?>
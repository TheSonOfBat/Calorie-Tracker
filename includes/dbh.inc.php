<?php
    $serverName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "calorie_tracker_db";

    $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    if(!$conn){
        die("Connection Failure".mysqli_connect_error());
    }
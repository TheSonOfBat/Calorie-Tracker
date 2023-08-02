<?php
    session_start();//Need this to access session variables
    require_once "dbh.inc.php";
    require_once "functions.inc.php";
    if(isset($_POST["submit"])){
        deleteInput($conn, $_GET["id"], $_SESSION["username"]); 
        header("location: ../index.php");
        exit();
    }else{
        header("location: ../index.php");
        exit();
    }
    
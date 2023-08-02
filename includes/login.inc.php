<?php
    if(isset($_POST["submit"])){
        require_once "dbh.inc.php";
        require_once "functions.inc.php";
        
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        if(emptyLoginSets($username, $password) !== false){
            header("location: ../login.php?error=emptysets");
            exit();
        } 
        
        login($conn, $username, $password);         
        
    }else{
        header("location: ../login.php");
        exit();
    }

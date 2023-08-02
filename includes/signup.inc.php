<?php
    if(isset($_POST["submit"])){
        require_once "dbh.inc.php";
        require_once "functions.inc.php";
        
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repeatPassword = $_POST["repeatPassword"];
        
        if(emptySignupSets($username, $password, $repeatPassword) !== false){
            header("location: ../signup.php?error=emptysets");
            exit();
        } 
        
        if(passwordMismatch($password, $repeatPassword) !== false){
            header("location: ../signup.php?error=passwordmismatch");
            exit();
        } 

        if(getUser($conn, $username) !== false){
            header("location: ../signup.php?error=usernametaken");
            exit();
        }
        
        createUser($conn, $username, $password);           
        
    }else{
        header("location: ../signup.php");
        exit();
    }

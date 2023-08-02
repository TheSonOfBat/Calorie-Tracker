<?php
    session_start();
    require_once "dbh.inc.php";
    require_once "functions.inc.php";
    if(isset($_POST["submit"])){
        
        if(emptyInputSets($_POST["itemname"], $_POST["weightconsumed"], $_POST["energy"], $_POST["protein"])){
            header("location: ../index.php?error=emptysets");
            exit();
        }

        $isCalories = $_POST["energytype"]==="calories";
        createInput($conn, $_SESSION["username"],$_POST["itemname"],$_POST["weightconsumed"],$_POST["energy"],$isCalories ,$_POST["protein"],);
        header("location: ../index.php");
        exit();
    }else{
        header("location: ../index/php");
        exit();
    }
    
<?php
    session_start();
    if(isset($_SESSION["username"])){
        header("Content-Type: application/vnd.ms-excel");
        require_once("dbh.inc.php");
        require_once("functions.inc.php");
    
        $massUserData = massFetchUserData($conn, $_SESSION["username"]);
    
        if($massUserData!==false){
            echo 'Consumption Datetime:' . "\t" . 'Item:' . "\t" . 'Calories:'. "\t" . 'Protein(g):' . "\n";
            foreach ($massUserData as &$value){
                echo $value["inputTime"] . "\t" . $value["inputName"] . "\t" . $value["inputCalories"]. "\t" . $value["inputProtein"] . "\n";
            }
        }
        header("Content-disposition: attachment; filename=data.xls");
        exit();
    }
    header("location: ../index.php");
    exit();
    

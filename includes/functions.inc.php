<?php
    //Make emptysets take an array as the parameter
    function emptySignupSets($username, $password, $repeatPassword){
        return empty($username) || empty($password) || empty($repeatPassword);
    }

    function passwordMismatch($password, $repeatPassword){
        return $password !== $repeatPassword;
    }

    function getUser($conn, $username){
        $sql = "SELECT * FROM temp WHERE tempUsername = ?;";
        $statement = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../signup.php?error=statementfailed");
            exit();
        }

        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);
        $resultData = mysqli_stmt_get_result($statement);

        if($row = mysqli_fetch_assoc($resultData)){//Makes associative array for data
            return $row;
         }else{
             return false;
         }
    }

    function createUser($conn, $username, $password){
        $sql = "INSERT INTO `temp`(`tempUsername`, `tempPassword`) VALUES (?,?)";
        $statement = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../signup.php?error=statementfailed");
            exit();
        }
        $hashedPasssword = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($statement, "ss", $username, $hashedPasssword);
        mysqli_stmt_execute($statement);
        session_start();
        $_SESSION["username"] = $username;
        header("location: ../index.php");
        exit();
    }

    function emptyLoginSets($username, $password){
        return empty($username) || empty($password);
    }

    function emptyInputSets($name, $weight, $energy, $protein){
        return empty($name) || empty($weight)|| empty($energy)|| empty($protein);
    }

    function login($conn, $username, $password){
        $user = getUser($conn, $username);
        if($user !== false){
            if(password_verify($password, $user["tempPassword"])){
                session_start();
                $_SESSION["username"] = $username;
                header("location: ../index.php");
                exit();
            }
            
        }
        header("location: ../login.php?error=invalidlogin");
        exit();
    }

    function fetchUserData($conn, $username){
        $sql = "SELECT * FROM inputs WHERE inputUsername = ? AND DATE(inputTime) = CURDATE();";
        $statement = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);
        $resultData = mysqli_stmt_get_result($statement);
        $array = [];
        while($row = mysqli_fetch_assoc($resultData)){//Makes associative array for data
            array_push($array, $row);
        }
        return $array;
        
    }

    function massFetchUserData($conn, $username){
        $sql = "SELECT * FROM inputs WHERE inputUsername = ? ORDER BY inputTime; ";
        $statement = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);
        $resultData = mysqli_stmt_get_result($statement);
        $array = [];
        while($row = mysqli_fetch_assoc($resultData)){//Makes associative array for data
            array_push($array, $row);
        }
        return $array;
        
    }

    function createCard($assocArray){
        $time = date_create($assocArray["inputTime"]);
        $time = date_format($time,"g:i A");
        return sprintf("
            <div class='card'>
                <h1 class='calories'>%scl</h1>
                <h1 class='protein' style='display:none'>%sg</h1>
                <p>%s - %s</p>
                <form method='POST' action='includes/deleteInput.inc.php?id=%s'><button class='delete' type='submit' name='submit'></button></form>
            </div>
        "
        , $assocArray["inputCalories"], $assocArray["inputProtein"], $assocArray["inputName"], $time, $assocArray["inputId"]);
    }

    function createInput($conn, $username, $name, $weight, $energy, $isCalories, $protein){
        $sql = "INSERT INTO `inputs`(`inputUsername`, `inputCalories`, `inputProtein`, `inputName`, `inputTime`) VALUES (?,?,?,?,?)";
        $statement = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../index.php?error=statementfailed");
            exit();
        }
        $protein = $protein/100*$weight;
        $protein = round($protein, 1);
        $energy = ($isCalories === '1')?$energy/100*$weight:$energy/100*$weight/4.184;
        $time = date('Y-m-d H:i:s');
        mysqli_stmt_bind_param($statement, "sssss", $username, $energy, $protein, $name, $time);
        mysqli_stmt_execute($statement);
        header("location: ../index.php");
        exit();
    }

    function deleteInput($conn, $id, $username){
        $sql = "DELETE FROM `inputs` WHERE inputId = ? AND inputUsername = ?;";
        $statement = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        mysqli_stmt_bind_param($statement, "ss", $id, $username);
        mysqli_stmt_execute($statement);
        header("location: ../index.php");
        exit();
    }

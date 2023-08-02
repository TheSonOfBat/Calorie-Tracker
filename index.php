<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Calorie Tracker</title>
</head>
<body>
    <?php
        if(isset($_SESSION["username"])){
            echo "
            <header>
            <div>
                <a href='includes/logout.inc.php' class='logout'>Logout</a>
                <a href='includes/export.inc.php'>Export</a>
            </div>
            <div class='tracker--toggleContainer'>
                <div class='tracker--LHS'>Calories</div>
                <div class='tracker--RHS'>Protein</div>
                <div id='hover'></div>
            </div>
            </header>
            ";
        }
    ?>
    <main>
        <?php   
        if(isset($_SESSION["username"])){
            echo "<button id='input--button'>Add Input</button>";
            if(isset($_GET["error"])){
                if($_GET["error"] === 'emptysets'){
                    echo '<div class="index--error">Please Fill in All Sets</div>';
                }
            }
        }
        require_once "includes/functions.inc.php";
        require_once "includes/dbh.inc.php";
        if(isset($_SESSION["username"])){
            $userData = fetchUserData($conn, $_SESSION["username"]);
            $totalCalories = 0;
            $totalProtein = 0;
            if($userData!==false){
                foreach ($userData as &$value){
                    $totalCalories += intval($value["inputCalories"]);
                    $totalProtein += floatval($value["inputProtein"]);
                }
                echo '<div>';
                echo "<h1 id='calorieValue'>".$totalCalories." Calories</h1>";
                echo "<h1 id='proteinValue' style='display:none'>".$totalProtein."g of Protein</h1>";
                echo "<h2 class='date'>".date("d/m/y")."</h2>";
                echo "</div>";
            }else{
                echo "No data";
            }
        }else{
            echo "<h1>Welcome New Comer</h1>";
        }
    ?>
    </main>
    <div class="card--container">
    <?php
        require_once "includes/functions.inc.php";
        require_once "includes/dbh.inc.php";
        if(isset($_SESSION["username"])){
            $userData = fetchUserData($conn, $_SESSION["username"]);
            if($userData!==false){
                foreach ($userData as &$value){
                    echo createCard($value);
                }
            }else{
                echo "No data";
            }
        }else{
            echo "<p>Please <a class='welcome--links' href='signup.php'>Sign Up</a> or <a class='welcome--links' href='login.php'>Login</a></p><br>";
        }
    ?>
    </div>
    <div id="blur"></div>
    <form method="POST" action="includes/input.inc.php" id="addInputContainer">
        <img id="close" src="images/x.svg" alt="close"/>
        <div class="searchbar"></div>
        <h2>GENERAL</h2>
        <input id="input1" type="text" name="itemname" placeholder="Item Name"></input>
        <br>
        <input id="input2" type="number" name="weightconsumed" placeholder="Weight Consumed (g)"></input>
        <br>
        <br>
        <br>
        <br>
        <h2>NUTRITION <span>PER 100 Grams</span></h2>
        <input id="input3" type="number" name="energy" placeholder="Energy"></input>
        <div class="radio">
            <input type="radio" id="calories" name="energytype" value="calories" checked="checked">
            <label for="calories">Calories</label>
            <input type="radio" id="joules" name="energytype" value="joules">
            <label for="joules">Joules</label>
        </div>
        <br>
        <input id="input4" type="number" name="protein" placeholder="Protein (g)"></input>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <script src="script.js"></script>
</body>
</html>
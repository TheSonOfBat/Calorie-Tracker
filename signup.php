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
    <title>Calorie Tracker - Sign Up</title>
</head>
<body>
    <main>
        <h1>Sign Up</h1>
    </main>
    <section>
    <form method="POST" action="includes/signup.inc.php">
        <input type="text" name="username" placeholder="Username..."></input><br>
        <input type="password" name="password" placeholder="Pasword..."></input><br>
        <input type="password" name="repeatPassword" placeholder="Repeat Password..."></input><br>
        <button type="submit" name="submit">Sign Up</button>
    </form>
    <a href="login.php">Login</a>
    <?php
    if(isset($_GET["error"])){
        if($_GET["error"] === "invalidlogin"){
            echo "<p class='errormessage'>Invalid Login</p>";
        }
        else if($_GET["error"] === "passwordmismatch"){
            echo "<p class='errormessage'>Passwords do not match</p>";
        }
        else if($_GET["error"] === "usernametaken"){
            echo "<p class='errormessage'>Username is taken</p>";
        }
        else if($_GET["error"] === "emptysets"){
            echo "<p class='errormessage'>Fill in all fields</p>";
        }
    }
    ?>
    </section>
</body>
</html>
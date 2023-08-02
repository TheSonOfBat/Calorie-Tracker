<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Calorie Tracker - Login</title>
</head>
<body>
    <main>
        <h1>Login</h1>
    </main>
    <section>
    <form method="POST" action="includes/login.inc.php">
        <input type="text" name="username" placeholder="Username..."></input><br>
        <input type="password" name="password" placeholder="Password..."></input><br>
        <button type="submit" name="submit">Log In</button>
    </form>
    <a href="signup.php">Sign Up</a>
    <?php
    if(isset($_GET["error"])){
        if($_GET["error"] === "invalidlogin"){
            echo "<p class='errormessage'>Invalid Login</p>";
        }
        else if($_GET["error"] === "emptysets"){
            echo "<p class='errormessage'>Fill in all fields</p>";
        }
    }
    ?>
    </section>
</body>
</html>
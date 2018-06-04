<?php
session_start();
require 'config.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $profession = '';
    $experience = '';
    $cost = '';
    $sql = "INSERT INTO users (name, email, username, password, profession, experience, cost)
            VALUES ('$name','$email','$username','$password','$profession','$experience','$cost')";
            mysqli_query($mysqli, $sql);
            $_SESSION['username'] = $username;
            if (isset($_SESSION['username'])) {
             header("Location: login.php");   
    }
}
    
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/register.css">
    <title>Register</title>
</head>

<body>
    <div class="form-register">
        <div class="register">
            <span id="signin"><a href="login.html">Log in</a></span>
            <h2>Register</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="name">Full name</label>
                <br>
                <input name="name" type="text">
                <br>
                <label for="email">Email</label>
                <br>
                <input name="email" type="text">
                <br>
                <label for="username">Username</label>
                <br>
                <input name="username" type="text">
                <br>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password">
                <br>
                <button name="submit">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>
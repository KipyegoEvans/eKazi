<?php
    session_start();
    require 'config.php';
    $error = "";
    if (isset($_POST['submit'])) {
        if (empty($_POST['profession']) && empty($_POST['experience'])){
            $error = "Enter your details properly";
        }else{
            $profession = trim($_POST['profession']);
            $experience = trim($_POST['experience']);
            $cost = trim($_POST['cost']);
            $name = $_SESSION['username'];
            $sqli = "UPDATE users SET profession = '$profession', experience = '$experience', cost = '$cost' WHERE username = '$name'";
            $query = mysqli_query($mysqli,$sqli);
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="profile.css">
    <title>Home</title>
</head>
<body>
	<body class="container">
    <div class="title">
        <h2>eKazi hiring services</h2>
        <hr>
    </div>
    <div class="topnav">
        <li><a href="login.php">Log in </a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="#">Hire</a></li>
        <li><a href="#">Jobs</a></li>
        <li><a href="#">portfolio</a></li>
    </div>
    <h1>Home</h1>
    <h4> Welcome <?php echo $_SESSION['username']; ?> </h4>
    <h5>Update your profile to start getting jobs</h5>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <span>Enter your profession </span><input type="text" name="profession"> <br>
        <span>What's your Experience , enter references to jobs done before to improve your profile</span>  <input type="text" name="experience"> <br>
        <span>Cost per hour?</span> <input type="text" name="cost">
        <br>
        <span> <?php echo $error; ?> </span>

        <button name="submit">Update</button>
    </form>
    <div class="footer">
        <div>
            <h2>Let's connect</h2>
            <hr>
            <ul>
                <li>
                    <a href="#">
                        <img src="ficon.png">
                    </a>
                </li>
                <li>
                    <a>
                        <img src="ficon.png">
                    </a>
                </li>
                <li>
                    <a>
                        <img src="ficon.png">
                    </a>
                </li>
                <li>
                    <a>
                        <img src="ficon.png">
                    </a>
                </li>
            </ul>
        </div>
        <div class="copy">
            <hr>
            <p>&copy; all rights reserved kazi ltd</p>
        </div>
    </div>

</body>

</html>
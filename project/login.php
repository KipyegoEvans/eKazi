<?php
require_once 'config.php';
session_start();
    $username =""; $password = ""; $perror =""; $uerror =""; $derror ="";
    if (isset($_POST['submit'])) {
        
        if (empty($_POST['username']) && empty($_POST['password'])) {
            $error = "Please Enter your details";
        }else{
            //define and initialize variables
            
            //processing form data when form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $result = "SELECT * from users WHERE username = '$username'";
                $resul = mysqli_query($mysqli, $result);
                $rows = mysqli_num_rows($resul);
                if ($rows>=1) {
                    $row = mysqli_fetch_assoc($resul);
                    if ($row['username'] != $username) {
                        $uerror = "username not correct";
                    }else{
                        $_SESSION['profession'] = $row['profession'];
                        $_SESSION['experience'] = $row['experience'];
                        $_SESSION['cost'] = $row['cost']; 
                        $_SESSION['name']= $row['username'];                  
                        header("location: home.php");
                        }                    
                }else{
                    $derror = "Enter correct";
                } 
            }
        }
    }
    
    


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/login.css">
    <title>Log in</title>
</head>

<body>
    <div class="form-container">        
    <div class="login">
        <h2>Log In</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input placeholder="username" name="username" type="text">
            <span><?php echo $uerror; ?></span>
            <br>
            <input type="password" name="password" placeholder="Password">
            <span><?php echo $perror; ?></span>
            <a href="#">Forgot password ?</a>
            <br>
            <button name="submit">Log In</button>
            <span><?php echo $derror; ?></span>
        </form>
    </div>
    </div>
</body>

</html>
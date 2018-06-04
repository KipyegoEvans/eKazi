<?php
    session_start();
    require 'config.php';
    if (isset($_SESSION['profession']) && isset($_SESSION['experience']) && isset($_SESSION['cost'])) {
        echo $_SESSION['profession'];
    }else{
        header("Location: profile.php");
    }

    $result = "SELECT * from hiring";
    $resul = mysqli_query($mysqli, $result);
    if (!$resul) {
        echo "error fetching from database";
    }else{
    $rows = mysqli_num_rows($resul);
    // if ($rows>=1) {
    //     $row = mysqli_fetch_assoc($resul);
    //     $title = $row['title'];
    //     $description = $row['description'];
    //     $deadline = $row['deadline']; 
    //     $budget = $row['budget'];
    // }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/home.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
	<div class="topnav">
			<li><a href="logout.php">Log out</a></li>
			<li><a href="#">Hire</a></li>
			<li><a href="#">Jobs</a></li>
			<li><a href="#">portfolio</a></li>
		</div>
    <h1>Home</h1>
    <h4> Welcome <?php echo $_SESSION['name']; ?> </h4>  
    <h1>Jobs</h1>
    <?php 
    while ($row = mysqli_fetch_assoc($resul)) {
        echo '<div class="hire">'.'<p>'.$row['title'].'</p>' .
             '<p>'.$row['description'].'</p>'.
             '<p>'.$row['dateline'].'</p>'.
             '<p>'.$row['budget'].'</p>'.
             '<p>'.'Posted: '.$row['regdate'].'</p>'.
             '</div>';
        $to = $row['email'];
        $subject = $_SESSION['profession'];
        $message = $_SESSION['experience'];
        echo "<form action='' method='POST'> <button name='hireme'>Submit</button> </form>";     
    }
    if (isset($_POST['hireme'])){
        $sent = mail($to,$subject,$message);
        if (!$sent) {
            echo "oooops";
        }else{
            echo "saaaavvvvvy";;
        }
        
    }else{
        echo "naaah!";
    }

    ?>
</div>
</body>

</html>
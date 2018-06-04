<?php

require 'config.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dateline = $_POST['dateline'];
    $budget = $_POST['budget'];
    $email = $_POST['email'];
    $regdate = date('Y-m-d H-i-s');
    $sql = "INSERT INTO hiring (title, description, dateline, budget, email, regdate)
            VALUES ('$title','$description','$dateline','$budget','$email','$regdate')";
           mysqli_query($mysqli, $sql);
            
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Hire A Specialist</title>
	<link rel="stylesheet" href="styles/hire.css">
</head>
<body>
	<h3>Smart Move!</h3>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
		<span>Job title?</span>
		<input type="text" name="title"> <br>
		<span>A little description?</span>
		<input type="text" name="description"> <br>
		<span>You want it done by?</span>
		<input type="text" name="dateline"> <br>
		<span>Whats your budget</span>
		<input type="text" name="budget"> <br>
		<span>Provide your Email</span>
		<input type="text" name="email">
		<button name="submit">Post Job</button>
	</form>
</body>
</html>
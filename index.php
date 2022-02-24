<?php
include "UserManager.php";
session_start();

error_reporting(0);
if (isset($_SESSION['username'])) {
	header("Location: welcome.php");
}

$manage = new UserManager($db_pdo);
$manage->set_db($db_pdo);
#$db_pdo; //PDO 
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$user = $manage->getUserByEmail($email);

	
	if($email!=$user->get_email() || $password!=$user->get_password()){ #check if the information is'not correct
		echo "<script>alert('email ou mot de passe incorrect')</script>";
	}else{
		$_SESSION['username'] = $user->get_username();
		header("Location: welcome.php");
	}
		#header("welcome.php");
		#echo "<script>alert('Vous etes connecter')</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		
		</form>
	</div>
</body>
</html>


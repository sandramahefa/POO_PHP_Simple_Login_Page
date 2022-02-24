<?php

require "UserManager.php";

$manage = new UserManager($db_pdo);
$manage->set_db($db_pdo);

if(isset($_POST['submitr'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm-password'];

	$user = $manage->getUserByEmail($email);

	if($user->get_email() == $email){
		echo "<script>alert('Mail already exist')</script>";
	}else{
		if($password!=$confirm_password){
			echo "<script>alert('check the MDP')</script>";
		}else{
			$new_user = new Users($username,$email,$password);
			$manage->addUser($new_user);
			echo "<script>alert('sing up ok')</script>";
		}
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="username" name="username" required>
         	</div>
         	<div class="input-group">
				<input type="text" placeholder="email" name="email" required>
         	</div>
         	<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="confirm-password" required>
			</div>
			<div class="input-group">
				<button name="submitr" class="btn">Register</button>
            </div>
            <p class="login-register-text">Back to sign in :-) <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
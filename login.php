<?php 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (isset($_SESSION['loggedinVendor'])) {
		header("Location: index.php");
		exit;
	}

	if (isset($_SESSION['loggedinAdmin'])) {
		header("Location: index.php");
		exit;
	}

	if (isset($_SESSION['loggedinCustomer'])) {
		header("Location: index.php");
		exit;
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Let's Start Shopping</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="login.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
			<h1>Log In</h1>
			<form action="index.php?page=authenticate" method="post"> 
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				
                <label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				
                <input type="submit" value="Log In"> 
                <a href="index.php?page=signup" name="signupbtn" class="signupbtn">Sign Up</a>
			</form>
		</div>
	</body>
</html>
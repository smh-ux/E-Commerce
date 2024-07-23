<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Let's Join Us</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="login.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
			<h1>Sign Up</h1> 
			<form action="index.php?page=signupcomplete" method="post">
				<label for="name"> 
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="name" placeholder="Name" id="name" required>

				<label for="surname">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="surname" placeholder="Surname" id="surname" required>

				<label for="email">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="email" placeholder="E-Mail" id="email" required>

				<label for="phonenumber">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="phonenumber" placeholder="Phone Number" id="phonenumber" required>

				<label for="address">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="address" placeholder="Address" id="address" required>
				
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				
				<input type="submit" value="Sign Up"> 
			</form>
		</div>
	</body>
</html>
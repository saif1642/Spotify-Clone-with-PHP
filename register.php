<?php

    if(isset($_POST['loginButton'])){
		//Login button pressed
		echo "Login button has pressed";
	}
	if(isset($_POST['registerButton'])){
		//Register button pressed
		echo "Register button has pressed";
	}

?>





<html>
<head>
	<title>Welcome to Slotify!</title>
</head>
<body>

	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account</h2>
			<p>
				<label for="loginUsername">Username</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" required>
			</p>
			<p>
				<label for="loginPassword">Password</label>
				<input id="loginPassword" name="loginPassword" type="password" required>
			</p>

			<button type="submit" name="loginButton">LOG IN</button>
			
		</form>
	</div>
	<div id="inputContainer">
		<form id="registerForm" action="register.php" method="POST">
			<h2>Create your free account</h2>
			<p>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="e.g. Saif1642" required>
			</p>
			<p>
				<label for="firstName">First Name</label>
				<input id="firstName" name="firstName" type="text" placeholder="e.g. Saif" required>
			</p>
			<p>
				<label for="lastName">Last Name</label>
				<input id="lastName" name="lastName" type="text" placeholder="e.g. Khan" required>
			</p>
			<p>
				<label for="email">Email</label>
				<input id="email" name="email" type="text" placeholder="e.g. test@gmail.com" required>
			</p>
			<p>
				<label for="c_email">Confirm Email</label>
				<input id="c_email" name="c_email" type="text" required>
			</p>
			<p>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" required>
			</p>
			<p>
				<label for="c_password">Confirm Password</label>
				<input id="c_password" name="c_password" type="password" required>
			</p>

			<button type="submit" name="registerButton">Sign Up</button>
			
		</form>
	</div>

</body>
</html>
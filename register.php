<?php 
   include("inc/classes/Account.php");
   include("inc/classes/Constants.php");
   include("inc/config.php");
   $account = new Account($con);
   include("inc/handlers/register-handler.php");
   include("inc/handlers/login-handler.php");

   function getInputValue($name){
   	  if(isset($_POST[$name])){
   	  	echo $_POST[$name];
   	  }
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
				<?php echo $account->getError(Constants::$usernameCharacters); ?>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="e.g. Saif1642" value="<?php getInputValue('username'); ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$firstNameCharacters); ?>
				<label for="firstName">First Name</label>
				<input id="firstName" name="firstName" type="text" placeholder="e.g. Saif" value="<?php getInputValue('firstName'); ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$lastNameCharacters); ?>
				<label for="lastName">Last Name</label>
				<input id="lastName" name="lastName" type="text" placeholder="e.g. Khan" value="<?php getInputValue('lastName'); ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
				<?php echo $account->getError(Constants::$emailInvalid); ?>
				<label for="email">Email</label>
				<input id="email" name="email" type="text" placeholder="e.g. test@gmail.com" value="<?php getInputValue('email'); ?>" required>
			</p>
			<p>
				<label for="c_email">Confirm Email</label>
				<input id="c_email" name="c_email" type="text" value="<?php getInputValue('c_email'); ?>" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$passwordCharacters); ?>
				<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
				<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
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
<?php

   include("inc/config.php");
   //session_destroy();  //Logout Manually
   if(isset($_SESSION['userLoggedIn'])){
   	$userLoggedIn = $_SESSION['userLoggedIn'];
   }else{
   	header("Location: register.php");
   }

 ?>

<html>
<head>
	<title>Welcome to Spotify clone!</title>
</head>

<body>
	Hello!
</body>

</html>
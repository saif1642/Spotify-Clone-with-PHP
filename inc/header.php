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
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
	<div id="mainContainer">
		<div id="topContainer">
		   <?php include('inc/navBarContainer.php'); ?>
		   <div id="mainViewContainer">
		       <div id="mainContent">
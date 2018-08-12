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
			<div id="navBarContainer">
				<nav class="navBar">
					<a href="index.php" class="logo">
						<img src="assets/images/icons/logo.png" alt="Logo">
					</a>
					<div class="group">
						<div class="navItem">
							<a href="search.php" class="navItemLink">Search
								<img src="assets/images/icons/search.png" alt="Search" class="icon">
							</a>
						</div>
					</div>
					<div class="group">
						<div class="navItem">
							<a href="browse.php" class="navItemLink">Browse</a>
						</div>
						<div class="navItem">
							<a href="yourMusic.php" class="navItemLink">Your Music</a>
						</div>
						<div class="navItem">
							<a href="profile.php" class="navItemLink">Saif Khan</a>
						</div>
					</div>    
				</nav>
			</div>
		</div>
		<div id="nowPlayingBarContainer">
			<div id="nowPlayingBar">
				<div id="nowPlayingLeft">
					<div class="content">
					<span class="albumLink">
						<img src="https://i.ytimg.com/vi/rb8Y38eilRM/maxresdefault.jpg" alt="" class="albumArt">
					</span>
					<div class="trackInfo">
						<span class="trackName">
							<span>Bioscope</span>
						</span>
						<span class="artistName">
							<span>Sanjeeb Chowdoury</span> 
						</span>
					</div>
					</div>
				</div>
				<div id="nowPlayingCenter">
					<div class="content playerControls">
						<div class="buttons">
							<button class="controlButton shuffle" title="Shuffle Button">
								<img src="assets/images/icons/shuffle.png" alt="shuffle">
							</button>
							<button class="controlButton previous" title="Previous Button">
								<img src="assets/images/icons/previous.png" alt="previous">
							</button>
							<button class="controlButton play" title="Play Button">
								<img src="assets/images/icons/play.png" alt="play">
							</button>
							<button class="controlButton next" title="Next Button">
								<img src="assets/images/icons/next.png" alt="next">
							</button>
							<button class="controlButton pause" title="Pause Button" style="display: none;">
								<img src="assets/images/icons/pause.png" alt="pause">
							</button>
							<button class="controlButton repeat" title="Repeat Button">
								<img src="assets/images/icons/repeat.png" alt="repeat">
							</button>
						</div>
						<div id="playbackBar">
							<span class="progressTime current">0.00</span>
							<div class="progressBar">
								<div class="progressBarBg">
									<div class="progress"></div>
								</div>
							</div>
							<span class="progressTime remaining">0.00</span>
						</div>
					</div>
				</div>
				<div id="nowPlayingRight">
					<div class="volumeBar">
						<button class="controlButton volume" title="Volume control">
							<img src="assets/images/icons/volume.png" alt="repeat">
						</button>
						<div class="progressBar">
							<div class="progressBarBg">
								<div class="progress"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>

</html>
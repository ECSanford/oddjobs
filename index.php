<?php
	require('../vendor/autoload.php');
	let port = process.env.PORT;
	if (port == null || port == "") {
	  port = 8000;
	}
	app.listen(port);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Odd Jobs by Ethan</title>
		<link rel="stylesheet" href="css/normalize.css">
		<link href="https://fonts.googleapis.com/css?family=Rambla" rel="stylesheet">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<header>
			<nav>
				<div id="sidenav">
					<img src="img/photo.jpg" id="photo" alt="Picture" height="160" width="160">
					<h3 class="menu">Menu</h3>
					<a href="index.html" class="button" id="selected">Home</a>
					<a href="faq.html" class="button">F.A.Q.</a></li>
					<a href="jobreq.php" class="button">Job Request</a>
					<a href="reviewsub.html" class="button">Submit A Review</a>
				</div>
			</nav>
		</header>
		<section>
			<div class="header">
				<h1>Ethan Sanford</h1>
				<h2>Odd Jobs by Ethan</h2>
			</div>
			<div class="aboutme">
				<h1>About Me</h1>
				<img src="img/latech.png" id="latech" alt="Logo" height="160" width="160">
				<p>Hello and welcome to my website! My name is Ethan Sanford.  I am currently studying Computer Science at Louisiana Tech University.  Over the summer I will be doing various yardwork jobs for money.</p>
			</div>
			<div class="reviews">
				<h1>Reviews</h1>
				<p>Sorry! There are currently no reviews.</p>
			</div>
		</section>
		<footer>

		</footer>
	</body>
</html>

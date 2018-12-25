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
		<?php 

		 $nameErr = $emailErr = $phoneErr = $descErr = NULL;
		 $name = $email = $phone = $jobdesc = NULL;

		 if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 	if(empty($_POST["name"])) {
		 		$nameErr = "Name is required.";
		 	} else {
		 		$name = test_input($_POST["name"]);
		 	}
		 	if(empty($_POST["email"])) {
		 		$emailErr = "Email is required.";
		 	} else {
		 		$email = test_input($_POST["email"]);
		 	}
		 	if(empty($_POST["phone"])) {
		 		$phoneErr = "Phone is required.";
		 	} else {
		 		$phone = test_input($_POST["phone"]);
		 	}
		 	if(empty($_POST["jobdesc"])) {
				$descErr = "Description is required.";
		 	} else {
		 		$jobdesc = test_input($_POST["jobdesc"]);
		 	}


		 }
		 function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if(isset($email) & isset($name) & isset($jobdesc)) {
					$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

					$server = "us-cdbr-iron-east-01.cleardb.net";
					$username = "b4131133868605";
					$password = "10f34ef5";
					$db = "heroku_5bf4a8ec134f188";

					//Create connection
					$conn = new mysqli($server, $username, $password, $db);

					//Check connection
					if(!$conn) {
						die("Connection failed: " . $conn->connect_error);
					}

					$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
					$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
					$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
					$jobdesc = mysqli_real_escape_string($conn, $_REQUEST['jobdesc']);

					$sql = "INSERT INTO myTable (name, email, phone, jobdesc) VALUES ('$name', '$email', '$phone', '$jobdesc')";

					if(mysqli_query($conn, $sql)){
					     //echo "Records added successfully.";
					} else{
					    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
					}

					}
				}
		?>
		<header>
			<nav>
				<div id="sidenav">
					<img src="img/photo.jpg" id="photo" alt="Picture" height="160" width="160">
					<h3 class="menu">Menu</h3>
					<a href="index.php" class="button">Home</a>
					<a href="faq.html" class="button">F.A.Q.</a></li>
					<a href="jobreq.php" class="button" id="selected">Job Request</a>
					<a href="reviewsub.html" class="button">Submit A Review</a>
				</div>
			</nav>
		</header>
		<section>
			<div class="header">
				<h1>Ethan Sanford</h1>
				<h2>Odd Jobs by Ethan</h2>
			</div>
			<div class="jobreq">
				<h1>Job Request</h1>
				
				<p>Please fill out this form to request a job.</p>
				<form id="sampleform" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<p> 
						Name: <input type="text" name="name">
						<span class="error">* <?php echo $nameErr;?></span>
					</p>
					<p>
						Email: <input type="text" name="email">
						<span class="error">* <?php echo $emailErr;?></span>
					</p>
					<p>
						Phone: <input type="text" name="phone">
					</p>
					<p> Preferred Contact Method </p>
					<p><input type="checkbox" value="email"> Email</p>
					<p><input type="checkbox" value="phone"> Phone</p>
					<p> 
						Job Description<span class="error"> * <?php echo $descErr;?></span><br>
						<textarea name="jobdesc" rows="10" cols="40"></textarea>
					</p>
					<p>
						<button type="submit" name="submit">Submit</button>
					</p>
					<p id='jobsub'> After submitting this form I will contact you and we can arrange a time that fits our schedules.</p>
				</form>
			</div>
		</section>
		<footer>

		</footer>
	</body>
</html>

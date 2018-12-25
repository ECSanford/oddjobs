<?php 

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

//Create connection
$conn = new mysqli("127.0.0.1", "root", "mtgce123", "mydb");

//Check connection
if(!$conn) {
	die("Connection failed: " . $conn->connect_error);
}

 $nameErr = $emailErr = $phoneErr = $descErr = "";
 $name = $email = $phone = $desc = "";

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
 	if(empty($_POST["desc"])) {
		$descErr = "Description is required.";
 	} else {
 		$desc = test_input($_POST["desc"]);
 	}
 }
 if(($nameErr && $emailErr && $phoneErr && $descErr) == "") 
 {
 	header('Location: thankyou.html');
 }
 
$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
$jobdesc = mysqli_real_escape_string($conn, $_REQUEST['jobdesc']);

$sql = "INSERT INTO myTable (name, email, phone, jobdesc) VALUES ('$name', '$email', '$phone', '$jobdesc')";

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

 function test_input($data) {
 	$data = trim($data);
 	$data = stripslashes($data);
 	$data = htmlspecialchars($data);
 	return $data;
 }
 mysqli_close($conn);
?>
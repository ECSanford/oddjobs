<html>
<body>
<?php 
if(isset($_POST['submit'])) {
	$name = htmlspecialchars($_POST['name']);
	$rating = htmlspecialchars($_POST['rating']);
	$deets = htmlspecialchars($_POST['review']);

	echo "Hello " . $name . " your review was " . $rating;
}
?>
</body>
</html>
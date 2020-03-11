<?php
$x=$_POST['username'];
$y=$_POST['email'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname="dbsynthwaver";


// THIS PART INSERTS THE LP FORM'S INFO TO THE $dbname DATABASE, INSIDE THE user TABLE

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
echo "Connected succesfully";
$sql = "INSERT INTO user (username, email) VALUES ('$x','$y')";

if ($conn->query($sql) === TRUE) {
	echo "New record created succesfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



// THIS PART SENDS THE EMAIL WITH THE USER'S INFO


mail('leandro@calina.ag','User','user: '. $x . ' email: ' . $y, 'From: synthwaver.lp@gmail.com');

?>
<?php
session_start();
require("connectToDB.php");
function redirect()
{
	header('Location: index.php');
	exit();
}

if (!isset($_GET['email']) || !isset($_GET['token'])) {
	redirect();
} else {

	$email = $conn->real_escape_string($_GET['email']);
	$token = $conn->real_escape_string($_GET['token']);

	$sql = $conn->query("SELECT id FROM bose_user_profile WHERE email='$email' AND token='$token' AND isEmailConfirmed=0");

	while ($row = $sql->fetch_assoc()) {
		$id = $row['id'];
		$_SESSION['id']=$id;
	}

	if ($sql->num_rows > 0) {
		$conn->query("UPDATE bose_user_profile SET isEmailConfirmed=1, token='' WHERE email='$email'");
		echo "<br><h1>Your Email has been verified.\nYou are redirecting to the homepage.</h1>";
		header("refresh:2; url=homepage.php");
	} else
		redirect();
}
?>
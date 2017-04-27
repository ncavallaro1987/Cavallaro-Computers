<?php 
	session_start();
	require "mysql.php" ;
$loggedIn = isset($_SESSION['loggedIn']);
if ($loggedIn){
$userName = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		

		<title>Nick's Computer Services</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/nickscomputerservices.css">
	</head>
	<body>
	
	<div id="wrapper">
		<header>
			<h1>Nick's Computer Services</h1>
		</header>
		<nav>
			<ul>
				<?php
					if (!$loggedIn){
						echo '
						<li><a href="login.php">Log in!</a></li>
						<li><a href="signup.php">Sign up!</a></li>';
					}
					else {
						echo '<li><a href="profile.php">Profile</a></li>';
					}
				?>
				<!--<li><a href="TESTDB.php">LIST USERS</a></li> This section tests the DB connection-->
				<li><a href="home.php">Home</a></li>
				<li><a href="services.php">Services</a></li>
				<li><a href="tips.php">Tips & Tricks</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contacts.php">Contact</a></li>
				<?php 
					if ($loggedIn){
						echo '<li><a href="forums.php">Forums</a></li>';
						echo '<li><a href="logout.php">Log out</a></li>';
					}
				?>
			</ul>
		</nav>
		<div id="rightcol">
			<main>
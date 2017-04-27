<?php require "mysql.php" ?>
<?php
	//check for login submission
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// create variables from post values
		$username = $_POST['userNameLogIn']; //store user entered username
		$pass = $_POST['passwordLogIn']; //store user entered password
		$errors = array(); //create error array
		if (empty($username) || empty($pass)) {
			$errors[] = "Please enter a username and password";
		}
		$checkUserName = $con->prepare('select * from users where user_name = ?');
		$checkUserName->bind_param('s', $username);
		$success = $checkUserName->execute();
		if ($success) {
			$result = $checkUserName->get_result();
			if ($result->num_rows === 0) {
				$errors[] = "User name not found!";
			}
			$user = $result->fetch_object();
			if (password_verify($pass, $user->pass)) {
				session_destroy();
				session_start();
				$_SESSION['loggedIn'] = true;
				$_SESSION['username'] = $user->user_name;
				header('Location: home.php'); 
			} else {
				$errors[] = "Invalid Password!";
			}
		}
		if (!empty($errors)){
			echo '<h2>Error!</h2>
			<p class="error">The following error(s) occurred:<br />';
			foreach ($errors as $msg){
				echo " - $msg<br />\n ";
			}
		}
	}
	
?>
<?php require "mysql.php" ;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$errors = array();
		$fname = $_POST['firstNameTextBox'];
		$lname = $_POST['lastNameTextBox'];
		$uname = $_POST['userNameTextBox'];
		$pass = $_POST['passwordTextBox'];
		$passconfirm = $_POST['passwordConfirmTextBox'];
		$email = $_POST['emailTextBox'];
		$emailconfirm = $_POST['emailConfirmTextBox'];
		if (empty($fname) || empty($lname) || empty($pass) || empty($passconfirm) || empty($email) ||
		empty($emailconfirm) || empty($uname)){
			$errors[] = 'Please fill in all fields!';
		}
		if ($pass != $passconfirm){
			$errors[] = 'Passwords do not match!';
		}	
	
		if ($email != $emailconfirm){
			$errors[] = 'emails do not match!';
		}
		
		$nameCheck = $con->prepare('select * from users where user_name = ?');
		$nameCheck->bind_param('s', $uname);
		$success = $nameCheck->execute();
		if ($success) {
		$result = $nameCheck->get_result();
		}
		if ($result->num_rows > 0) {
			$errors[] = 'Username already taken!';
		}
		
		if (empty($errors)){
			$hash = password_hash($pass, PASSWORD_DEFAULT);
			$createAccount= $con->prepare("INSERT users (first_name, last_name, user_name, pass, email) values(?,?,?,?,?)");
			$createAccount->bind_param('sssss', $fname, $lname, $uname, $hash, $email);
			$success = $createAccount->execute();
			echo"<p>success! user added!</p>";
		}
		else {
			echo '<h2>Error!</h2>
			<p class="error">The following error(s) occurred:<br />';
			foreach ($errors as $msg){
				echo " - $msg<br />\n";
				
			}
		}
	}
?>
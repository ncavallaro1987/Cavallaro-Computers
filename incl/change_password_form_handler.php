<?php require "mysql.php" ;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$currentPass = $_POST['currentPasswordTextBox'];
		$newPass = $_POST['newPasswordTextBox'];
		$newPassConfirm = $_POST['newPasswordConrimTextBox'];
		$userName = $_SESSION['username'];
		if (empty($currentPass) || empty($newPass) || empty($newPassConfirm)){
			$errors[] = 'Please fill in all fields!';
		}
		
		$passCheck = $con->prepare('select * from users where user_name = ?');
		$passCheck->bind_param('s',$userName);
		$success = $passCheck->execute();
		if ($success){
			$result = $passCheck->get_result();
		}
		$user = $result->fetch_object();
		if (password_verify($currentPass, $user->pass)){
			if ($newPass != $newPassConfirm){
			$errors[] = 'New passwords do not match!';
			}
		}
		else {
			$errors[]= 'Current password invalid!';
		}
	
		if (empty($errors)){
			$hash = password_hash($newPass, PASSWORD_DEFAULT);
			$updatePassword= $con->prepare("UPDATE users set pass = ? where user_name = ?");
			$updatePassword->bind_param('ss', $hash, $userName);
			$success = $updatePassword->execute();
			echo"<p>success! password Updated!</p>";
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
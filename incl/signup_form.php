<?php require "incl/mysql.php" ?>
<form action="signup.php" method="post">
	<fieldset>
		First Name<input type="text" name="firstNameTextBox" placeholder="John" value="<?php if(!empty($fname)) echo $fname; ?>">
		Last Name<input type="text" name="lastNameTextBox" placeholder="Doe" value="<?php if(!empty($lname)) echo $lname; ?>">
		<br>
		Username<input type="text" name="userNameTextBox" placeholder="User Name" value="<?php if(!empty($uname)) echo $uname; ?>">
		<br>
		Password<input type="password" name="passwordTextBox" placeholder="Password">
		<br>
		Confirm Pasword<input type="password" name="passwordConfirmTextBox" placeholder="Password">
		<br>
		E-mail<input type="email" name="emailTextBox" placeholder="example@email.com" value="<?php if(!empty($email)) echo $email; ?>">
		<br>
		Confirm E-mail <input type="email" name="emailConfirmTextBox" placeholder="example@email.com" value="<?php if(!empty($emailconfirm)) echo $emailconfirm; ?>">
		<br>
		<input type="Submit" value="Create Account">
		<br>
		<button type="reset" id="resetButton">Clear form</button>
	</fieldset>
</form>
<?php require "incl/mysql.php" ?>
<form action="change_password.php" method="post">
	<fieldset>
		Current Password<input type="password" name="currentPasswordTextBox" placeholder="Current Password">
		<br>
		New Pasword<input type="password" name="newPasswordTextBox" placeholder="New Password">
		<br>
		Confirm new password<input type="password" name="newPasswordConrimTextBox" placeholder="Confirm New Password">
		<input type="Submit" value="Update Password">
		<br>
		<button type="reset" id="resetButton">Clear form</button>
	</fieldset>
</form>
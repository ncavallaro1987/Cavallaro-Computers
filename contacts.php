<?php require "incl/header.php" ?>
	<p id="contactfl">
		Email: <a href="mailto:Nccompservices@gmail.com">Nccompservices@gmail.com</a>
	</p>
	<p>
		Phone: <a href="tel:614-219-9612">(614)219-9612</a>
	</p>
	<p>
		Address: 
		<br>Nicholas Cavallaro
		<br>3506 Beulah rd. 
		<br>Columbus, Oh 43224
	</p>
	<form>
		First Name: 
		<br>
		<input type="text" name="firstNameTextBox" id="firstNameTextBox" required="required">
		<br>
		<br>
		Last Name:
		<br>
		<input type="text" name="lastNameTextBox" id="lastNameTextBox" required="required">
		<br>
		<br>
		Email address:
		<br>
		<input type="email" name="emailTextBox" id="emailTextBox" required="required">
		<br>
		<br>
		Comments:
		<br>
		<textarea name="commentsBox" id="commentsBox" cols="40" rows="5" placeholder="Please let us know any questions or comments you may have"></textarea>
		<br>
		<input type="submit" name="submitButton" id="submitButton" value="Submit">
	</form>
<?php require "incl/footer.php" ?>
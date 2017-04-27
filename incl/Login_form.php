<form action="" method="post" id="loginForm">
	<input type="text" name="userNameLogIn" placeholder="Username" value="<?=isset($userName) ? $userName : ''?>">
	<input type="password" name="passwordLogIn" placeholder="password">
	<button type="submit" id="loginButton">Log in </button> 
</form>

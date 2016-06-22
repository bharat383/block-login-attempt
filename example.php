<?php 
	@include("class/Login.class.php");
	$Login = new Login();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Block Login Attempt : Bharat Parmar</title>
	</head>
<body>

<h4>Example : Block Login Attempt with IP Address </h4>
<ol>
	<li>Form Submit</li>
	<li>Form Data Clear</li>
	<li>Click on your Web Page</li>
	<li>Copy Web Page Content</li>
	<li>Print Web Page</li>
	<li>Right Click on Web Page</li>
</ol>
<p>Whenever the above events will be triggered, the screenshot of the webpage will be stored in the Screenshot Directory as well as the event log will be generated in event-log.log file in the same directory. Event Log will store data like Event Name, Screenshot Image File Name, Time and IP Address.</p>
<hr>
	<?php $Login->DisplayMessage(); ?>
	<form method="post">
		<h3>Login</h3>
		<table width="50%">
			<tr>
				<th>Username</th>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="login_submit" value="Login">
				</td>
			</tr> 
		</table>
	</form>
</body>
</html>


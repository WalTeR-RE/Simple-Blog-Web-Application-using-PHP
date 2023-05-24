<?php
session_start();
include("config.php");
if(!empty($_COOKIE['username'])&&!empty($_COOKIE['role']))
{
    if($_COOKIE['role']=="Owner")
				{
				header("refresh:0;url=http://localhost/xampp/projectk/AdminPage.php");
				}
				else{
      			header("refresh:0;url=http://localhost/xampp/projectk/UserPage.php");
				}
}
?>


<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Authorization Page</title>
		<link rel="icon" type="image/x-icon" href="Images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="CSS/Page1Style.css">
        
	</head>
	<body>
		<div class="try">
			<form id="form1" action="Login.php" method="POST"> 
				<h1 class="head1"> LOGIN </h1>
				<div>
					<label class="label1"><b>Username</b></label> 
					<input type="text" name="username" id="username" placeholder="Username" required>
				</div>
				<div>
					<label class="label2"><b>Password</b></label> 
					<input type="password" name="password" id="password" placeholder="Password" required>
				</div>
				<div class="Div1">
					<input type="checkbox" name="remember" id="remember" class="in1">
					<label>Remember me</label>
				</div>
				<input type="submit" id="losubmit" value="LOGIN">
				<div class="t2">
					<a class="link" href="https://www.facebook.com/WolfSarX"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" style="color: blue;" class="bi bi-facebook" viewBox="0 0 16 16">
						<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
					</svg></a> 

					<a href="mailto:asamaaly70@gmail.com" class="link"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" style="color: red;" class="bi bi-envelope-at" viewBox="0 0 16 16">
						<path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
						<path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
					</svg></a>
				</div>
			</form>

			<form id="form2" action="Register.php" method="POST"> 
				<h1 class="head2"> SIGN UP </h1>
				<div>
					<label><b>Username</b></label>
					<input type="text" name="username" id="us" placeholder="username"required> 
				</div><div class="div2">
					<label><b>Email</b></label>
					<input type="Email" name="email" id="em"  placeholder="Email"required>
				</div><div>
					<label><b>Phone Number</b></label> 
					<input type="Number" name="Phone" placeholder="Your-Number" required>
				</div><div>
					<label><b>Password</b></label> 
					<input type="password" name="password" id="ps" placeholder="password"required> 
				</div><div>
					<label><b>Password</b></label> 
					<input type="password" name="cpassword" placeholder="Password Confirmation"required> 
				</div>
				<input type="submit" name="SIGN UP" id="sisubmit" value="SIGN UP">

			</form>




		</div>
	</body>
	</html>

	<script type="text/javascript">
		
		/*var usernamee= localStorage.getItem("username") || "";
		var passwordd= localStorage.getItem("password") || "";

		console.log(document.querySelector("#form2"));
		document.querySelector('#form2').addEventListener('submit',(e)=>{
			e.preventDefault();

			localStorage.setItem("username", document.getElementById('us').value);
			localStorage.setItem("password", document.getElementById('ps').value);
			alert("Successfully Signed Up\nnow u can login using your new email!");
		})
		document.querySelector('#form1').addEventListener("submit",(e)=>{
			e.preventDefault();
			let usernamee1 = document.getElementById('username').value;
			let passwordd1 = document.getElementById('password').value;
			if(usernamee1==usernamee &&passwordd1==passwordd||(usernamee1=="admin" && passwordd1=="1234"))
			{
				alert('Logged in Successfully.');
				document.location.replace("Task1Html Page2.html");
			}
			else
			{
				alert("Wrong username or password");
				location.reload();
			}
		})*/
	</script>


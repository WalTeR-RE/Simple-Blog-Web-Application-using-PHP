<?php
include("config.php");

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$uname=$_POST['username'];
	$email=$_POST['email'];
	$password=@password_hash($_POST['password'], PASSWORD_BCRYPT);
	$phonenum=$_POST['Phone'];
	$cpassword=$_POST['cpassword'];
	$query = "INSERT INTO `account`(`username`,`email`,`password`,`phonenumber`,`role`) VALUES ('$uname','$email','$password','$phonenum','user')";

	if($uname!="" && $password!="" && $_POST['password']===$cpassword && $email!='' && $phonenum!='')
	{

		try{
            $conn-> exec($query);

			echo "<script>alert('successfully Registred!')</script>";
			header("refresh:0;url=http://localhost/xampp/projectk/Task%231%20First%20HTML%20Page.php");
		}
		catch(PDOException $erorr){
			echo '<script>alert("some information are currently in use.\nplease change them then try again")</script>';
			
			header("refresh:0;url=http://localhost/xampp/projectk/Task%231%20First%20HTML%20Page.php");
		}
	}
	elseif($_POST['password']!=$cpassword){
    echo '<script>alert("passwords doesn\'t match please make sure they are matched and try again")</script>';
    header("refresh:0;url=http://localhost/xampp/projectk/Task%231%20First%20HTML%20Page.php");
}elseif($email=0){
  
    echo '<script>alert("email is required")</script>';
    header("refresh:0;url=http://localhost/xampp/projectk/Task%231%20First%20HTML%20Page.php");
}
elseif($phonenum=0){
     echo '<script>alert("phone number is required")</script>';
     header("refresh:0;url=http://localhost/xampp/projectk/Task%231%20First%20HTML%20Page.php");
}
	}
	else
	{
		echo "fuck u";
		header("refresh:5;url=http://localhost/xampp/projectk/Task%231%20First%20HTML%20Page.php");
	}
?>
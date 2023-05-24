<?php
include("config.php");
session_start();



if($_SERVER['REQUEST_METHOD']=='POST')
{
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM `account` WHERE `username`=:username";
  $sth = $conn->prepare($query);

  try{
      $sth->execute(array(
      	'username'=>$username));


      $data = $sth->fetchAll(PDO::FETCH_ASSOC);
      if($data){
      	foreach ($data as $k => $v) {
      		if(password_verify($password, $v['password']))
      		{
      			echo '<script>alert("Successfully Logged In")</script>';
      			$_SESSION['username']=@$v['username'];
      			$_SESSION['Role']=@$v['role'];	
				if(!empty($_SESSION['username'])&&!empty($_SESSION['Role'])){
				setcookie("username",$_SESSION['username']);
				setcookie("role",$_SESSION['Role']);
					}
				if($_SESSION['Role']=="Owner")
				{
					header("refresh:0;url=http://localhost/xampp/projectk/AdminPage.php");
				}
				else{
      			header("refresh:0;url=http://localhost/xampp/projectk/UserPage.php");
				}
      		}
      		else{
      			header("refresh:0;url=http://localhost/xampp/projectk/Task%231%20First%20HTML%20Page.html");
      			echo '<script>alert("user not found")</script>';
      		}

      	}
      }
  }
  catch(PDOException $err)
  {
  	echo '<script>alert("user not found")</script>';
    $err-> getMessage();
  }
}else if($_SERVER['REQUEST_METHOD']=='GET')
{
    setcookie("username",'');
	setcookie("role",'');
	session_destroy(); 
	session_abort();
	echo '<script>document.location.replace("http://localhost/xampp/projectk/Task%231%20First%20HTML%20Page.php");</script>';
}

?>


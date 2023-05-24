<?php
session_start();
include("config.php");
if($underMaintenance&&$_COOKIE['role']!="Owner")
{
    header("refresh:0;url=http://localhost/xampp/projectk/Maintenance.html");
	die();
}
if($_COOKIE['role']!="Owner")
{
    echo $_COOKIE['role'];
    header("refresh:50;url=http://localhost/xampp/projectk/UserPage.php");
}
$title ="";
$par="";
$vidlnk="";
$p1="";
$ach="";

$query = "SELECT * FROM `about`";
  $sth = $conn->prepare($query);
  try{
    $sth->execute();


    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    if($data){
        foreach ($data as $k => $v) {
          $par=@$v['Paragraph'];
          $title=@$v['Title'];
    }
}
  }
catch(PDOException $err)
{
  echo '<script>alert("couldnot get Paragraph")</script>';
  $err-> getMessage();
}$query = "SELECT * FROM `video`";
$sth = $conn->prepare($query);
try{
  $sth->execute();


  $data = $sth->fetchAll(PDO::FETCH_ASSOC);
  if($data){
      foreach ($data as $k => $v) {
        $vidlnk=@$v['vidlink'];
  }
}
}
catch(PDOException $err)
{
echo '<script>alert("couldnot get Paragraph")</script>';
$err-> getMessage();
}
$query = "SELECT * FROM `achievements`";
$sth = $conn->prepare($query);
try{
  $sth->execute();


  $data = $sth->fetchAll(PDO::FETCH_ASSOC);
  if($data){
      foreach ($data as $k => $v) {
        $ach=@$v['Title'];
        $p1=@$v['p1'];
  }
}
}
catch(PDOException $err)
{
echo '<script>alert("couldnot get Paragraph")</script>';
$err-> getMessage();
}
setcookie("vidlink",$vidlnk);



?>

<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>E=MC²</title>
		<link rel="icon" type="image/x-icon" href="Images/favicon.ico">
		<link rel="stylesheet" type="text/css" href="CSS/Page2Style.css">
	</head>
	<body>
	<section id="navbar">
<nav>
	<ul class="navul">
		<img src="Images/albert.png" style="width: 50px; height: 50px;">
		<li class="navli"><a class="link active" href="#" onclick="totop()">Home</a></li>
		<li class="navli"><a class="link" href="#abouter">About</a></li>
		<li class="navli"><a class="link" href="#ach">Achievements</a></li>
		<li class="navli"><a class="link" href="#footer">Contact Me!</a></li>
		<li class="navli drop-admin-list">
			<a href="javascript:void(0)" class="drophead">AdminPanel</a>
			<div class="drop-content">
			  <a href="http://localhost/xampp/projectk/Editbloggui.php">Edit Blog</a>
			  <a href="http://localhost/xampp/projectk/Deleteaccountgui.php">Delete Account</a>
			  <a href="http://localhost/xampp/projectk/Changerolesgui.php">Change Roles</a>
			  <a href="http://localhost/xampp/projectk/Maintenance.php"> Close Blog For Maintenance</a>
		  </div>
		</li>
        <li class="navli logout drop-admin-list"><form action="Login.php" method="GET"><input type="submit" class="logouts drophead"  id="logout" value="LogOut"></form>
          <div class="drop-content2">
			 <br> <label> <?php  echo "Logged In As: ".$_COOKIE['username']; ?></label>
		  </div></li>
		<!---
	 	<div class="contact">
		<li class="navli lin"><a href=""></a></li>
		<li class="navli lin"><a href=""></a></li>
	</div>
	-->
	</ul>
</nav>
</section>
<div class="bakcground">
    <div class="photo">
      <img src="Images/img1.png" id="img" class="imgs" alt=".">
	</div>
</div>
<div class="sect2" id="abouter">
	<center>
	<h1 class="abouter"><i><?php echo $title;?></i></h1></center>
	<p class="p1" id="p12"><?php echo $par;?></p>
   
    <center><video class="vid1" id="vid12" controls="controls" poster="Images/img6.jpg">
		<source src="" type="video/mp4">
	</video> </center> 
</div>
<div class="sect3" id="ach"><center>
<h1 class="h2"><i><?php echo $ach; ?></i></h1></center>
<ul class="ol">
    <?php echo $p1; ?>
	</ul>
</div>
<footer id="footer">
<div class="container">
<div class="row">
	<div class="row-of-row">
		<form class="row-of-row-form">
			<h4 class="hed">Sign Up for Our Blog</h4>
			<input type="email" placeholder="enter your email" class="tx"required>
			<input type="submit" value="Register"  class="sub">
		</form>
	</div>
	<div class="row-of-row2">
	<h4 class="hed">Stay Connected</h4>
	<div class="social-list">
       <a href="https://www.facebook.com/WolfSarX/"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentcolor" style="color: blue;" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg></a>
	   <a href="https://bugcrowd.com/_WalTeR_"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="#ff6900" d="M24 12L18 1.387H6L0 12l6 10.613h12zm-5.782 1.658c-.003.825-.122 1.569-.354 2.231a5.05 5.05 0 0 1-.99 1.708a4.316 4.316 0 0 1-1.503 1.093a4.69 4.69 0 0 1-1.896.385a4.158 4.158 0 0 1-1.145-.152a3.754 3.754 0 0 1-.868-.36a3.792 3.792 0 0 1-.601-.435a3.023 3.023 0 0 1-.466-.514h-.04l.02.193c.011.166.018.331.02.497v.528H7.961V7.062c0-.151-.04-.263-.114-.337c-.077-.074-.19-.109-.33-.109h-.811V4.425h2.452c.473-.003.824.108 1.048.331c.222.223.333.576.33 1.049v3.003c-.003.258-.01.467-.02.626l-.02.247h.04a2.898 2.898 0 0 1 .463-.507c.156-.143.354-.284.6-.426c.245-.142.538-.261.876-.36c.38-.1.77-.15 1.162-.148c.702.003 1.334.135 1.894.395a4.118 4.118 0 0 1 1.446 1.11c.4.48.707 1.052.92 1.715c.212.658.317 1.392.32 2.198m-2.803 1.406c.138-.399.206-.852.209-1.366c-.003-.659-.112-1.231-.328-1.718c-.216-.484-.517-.859-.902-1.125a2.347 2.347 0 0 0-1.344-.404a2.57 2.57 0 0 0-.969.186a2.372 2.372 0 0 0-.83.589a2.839 2.839 0 0 0-.579 1.015c-.141.413-.212.906-.216 1.477c0 .397.053.792.159 1.174c.101.366.265.712.483 1.02c.211.3.486.548.805.722c.32.176.698.267 1.127.27c.343.002.683-.07.997-.213a2.43 2.43 0 0 0 .824-.623c.24-.273.428-.607.564-1.004Z"/></svg></a>
	   <a href="https://www.youtube.com/@Zigoo0"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" style="color: red;" class="bi bi-youtube" viewBox="0 0 16 16"><path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/></svg></a>
	   <a href="https://twitter.com/Boomneroli?fbclid=IwAR0rTuR3J9DBynnXRgF2md-g4QqNC3YvaYt4jxAU6v1C2lhfKM5I3jd8GyI"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" style="color:#1da1f2;" class="bi bi-twitter" viewBox="0 0 16 16"><path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/></svg></a>
	   <a href="https://www.pinterest.com/nansclark/albert-einstein/"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" style="color: red;" class="bi bi-pinterest" viewBox="0 0 16 16"><path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z"/></svg></a>
	   <a href="https://www.linkedin.com/in/walt-er-71280a234/"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" style="color:blue;" class="bi bi-linkedin" viewBox="0 0 16 16"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/></svg></a>
	   <a href="https://github.com/WolfStarX" class="github" ><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" style="color: white;" class="bi bi-github" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/> </svg></a>
	</div>
	</div>
</div>
</div>
</footer>
	</body>
	</html>
	<script>
        const buttons = document.querySelectorAll("#navbar .navul .link");
           buttons.forEach(ele => {
			ele.addEventListener("click",function () {
                    const activated = document.getElementsByClassName("active");
					activated[0].className = activated[0].className.replace(" active", "");
                    this.className += " active";
                });
		   });
           let counter=1;
		   const im = document.getElementById('img');
           const img = ['Images/img1.png','Images/img2.jpg','Images/img3.jpg','Images/img4.png','Images/img5.jpg']
           setInterval(function(){
           im.src=img[counter];
		   counter= ++counter%5;
           },2000);
		   function totop()
		   {
            document.documentElement.scrollTo=0;
		   }
           let vid=document.getElementsByClassName('vid1')[0];
           vid.src=decodeURIComponent(document.cookie.split('vidlink=')[1].split(';')[0]);
	</script>



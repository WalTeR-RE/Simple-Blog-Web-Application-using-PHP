<?php
include("config.php");
session_start();


if($_SERVER['REQUEST_METHOD']=='POST')
{ 
   if($_COOKIE['role']!="Owner")
   {
    setcookie('username','');
    setcookie('role','');
    echo '<script>alert("you arenot an Owner")</script>';
    die();
    header("refresh:0;url=http://localhost/xampp/projectk/Task%231%20First%20HTML%20Page.php");
   }
   else{
    if(!empty($_POST['edit'])&&!empty($_POST['query'])){
    $editin=$_POST['edit'];
    $query =$_POST['query'];
        try{
            $q="UPDATE `account` SET role=:editin WHERE username=:query";
            $statement=$conn->prepare($q);
            $statement->execute(array(
                'editin'=>$editin,
                'query'=>$query
            ));
            if($query==$_COOKIE['username'])
            setcookie("role",$editin);
    
            header("refresh:0;url=http://localhost/xampp/projectk/Changerolesgui.php");
            echo '<script>alert("Account Updated Successfully")</script>';
        }
        catch(PDOException $err)
        {
          echo '<script>alert("couldnot Update Account")</script>';
          $err-> getMessage();
        }
      }
else{
    die();
}
   }
}



?>
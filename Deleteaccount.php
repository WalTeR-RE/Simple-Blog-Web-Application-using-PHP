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
    switch($editin){
        case "byid":
    try{
        $q="DELETE FROM `account` WHERE id=:query";
        $statement=$conn->prepare($q);
        $statement->execute(array(
            'query'=>$query
        ));
        header("refresh:0;url=http://localhost/xampp/projectk/Deleteaccountgui.php");
        echo '<script>alert("Account Deleted Successfully")</script>';
    }
    catch(PDOException $err)
    {
      echo '<script>alert("couldnot Delete Account")</script>';
      $err-> getMessage();
    }
    break;
    case "byusername":
        try{
            $q="DELETE FROM `account` WHERE username=:query";
            $statement=$conn->prepare($q);
            $statement->execute(array(
                'query'=>$query
            ));
            header("refresh:0;url=http://localhost/xampp/projectk/Deleteaccountgui.php");
            echo '<script>alert("Account Deleted Successfully")</script>';
        }
        catch(PDOException $err)
        {
          echo '<script>alert("couldnot Delete Account")</script>';
          $err-> getMessage();
        }
        break;
    case "byemail":
        try{
            $q="DELETE FROM `account` WHERE email=:query";
            $statement=$conn->prepare($q);
            $statement->execute(array(
                'query'=>$query
            ));
            header("refresh:0;url=http://localhost/xampp/projectk/Deleteaccountgui.php");
            echo '<script>alert("Account Deleted Successfully")</script>';
        }
        catch(PDOException $err)
        {
          echo '<script>alert("couldnot Delete Account")</script>';
          $err-> getMessage();
        }
        break;
}
}
else{
    die();
}
   }
}



?>
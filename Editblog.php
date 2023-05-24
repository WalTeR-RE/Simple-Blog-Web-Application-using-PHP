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
    switch($editin)
    {
        case "aboutitle":
            try{
            $q="UPDATE `about` SET Title=:query";
            $statement=$conn->prepare($q);
            $statement->execute(array(
                'query'=>$query
            ));
            header("refresh:0;url=http://localhost/xampp/projectk/Editbloggui.php");
            echo '<script>alert("Title Updated Successfully")</script>';
        }
        catch(PDOException $err)
        {
          echo '<script>alert("couldnot update title")</script>';
          $err-> getMessage();
        }
            break;
        case "aboutparagraph":
            try{
                $q="UPDATE `about` SET Paragraph=:query";
                $statement=$conn->prepare($q);
                $statement->execute(array(
                    'query'=>$query
                ));
                header("refresh:0;url=http://localhost/xampp/projectk/Editbloggui.php");
                echo '<script>alert("Paragraph Updated Successfully")</script>';
            }
            catch(PDOException $err)
            {
              echo '<script>alert("couldnot update title")</script>';
              $err-> getMessage();
            }
            break;
            case "video":
                try{
                    $q="UPDATE `video` SET vidlink=:query";
                    $statement=$conn->prepare($q);
                    $statement->execute(array(
                        'query'=>$query
                    ));
                    header("refresh:0;url=http://localhost/xampp/projectk/Editbloggui.php");
                    echo '<script>alert("VideoLink Updated Successfully")</script>';
                }
                catch(PDOException $err)
                {
                  echo '<script>alert("couldnot update title")</script>';
                  $err-> getMessage();
                }
                break;
             case "achievementsTitle":
                try{
                    $q="UPDATE `achievements` SET Title=:query";
                    $statement=$conn->prepare($q);
                    $statement->execute(array(
                        'query'=>$query
                    ));
                    header("refresh:0;url=http://localhost/xampp/projectk/Editbloggui.php");
                    echo '<script>alert("Achievements Title Updated Successfully")</script>';
                }
                catch(PDOException $err)
                {
                  echo '<script>alert("couldnot update title")</script>';
                  $err-> getMessage();
                }
                break;
                break;
            case "achievements":
                try{
                    $q="UPDATE `achievements` SET p1=:query";
                    $statement=$conn->prepare($q);
                    $statement->execute(array(
                        'query'=>$query
                    ));
                    header("refresh:0;url=http://localhost/xampp/projectk/Editbloggui.php");
                    echo '<script>alert("Achievements Updated Successfully")</script>';
                }
                catch(PDOException $err)
                {
                  echo '<script>alert("couldnot update title")</script>';
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
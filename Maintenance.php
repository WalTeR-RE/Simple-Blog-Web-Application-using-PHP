<?php 
include('config.php');
              if($underMaintenance)
              {
                $editin=0;          
  try{
    $q="UPDATE `status` SET Status=:editin";
    $statement=$conn->prepare($q);
    $statement->execute(array(
        'editin'=>$editin
    ));
    echo '<script>alert("Back To Work!")</script>';
      }
  
  catch(PDOException $err)
  {
  	echo '<script>alert("user1 not found")</script>';
    $err-> getMessage();
  }
}
   else
{
    $editin=1;          
  try{
    $q="UPDATE `status` SET Status=:editin";
    $statement=$conn->prepare($q);
    $statement->execute(array(
        'editin'=>$editin
    ));
    echo '<script>alert("Closed!")</script>';
      }
  
  catch(PDOException $err)
  {
  	echo '<script>alert("user1 not found")</script>';
    $err-> getMessage();
  }
}
header("refresh:0;url=http://localhost/xampp/projectk/AdminPage.php");
?>
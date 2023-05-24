<?php

$sname="localhost";
$user="root";
$pass="";
$dbname="";
$underMaintenance=false;
try {
  $conn = new PDO("mysql:host=$sname;dbname=$dbname", $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}



$query = "SELECT * FROM `status`";
  $sth = $conn->prepare($query);

  try{
      $sth->execute(array());


      $data = $sth->fetchAll(PDO::FETCH_ASSOC);
      if($data){
      	foreach ($data as $k => $v) {
      		$underMaintenance=@$v['Status'];
      }
  }
}
  catch(PDOException $err)
  {
  	echo '<script>alert("user not found")</script>';
    $err-> getMessage();
  }


?>
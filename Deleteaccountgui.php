<?php
if($_COOKIE['role']!="Owner")
   {
    setcookie('username','');
    setcookie('role','');
    echo '<script>alert("you arenot authorized to open this action")</script>';
    header("refresh:0;url=http://localhost/xampp/projectk/Task%231%20First%20HTML%20Page.php");
    die();
   }
?>

<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Page</title>
		<link rel="icon" type="image/x-icon" href="Images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="CSS/Page1Style.css">
    </head>
    <form id="form3" action="Deleteaccount.php" method="POST" style="box-shadow: 0 15px 15px 15px rgba(0, 0, 0, 0.644);"> 
        <h1 class="head2"> Delete Account </h1>
        <div class="editdiv">
            <label><b>Who To Remove?</b></label>
            <select name="edit" id="edit-select" required>
                <option value="">--Please choose an option--</option>
                <option value="byid">Delete Account By Id</option>
                <option value="byusername">Delete Account By Username</option>
                <option value="byemail">Delete Account By Email</option>
            </select>
            <input class="listbox1" type="listbox" name="query" required>
        </div>
        <input type="submit" name="Delete" id="sisubmit" value="Delete">
    </form>
</html>
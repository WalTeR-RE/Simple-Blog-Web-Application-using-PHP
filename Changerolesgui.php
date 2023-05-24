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
    <form id="form3" action="Changeroles.php" method="POST" style="box-shadow: 0 15px 15px 15px rgba(0, 0, 0, 0.644);"> 
        <h1 class="head2"> Modify Account's Role </h1>
        <div class="editdiv">
            <label><b>Who To Modify it's role?</b></label>
            <select name="edit" id="edit-select" required>
                <option value="">--Please choose an option--</option>
                <option value="user">To User</option>
                <option value="Admin">To Admin</option>
                <option value="Owner">To SuperAdmin</option>
            </select>
            <input class="listbox1" type="listbox" placeholder="Enther The Username" name="query" required>
        </div>
        <input type="submit" name="Modify" id="sisubmit" value="Modify">
    </form>
</html>
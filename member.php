<?php 
session_start();
if(isset($_SESSION['user'])) {
?>
<!doctype html>
<html>
<head>	
<title>Member</title>
</head>
<body>
<?php echo "Welcome, ".$_SESSION['user']."!";?>
<br />
<h3>Welcome to the member area!</h3>
<p><a href="logout.php">Logout</a></p>
</body>
</html>
<?php
}
else
{
echo "Please Login First! <a href='login.php'>Login</a>";
}
?>
<!doctype html>
<html>
<head>	
<title>Login</title>
	
	<style>
		
	body
	{
		margin: 0 auto;
		background-image: url("Simple.jpg");
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
	
	.container
	{
		width: 400px  ;
		height: 400px ;
		text-align: center;
		margin: 0 auto;
		background-color: rgba(52, 73, 94,0.7) ;
		text-align: center;
		border-radius: 4px;
		margin-top:150px ;
	}
	
	.container img 
	{
		width: 120px  ;
		height: 120px ;
		margin-top: -60px ;
		margin-bottom :30px ;
		
	}
	
	.text
	{
		width: 300px  ;
		height: 45px ;
		font-size: 18px;
		margin-bottom: 20px;
		background-color: #fff;
		border: none;
	}
	
	
		
		
.button {
  padding: 15px 25px ;
  background-color: #f4511e;
  border :none;
  color: #fff;
  text-align: center;
  font-size: 18px;
  border-radius :4px;
  width: 100px;
  font-size: 18px;
  margin: 5px;
}

		
		
		
</style>

</head>
<body>


<div class="container">
		<img src ="men.png">
			<form action="" method="POST">
								
				<input class="text" type="text" name='user' placeholder ="   Enter UserName" ><br/>
				<input class="text" type="password" name='pass' placeholder ="   Enter PassWord" ><br/>	

				<input class="button" type="submit" value='Login' name='submit'>
				
				
			</form>
			
			
			
<?php 
if (isset($_POST['submit'])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {

$user=mysql_real_escape_string($_POST['user']);
$pass=mysql_real_escape_string($_POST['pass']);

$encrypt_password=md5($pass);

$con=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('user') or die("cannot select DB");

$query=mysql_query("SELECT * FROM login WHERE user='$user' AND pass='$encrypt_password'");
$numrows=mysql_num_rows($query);
if($numrows!=0)
{
session_start();
$_SESSION['user']=$user;    

header("Location: member.php");
}
else {
echo "Invalid username or password!";
}

} else {
	echo "All fields are required!";
}
}
?>

<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="register.php">Register</a> 
</body>
</html>
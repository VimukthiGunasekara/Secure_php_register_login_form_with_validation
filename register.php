<!doctype html>
<html>
<head>	
<title>Register</title>

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
		height: 500px ;
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
  width: 200px;

  margin: 5px;
}	
		


			
		
</style>


</head>
<body>
	
		<div class="container">	
			<img src ="men.png">
			
				<form action="" method="POST">
					
					<input class="text" type="text" name='user' placeholder ="   Enter User Name" ><br/>
					<input class="text" type="password" name='pass' placeholder ="   Enter PassWord" ><br/>	

					<input class="button" type="submit" value='Register' name='submit'>
				</form>
				
				
<?php 
if (isset($_POST['submit'])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {

//mysql_real_escape_string() escapes special characters in a string for use in an SQL statement
$user=mysql_real_escape_string($_POST['user']); 
$pass=mysql_real_escape_string($_POST['pass']);

$con=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('user') or die("cannot select DB");

$query=mysql_query("SELECT * FROM login WHERE user='".$user."'");
$numrows=mysql_num_rows($query);
if($numrows==0)
{
//md5() calculates the MD5 hash of a string
$encrypt_password=md5($pass);

$sql="INSERT INTO login(user,pass) VALUES('$user','$encrypt_password')";

$result=mysql_query($sql);


if($result!=1) 
{
echo "Failure!";
}
else{
echo "Account Successfully Created";
}
} else {
echo "That username already exists! Please try again with another.";
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
 <a href="login.php">Login</a>
</body>
</html>
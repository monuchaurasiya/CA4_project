<html>
<head>
<title>Registration</title>
<style>
form {
	width: 400px;
	height: 400px;
	background-color:powderblue;
	position: absolute;
	top:0;
	bottom: 0;
	left: 0;
	right: 0;
  	margin: auto;
	
	</style>
</head>
<body>
<form name="form1" action="" method="post">
<center >
<br>
<br>
<br>
<table>

<tr>
<td>Enter First Name</td>
<td><input type="text" name="t1" required pattern="^[A-Za-z]+"> </td>
</tr>
<tr>
<td>Enter Last Name</td>
<td><input type="text" name="t2" required pattern="^[A-Za-z]+"> </td>
</tr>
<tr>
<td>Enter Username</td>
<td><input type="text" name="t3" required pattern="^[A-Za-z0-9]+"> </td>
</tr>
<tr>
<td>Enter Password</td>
<td><input type="password" name="t4" required pattern="^[A-Za-z0-9]+"> </td>
</tr>
<tr>
<td>Select Gender</td>
<td><input type="radio" name="r1" value="Male" checked>Male<input type="radio" name="r1" value="Female">Female </td>
</tr>
<tr>
<td><input type="submit" name="submit1" value="submit"></td>
<td><a href="login.php">Login</a></td>
</tr>

</table>
<br>
<br>
<br>
<br>
</center>
</form>

<?php
if(isset($_POST["submit1"]))
{
	$link=mysqli_connect("localhost","root","");
	mysqli_select_db($link,"ca4");
	$count=0;
	$res=mysqli_query($link,"select * from registration where username='$_POST[t3]'");
	$count=mysqli_num_rows($res);
	
	if($count>0)
	{
		?>
		<script type="text/javascript">
		alert("This username is already exist choose another");
		</script>
		<?php
	}
	else
	{
		$pwd=md5($_POST["t4"]);
		mysqli_query($link,"insert into registration value('','$_POST[t1]','$_POST[t2]','$_POST[t3]','$pwd','$_POST[r1]')");
		?>
		<script type="text/javascript">
		alert("Registration successfull");
		</script>
		<?php
	}
}
?>

</body>
</html>
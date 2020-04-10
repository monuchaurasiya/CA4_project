<html>
<head>
<title>Login</title>
<style>
form {
	width: 400px;
	height:400px;
	background-color:khaki;
	
	position: absolute;
	top:0;
	bottom: 0;
	left: 0;
	right: 0;
  	margin: auto;
	
	</style>
</head>

<body>

<form name="form1" action="" method="post" >
<center >
<table>
<br>
<br>
<tr>
<td>Enter Username</td>
<td><input type="text" name="t1" required> </td>
</tr>
<tr>
<td>Enter Password</td>
<td><input type="password" name="t2" required> </td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit1" value="login"></td>
</tr>

</table>
<br>
<br>
</center>
</form>

<?php
if(isset($_POST["submit1"]))
{
	$pwd=md5($_POST["t2"]);
	$link=mysqli_connect("localhost","root","");
	mysqli_select_db($link,"ca4");
	$count=0;
	$res=mysqli_query($link,"select * from registration where username='$_POST[t1]' && password='$pwd'");
	$count=mysqli_num_rows($res);
	if($count>0)
	{
		?>
		<script type="text/javascript">
		alert("Login Successfull");
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert("Wrong username or Password");
		</script>
		<?php
	}
}
?>
</body>

</html>

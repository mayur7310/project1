<?php
session_start();
if(isset($_SESSION['uid']))
{
		header('location:admin/admindash.php');
}

?>

<!DOCTYPE HTML>
<html lang="en_US">
 <head>
  <meta charset="UTF-8">
  
  
  <title>Admin Login</title>
 </head>
 <body>
	  <h1 style="color:black; background-color:steelblue;"  align="center">Admin Login</h1>
  
  <form action="login.php" method="post">
	
	<table align="center">

	<tr>
	<td>Username</td>
	<br></br>
		<td>  <input type="text" name="uname" required> <br/></td>
	</tr>
	<br/>

	<tr>
	<td>Password</td>
		<td>  <input type="password" name="pass" required><br/></td>
	</tr>
	
	<tr>
		<td colspan="2" align="center"> <input type="submit" name="login" value="Login"> </td>
	</tr>

	</table>
  </form>
 </body >

</html>



<?php
if(isset($_POST['login']))
{
   $username =$_POST['uname'];
	$password =$_POST['pass'];

	$con=new mysqli("localhost","root","","sms");
	if($con->connect_error)
	{
		die("Failed to connect :" .$con->connect_error);

	}
	else
	{
			$stmt=$con->prepare("select * from admin where username= ?");
			$stmt->bind_param("s",$username);
			$stmt->execute();
			$stmt_result=$stmt->get_result();
			
			if($stmt_result->num_rows > 0)
		{
				$data=$stmt_result->fetch_assoc();

				if($data['password']===$password)
			{
				
					$id=$data['id'];
					
					$_SESSION['uid']=$id;



				


					header('location:admin/admindash.php');


			}
			else
			{
				?>

		<script>
			alert('Username or Password not match !!!');
		window.open('login.php','_self')
			</script>

			<?php
			}
		}
		else
		{
			?>

		<script>
			alert('Username or Password not match !!!');
		window.open('login.php','_self')
			</script>

			<?php
			
		}
	}
}
?>


<!--
<?php
$con=mysqli_connect("localhost","root","","sms");

if(isset($_POST["show"]))
{
		

	
		$q="select * from student";
		$result=mysqli_query($con,$q);
		echo "<h2>Employee Info</h2>";
		echo '<table border="2">';
		echo "<tr><th>Id</th>
					<th>Roll No</th>
					<th>Name</th>
					<th>City</th>
					<th>Pcontact</th>
					<th>Standard</th>
					<th>Image path</th> </tr>";
		while($row=mysqli_fetch_array($result))
	{
		echo "<tr>
					
					<td>$row[0]</td>
					<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>$row[4]</td>
					<td>$row[5]</td>
					<td>$row[6]</td>
					</tr>";
					
	}

}
?>

-->


<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Student Management System</title>
 </head>
 <body>
 <h3 align="right" style="margin-right:20px"><a href="login.php">Admin Login</a></h3>
  <h1 align="center">Welcome to Student Management System </h1>
<form method="post" action="index.php"  enctype="multipart/form-data">
<table style="width:30%" align="center" border="1">
	<tr>
		<td colspan="2" align="center">Student Information</td>
	</tr>
	<tr>
		<td align="left">Choose Standard </td>
		<td>
			<select name="std" >
			<option value="1">1st</option>
			<option value="2">2nd</option>
			<option value="3">3rd</option>
			<option value="4">4th</option>
			<option value="5">5th</option>
			<option value="6">6th</option>
		</td>
	</tr>
	<tr>
		<td align="left">Enter Rollno</td> 
		<td>
			<input type="text" name="rollno" >
		</td>
	</tr>
	<tr>
		<td colspan="2"align="center"> <input type="submit" name="show" value="Show Info"> </td>
	</tr>
</table>
</form>
 </body>
</html>

<!--

<?php
if(isset($_POST['submit']))
{
	include('dbcon.php');
		$standard=$_POST['std'];
		$rollno=$_POST['rollno'];

		//include('dbcon.php');
		//include('function.php');
		//showdetails($standard,$rollno);


			
		//$db = mysqli_connect("localhost", "root", "", "sms");

		$sql="select * from student where rollno='$rollno' and standard='$standard'";

		$run=mysqli_query($con,$sql);

		if(mysqli_num_rows($run)>0)
				{
							
					$data=mysqli_fetch_assoc($run);

			?>

						<table border="1" style="width:0%;">
							<tr>
								<th colspan="3">Student Details</th>
							</tr>

						<tr>
							<td rowspan="5"> <img src="dataimg/<?php echo $data['image']; ?>" style="max-height:150px; max-width:120px;"/> </td>

							<th>Roll No</th>
							<td> <?php echo $data['rollno']; ?> </td>
						</tr>
						<tr>
							<th>Name </th>
							<td> <?php echo $data['name']; ?> </td>

						</tr>

						<tr>
							<th>Standard </th>
							<td> <?php echo $data['standard']; ?> </td>

						</tr>

						<tr>
							<th>Parents Contact No </th>
							<td> <?php echo $data['pcont']; ?> </td>

						</tr>

						<tr>
							<th>City </th>
							<td> <?php echo $data['city']; ?> </td>

						</tr>
						</table>			

				<?php
		}
	else
	{
		
		echo " <script> alert('No Student Found.');</script> ";
		
	}




}		
?>

-->



<!--

<?php
if(isset($_POST['submit']))
{
	$standard=$_POST['std'];
	$rollno=$_POST['rollno'];

	$con=new mysqli("localhost","root","","sms");
	if($con->connect_error)
	{
		die("Failed to connect :" .$con->connect_error);

	}
	else
	{
			$stmt=$con->prepare("select * from student where rollno='$rollno' and standard='$standard'");
			$stmt->bind_param("s",$rollno);
			$stmt->execute();
			$stmt_result=$stmt->get_result();
			
			if($stmt_result->num_rows > 0)
		{
				$data=$stmt_result->fetch_assoc();

				?>
					<form method="post" action="index.php"  enctype="multipart/form-data">
				<table border="1" style="width:0%;">
							<tr>
								<th colspan="3">Student Details</th>
							</tr>

						<tr>
							<td rowspan="5"> <img src="dataimg/<?php echo $data['image']; ?>" style="max-height:150px; max-width:120px;"/> </td>

							<th>Roll No</th>
							<td> <?php echo $data['rollno']; ?> </td>
						</tr>
						<tr>
							<th>Name </th>
							<td> <?php echo $data['name']; ?> </td>

						</tr>

						<tr>
							<th>Standard </th>
							<td> <?php echo $data['standard']; ?> </td>

						</tr>

						<tr>
							<th>Parents Contact No </th>
							<td> <?php echo $data['pcont']; ?> </td>

						</tr>

						<tr>
							<th>City </th>
							<td> <?php echo $data['city']; ?> </td>

						</tr>
						</table>			
						</form>
		
			<?php
			
		}
	}
}
?>




-->







<?php

if(isset($_POST["submit"]))
{
		include('dbcon.php');
	$con = mysqli_connect("localhost", "root", "", "sms");
		$standard=$_POST['std'];
		$rollno=$_POST['rollno'];
		$sql="select * from student where rollno='$rollno' and standard='$standard'";
		$run=mysqli_query($con,$sql);

		if(mysqli_num_rows($run)<1)
		{
			echo "<tr><td colspan='5'>No Records Found</td></tr>";
		}	
		else
		{
				$count=0;
				while($data=mysqli_fetch_assoc($run))
			{
					$count++;
						?>

				<tr align="center">
						<td> <?php echo $count; ?> </td>
						

				
				
				<table border="1" style="width:0%;">
							<tr>
								<th colspan="3">Student Details</th>
							</tr>

						<tr>
							<td rowspan="5"> <img src="dataimg/<?php echo $data["image"]; ?>" style="max-height:150px; max-width:120px;"/> 
							</td>

							<th>Roll No</th>
							<td> <?php echo $data["rollno"]; ?> </td>
						</tr>
						<tr>
							<th>Name </th>
							<td> <?php echo $data["name"]; ?> </td>

						</tr>

						<tr>
							<th>Standard </th>
							<td> <?php echo $data["standard"]; ?> </td>

						</tr>

						<tr>
							<th>Parents Contact No </th>
							<td> <?php echo $data["pcont"]; ?> </td>

						</tr>

						<tr>
							<th>City </th>
							<td> <?php echo $data["city"]; ?> </td>

						</tr>
						</table>			
					
		
			




						
				</tr>

		

							<?php
			}
		}



}

?>



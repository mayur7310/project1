<?php

 $target = "../dataimg/".basename($_FILES['simg']['name']);

  	$db = mysqli_connect("localhost", "root", "", "sms");
		$rolno=$_POST['rollno'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcon=$_POST['pcon'];
		$std=$_POST['std'];
		$id=$_POST['sid'];
		$image = $_FILES['simg']['name'];
		
  
  	
  	$sql = "update student set rollno='$rolno' ,name='$name' ,city='$city' , pcont='$pcon',standard='$std',image='$image' where id=$id;";
  	
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['simg']['tmp_name'], $target)) 
		{
  				?>
				<script>
					alert('Data Updated Successfully');
					window.open('updateform.php?sid=<?php echo $id; ?>','_self');
				</script>	

				<?php
  		}
		else
		{
  			?>
				<script>
					alert('Data Not Updated..!!');
				</script>	

				<?php
  		}
  

?>
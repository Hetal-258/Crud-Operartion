<html>
<head>
</head>
<body>
<?php
$servername='localhost';
$username='root';
$password='M$p@1234';
$dbname = "prac-demo";
$conn=mysqli_connect($servername,$username,$password,$dbname);

		$id=$_GET['id'];
		$image=$_FILES['pic']['name'];
		$tmp_profile=$_FILES['pic']['tmp_name'];
		move_uploaded_file($tmp_profile, "img/".$image);
		
		$query1 = mysqli_query($conn,"SELECT * FROM `demotbl` WHERE id='$id' ");
		while ($test = mysqli_fetch_array($query1))
		{
      ?>	
	<form method="POST">
		
			<table align="center" border="1">
				<tr>
					<td><b>ID</b></td>
					<td>					
						<input type="text" id="id" name="id" value="<?php echo $test['id']; ?>">
					</td>
				</tr>
				<tr>
					<td><b>First Name</b></td>
					<td>					
						<input type="text" id="fname" name="fname" value="<?php echo $test['fname']; ?>">
					</td>
				</tr>
				<tr>
					<td><b>Last Name</b></td>
					<td>				
						<input type="text" id="lname" name="lname" value="<?php echo $test['lname']; ?>">
					</td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td>
						<input type="email" placeholder="Enter Email" name="email" value="<?php echo $test['email']; ?>">
					</td>
				</tr>
				<tr>
					<td><b>Phone Number</b></td>
					<td>
						<input type="tel" name="phone" placeholder="(814)-0876-676"  value="<?php echo $test['phone']; ?>">
					</td>
				</tr>
				<tr>
					<td><b>Gender</b></td>
					<td>
						<input type="radio" id="gender" name="gender" <?php if($test["gender"]=='Male') echo "checked"?> value="Male">Male						
						<input type="radio" id="gender" name="gender" <?php if($test["gender"]=='Female') echo "checked"?> value="Female">Female	
					</td>
				</tr>
					<tr>

					<td><b>City</b></td>
					<td>
						<select name="city">
							<option value=" ">--Select--</option>
							<option name="city" <?php if($test["city"]=='Ahmedabad') {echo "selected";}?>>Ahmedabad</option>

							<option name="city"  <?php if($test["city"]=='Surat') {echo "selected";}?>>Surat</option>

							<option name="city"  <?php if($test["city"]=='Vadodara') {echo "selected";}?>>Vadodara</option>

							
						</select>
					</td>
				</tr>

				<tr>
 						<td><b>Hobby<b></td>
 						<?php
 						$hob=explode(",",$test['hobby']);
 						?>
 						<td><input type="checkbox" name="chk[]" value="Reading" <?php  if(in_array('Reading', $hob)) echo "checked"?>>Reading
 						<input type="checkbox" name="chk[]" value="Writing" <?php  if(in_array('Writing', $hob)) echo "checked"?>>Writing
 						<input type="checkbox" name="chk[]" value="Watching" <?php  if(in_array('Watching', $hob)) echo "checked"?>>Watching</td>
 					</tr>
			
				<tr>
						<td>
						Image
						</td>
						<td>
							<input type="file" name="pic">
		    				 <img src="img/<?php echo $test['image'];?>" height="50px" width="50px">

						</td>
				</tr>	
				<tr>
					<td><b>Address</b></td>
					<td>
						<input type="text" name="address" value="<?php echo $test['address']; ?>">
					</td>
				</tr>
				<?php 
				}?>			
				<tr>
					<td>
					<input type="submit" name="edit" value="Update">
					</td>
				</tr>
			</table>
		</form>

</body>
</html>
<?php
$servername='localhost';
$username='root';
$password='M$p@1234';
$dbname = "prac-demo";
$conn=mysqli_connect($servername,$username,$password,$dbname);
	if(isset($_POST['edit']))
		{
			 $id=$_POST['id'];
			 $fname= $_POST['fname'];
			 $lname= $_POST['lname'];
			  $email= $_POST['email'];
			  $phone= $_POST['phone'];
			  $gender= $_POST['gender'];
			  $city = $_POST['city'];
			  $hobby = implode(',', $_POST['chk']);
			  $add= $_POST['address'];
			  $image=$_FILES['pic']['name'];
			  $tmp_profile=$_FILES['pic']['tmp_name'];
			  move_uploaded_file($tmp_profile, "img/".$image);

		  $query= mysqli_query($conn,"UPDATE `demotbl` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`gender`='$gender',`city`='$city',`hobby`='$hobby]',`image`='$image',`address`='$add' WHERE id='$id' ");
				
					header('Location:displaydatatbale.php');
				}
?>
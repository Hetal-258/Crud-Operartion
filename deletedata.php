<?php
$servername='localhost';
$username='root';
$password='M$p@1234';
$dbname = "prac-demo";
$conn=mysqli_connect($servername,$username,$password,$dbname);
	if(isset($_GET['id']))
	{
		echo $id=$_GET['id'];

		$query=mysqli_query($conn,"DELETE FROM `demotbl` WHERE id='$id' ");
		if($query>0)
		{
			header('Location:displaydatatbale.php');
		}
		else
		{
			mysqli_query($query) or die(mysqli_error());
		}
	}
?>
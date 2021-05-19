<?php
if(isset($_GET["vendorid"])){
	$vendorid=$_GET["vendorid"];
}
$mysqli = mysqli_connect("localhost", "root", "", "vendor") or die("Error in database connection".mysqli_error($mysqli));
$query="DELETE  FROM vendordetails WHERE vendorid='".$vendorid."' ";
$result=$mysqli->query($query);
if($result==TRUE){
	echo"<script>alert('Vendor Removed');</script>";
	echo "<script> window.location.assign('managevendor.php'); </script>";
}else{
	echo "Error".$mysqli->error;
}
?>

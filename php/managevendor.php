<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/customstyle.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/customscript.js"></script>    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="container-fluid"><br>
<a href="../index.php"><button class="btn btn-success float-right">Add New Vendor &nbsp<i class="fa fa-plus-circle"></i></button></a><br>
<h4><span class="bluehead">Local Vendor Creation</span></h4>

<?php

$mysqli = mysqli_connect("localhost", "root", "", "vendor") or die("Error in database connection".mysqli_error($mysqli));

$sql = "SELECT * FROM vendordetails";
$result = $mysqli->query($sql);
?>

<br>
<div style="overflow-x:auto;">
<table id="vendordetailstable">
	<tr>
		<th>Vendor Code</th>
		<th>Vendor Name</th>
		<th>Address1</th>
		<th>Address2</th>
		<th>Pincode</th>
		<th>Contact Person</th>
		<th>Contact</th>
		<th>Mail Id</th>
		<th>GST Number</th>
		<th>PAN Number</th>
		<th>Stock Type</th>
		<th>Delivery Time</th>
		<th>Reorder Level</th>
		<th>Minimum Stock</th>
		<th>Maximum Stock</th>
		<th>Action</th>
	</tr>
		<tr>
<?php
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()){
	$vendorid=$row["vendorid"];
?>

		<td><?php echo $row["vendorcode"]; ?></td>
		<td><?php echo $row["vendorname"]; ?></td>
		<td><?php echo $row["address1"]; ?></td>
		<td><?php echo $row["address2"]; ?></td>
		<td><?php echo $row["pincode"]; ?></td>
		<td><?php echo $row["contactperson"]; ?></td>
		<td><?php echo $row["contact"]; ?></td>
		<td><?php echo $row["mailid"]; ?></td>
		<td><?php echo $row["gstnumber"]; ?></td>
		<td><?php echo $row["pannumber"]; ?></td>
		<td><?php echo $row["stocktype"]; ?></td>
		<td><?php echo $row["deliverytime"]; ?></td>
		<td><?php echo $row["reorderlevel"]; ?></td>
		<td><?php echo $row["minimumstock"]; ?></td>
		<td><?php echo $row["maximumstock"]; ?></td>
		<td>
			<a href="updatevendor.php?vendorid=<?php echo $row['vendorid']; ?>"><i class="fa fa-edit iedit"></i></a> &nbsp
			<a href="deletevendor.php?vendorid=<?php echo $row['vendorid']; ?>" 
				onclick="return confirm('Are you sure you want to delete this item? The data will no longer available in the database')"> 
				<i class="fa fa-trash itrash"></i></a>
		</td>
	</tr>
<?php }?>
<?php }?>
</table>
</div>

<div class="row">
	<button type="button" class="btn btn-info dwnbtn" onclick="exportTableToExcel('vendordetailstable')">
		<i class="fa fa-download"></i> &nbsp Download</button>
</div>
</div>
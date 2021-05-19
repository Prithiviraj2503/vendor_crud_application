<?php
if(isset($_POST["submitbtn"])){
	$mysqli = mysqli_connect("localhost", "root", "", "vendor") or die("Error in database connection".mysqli_error($mysqli));

if(isset($_POST["vendorcode"])){
	$vendorcode=$_POST["vendorcode"];
}
if(isset($_POST["vendorname"])){
	$vendorname=$_POST["vendorname"];
}
if(isset($_POST["address1"])){
	$address1=$_POST["address1"];
}
if(isset($_POST["address2"])){
	$address2=$_POST["address2"];
}
if(isset($_POST["pincode"])){
	$pincode=$_POST["pincode"];
}

if(isset($_POST["contactperson"])){
	$contactperson=$_POST["contactperson"];
}
if(isset($_POST["contact"])){
	$contact=$_POST["contact"];
}
if(isset($_POST["mailid"])){
	$mailid=$_POST["mailid"];
}
if(isset($_POST["gstnumber"])){
	$gstnumber=$_POST["gstnumber"];
}
if(isset($_POST["pannumber"])){
	$pannumber=$_POST["pannumber"];
}

if(isset($_POST["stocktype"])){
	$stocktypearr=$_POST["stocktype"];
	$stocktype=implode(',', $stocktypearr);
}

if(isset($_POST["deliverytime"])){
	$deliverytime=$_POST["deliverytime"];
}
if(isset($_POST["reorderlevel"])){
	$reorderlevel=$_POST["reorderlevel"];
}
if(isset($_POST["minimumstock"])){
	$minimumstock=$_POST["minimumstock"];
}
if(isset($_POST["maximumstock"])){
	$maximumstock=$_POST["maximumstock"];
}

$insert="INSERT INTO vendordetails(vendorcode, vendorname, address1, address2, pincode, contactperson, contact, mailid, gstnumber, pannumber, stocktype, deliverytime, reorderlevel, minimumstock, maximumstock) VALUES('".strip_tags($vendorcode)."',
'".strip_tags($vendorname)."', '".strip_tags($address1)."', '".strip_tags($address2)."', '".strip_tags($pincode)."', '".strip_tags($contactperson)."', '".strip_tags($contact)."', '".strip_tags($mailid)."', '".strip_tags($gstnumber)."', '".strip_tags($pannumber)."', '".strip_tags($stocktype)."', '".strip_tags($deliverytime)."', '".strip_tags($reorderlevel)."', '".strip_tags($minimumstock)."', '".strip_tags($maximumstock)."') ";

$result=$mysqli->query($insert);
if($result==TRUE){
	echo"<script>alert('Succesfully Registered');</script>";
	echo "<script> window.location.assign('php/managevendor.php'); </script>";
}else{
	echo "Error".$mysqli->error;
}
}
?>

<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/customstyle.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/customscript.js"></script>    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="container-fluid"><br>
<a href="php/managevendor.php"><button class="btn btn-primary float-right"><i class="fa fa-user"></i>Manage Vendor</button></a><br>
<h3><span class="bluehead">Local Vendor Creation</span></h3>
	<div class="card">
<!-- General Information -->
		<h5 class="card-title">General Info</h5>
		<form name="vendorform" action="index.php" method="POST">
		<div class="card-body">

			<div class="row">
				<input type="hidden" id="id" name="id">
				<div class="col-md-2">
					<label>Vendor Code</label>
				</div>
				<div class="col-md-4">
					<input type="text" placeholder="VEN1010" id="vendorcode" name="vendorcode">
				</div>

				<div class="col-md-2">
					<label>Vendor Name</label><span class="alert">*</span>
				</div>
				<div class="col-md-4">
					<input type="text"  id="vendorname" name="vendorname">
					<span id="vendornamecheck" class="error">Enter vendor name</span>
				</div>
		    </div>

		    <div class="row">
				<div class="col-md-2">
					<label>Address 1</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="address1" name="address1">
				</div>

				<div class="col-md-2">
					<label>Address 2</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="address2" name="address2">
				</div>
		    </div>

		    <div class="row">
				<div class="col-md-2">
					<label>Pin Code</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="pincode" name="pincode">
					<span id="pincodecheck" class="error">Enter valid pincode</span>
				</div>

				<div class="col-md-2">
					<label>Contact Person</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="contactperson" name="contactperson">
				</div>
		    </div>

            <div class="row">
				<div class="col-md-2">
					<label>Contact Number</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="contact" name="contact">
					<span id="contactcheck" class="error">Enter valid contact number</span>
				</div>

				<div class="col-md-2">
					<label>Mail Id</label>
				</div>
				<div class="col-md-4">
					<input type="text" id="mailid" name="mailid">
					<span id="emailcheck" class="error">Enter valid E-mail</span>
				</div>
		    </div>

		     <div class="row">
				<div class="col-md-2">
					<label>GST Number</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="gstnumber" name="gstnumber">
					<span id="gstcheck" class="error">Enter valid format like : 01ABCDE2345F6Z7</span>
				</div>

				<div class="col-md-2">
					<label>PAN Number</label>
				</div>
				<div class="col-md-4">
					<input type="text" id="pannumber" name="pannumber">
					<span id="pancheck" class="error">Enter valid PAN format : ABCDE1234F</span>
				</div>
		    </div>
        </div>

<!-- Stock Info -->

		<h5 class="card-title">Stock Info</h5>
		<div class="card-body">
			<div class="row">
				<div class="col-md-2">
					<label>Stock Type</label><span class="alert">*</span>
				</div>
				<div class="col-md-4" id="stockfield">
					<input type="text"  id="stocktype" name="stocktype[]">
					<span id="stocktypecheck" class="error">Add stock type</span>
					<div id="stockadd"></div><br>
			</div>
				<div class="col-md-1">
					<button type="button" id="addstock" name="addstock" class="stock-btn">+</button>
					<button type="button" id="removestock" class="stock-btn">-</button>
				</div>
				<div class="col-md-5">
				</div>
		    </div>

		    <div class="row">

				<div class="col-md-2">
					<label>Delivery Time(In Days)</label>
				</div>
				<div class="col-md-4">
					<input type="text" id="deliverytime" name="deliverytime">
				</div>

				<div class="col-md-2">
					<label>Reorder Level</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="reorderlevel" name="reorderlevel">
				</div>
		    </div>

		    <div class="row">
		    	<div class="col-md-2">
					<label>Minimum Stock</label>
				</div>
				<div class="col-md-4">
					<input type="text" id="minimumstock" name="minimumstock">
				</div>

				<div class="col-md-2">
					<label>Maximum Stock</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="maximumstock" name="maximumstock">
				</div>
			</div>

		    <div class="row">
		    	<div class="col-md-4">
		    	<a href="php/bulkupload.php"><button type="button" id="upload" class="btn btn-warning"><i class="fa fa-upload"></i>&nbspUpload</button></a>
		    	<span class="filetype">Only Excel Files Are Allowed</span>
		    	</div>
		    	<div class="col-md-4">
		    	</div>
		    	<div class="col-md-4">
                <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-success"><i class="fa fa-check"></i>&nbspSubmit</button>
		    	<button type="reset" id="cancel" class="btn btn-danger"><i class="fa fa-close"></i>&nbspCancel</button>
		    	</div>
			</div>
        </div>
    </form>
</div>
</div>
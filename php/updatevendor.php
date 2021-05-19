<?php 
$mysqli = mysqli_connect("localhost", "root", "", "vendor") or die("Error in database connection".mysqli_error($mysqli));
if(isset($_GET["vendorid"]))
{
	$vendorid=$_GET["vendorid"];

$query="SELECT * FROM vendordetails WHERE vendorid='".$vendorid."' ";
$result=$mysqli->query($query);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$vendorid=$row["vendorid"];
		$vendorcode=$row["vendorcode"];
		$vendorname=$row["vendorname"];
		$address1=$row["address1"];
		$address2=$row["address2"];
		$pincode=$row["pincode"];
		$contactperson=$row["contactperson"];
		$contact=$row["contact"];
		$mailid=$row["mailid"];
		$gstnumber=$row["gstnumber"];
		$pannumber=$row["pannumber"];
		$stocktype=$row["stocktype"];
		$stocktypearray=explode(",", $stocktype);
		$deliverytime=$row["deliverytime"];
		$reorderlevel=$row["reorderlevel"];
		$minimumstock=$row["minimumstock"];
		$maximumstock=$row["maximumstock"];

	}
}
}
//Update
if(isset($_POST["submitbtn"])){

if(isset($_POST["vendorid"])){
	$vendorid=$_POST["vendorid"];
}
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

$update="UPDATE  vendordetails  SET
vendorcode='".strip_tags($vendorcode)."', vendorname='".strip_tags($vendorname)."',
address1='".strip_tags($address1)."', address2='".strip_tags($address2)."',
pincode='".strip_tags($pincode)."', contactperson='".strip_tags($contactperson)."',
contact='".strip_tags($contact)."',mailid='".strip_tags($mailid)."',
gstnumber='".strip_tags($gstnumber)."', pannumber='".strip_tags($pannumber)."',
stocktype='".strip_tags($stocktype)."', deliverytime='".strip_tags($deliverytime)."',
reorderlevel='".strip_tags($reorderlevel)."', minimumstock='".strip_tags($minimumstock)."', 
maximumstock='".strip_tags($maximumstock)."'
WHERE vendorid ='".strip_tags($vendorid)."' ";

$result=$mysqli->query($update);
if($result==TRUE){
	echo"<script>alert('Updated Succesfully');</script>";
	echo"<script>window.location.assign('managevendor.php');</script>";
}else{
	echo "Error".$mysqli->error;
}
}
?>

<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/customstyle.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/customscript.js"></script>    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="container-fluid"><br>
<a href="managevendor.php"><button class="btn btn-primary float-right"><i class="fa fa-user"></i>Manage Vendor</button></a><br>
<h3><span class="bluehead">Local Vendor Creation</span></h3>
	<div class="card">
<!-- General Information -->
		<h5 class="card-title">General Info</h5>
		<form name="vendorform" action="updatevendor.php" method="POST">
		<div class="card-body">

			<div class="row">
				<input type="hidden" id="vendorid" name="vendorid" value="<?php if(isset($vendorid)){ echo $vendorid; }?>">
				<div class="col-md-2">
					<label>Vendor Code</label>
				</div>
				<div class="col-md-4">
					<input type="text" id="vendorcode" name="vendorcode" value="<?php if(isset($vendorcode)){ echo $vendorcode; }?>">
				</div>

				<div class="col-md-2">
					<label>Vendor Name</label><span class="alert">*</span>
				</div>
				<div class="col-md-4">
					<input type="text"  id="vendorname" name="vendorname" value="<?php if(isset($vendorname)){ echo $vendorname; }?>">
					<span id="vendornamecheck" class="error">Enter vendor name</span>
				</div>
		    </div>

		    <div class="row">
				<div class="col-md-2">
					<label>Address 1</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="address1" name="address1" value="<?php if(isset($address1)){ echo $address1; }?>">
				</div>

				<div class="col-md-2">
					<label>Address 2</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="address2" name="address2" value="<?php if(isset($address2)){ echo $address2; }?>">
				</div>
		    </div>

		    <div class="row">
				<div class="col-md-2">
					<label>Pin Code</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="pincode" name="pincode" value="<?php if(isset($pincode)){ echo $pincode; }?>">
					<span id="pincodecheck" class="error">Enter valid pincode</span>
				</div>

				<div class="col-md-2">
					<label>Contact Person</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="contactperson" name="contactperson" value="<?php if(isset($contactperson)){ echo $contactperson; }?>">
				</div>
		    </div>

            <div class="row">
				<div class="col-md-2">
					<label>Contact Number</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="contact" name="contact" value="<?php if(isset($contact)){ echo $contact; }?>">
					<span id="contactcheck" class="error">Enter valid contact number</span>
				</div>

				<div class="col-md-2">
					<label>Mail Id</label>
				</div>
				<div class="col-md-4">
					<input type="text" id="mailid" name="mailid" value="<?php if(isset($mailid)){ echo $mailid; }?>">
					<span id="emailcheck" class="error">Enter valid E-mail</span>
				</div>
		    </div>

		     <div class="row">
				<div class="col-md-2">
					<label>GST Number</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="gstnumber" name="gstnumber" value="<?php if(isset($gstnumber)){ echo $gstnumber; }?>">
					<span id="gstcheck" class="error">Enter valid format like : 01ABCDE2345F6Z7</span>
				</div>

				<div class="col-md-2">
					<label>PAN Number</label>
				</div>
				<div class="col-md-4">
					<input type="text" id="pannumber" name="pannumber" value="<?php if(isset($pannumber)){ echo $pannumber; }?>">
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
				<?php foreach ($stocktypearray as $stocktype) { ?>
					<input type="text"  id="stocktype" name="stocktype[]" value="<?php if(isset($stocktype)){ echo $stocktype; }?>
					">
				<?php } ?>
					<div id="stockadd"></div><br>
			</div>
				<div class="col-md-6">
				</div>
		    </div>

		    <div class="row">

				<div class="col-md-2">
					<label>Delivery Time(In Days)</label>
				</div>
				<div class="col-md-4">
					<input type="text" id="deliverytime" name="deliverytime" value="<?php if(isset($deliverytime)){ echo $deliverytime; }?>">
				</div>

				<div class="col-md-2">
					<label>Reorder Level</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="reorderlevel" name="reorderlevel" value="<?php if(isset($reorderlevel)){ echo $reorderlevel; }?>">
				</div>
		    </div>

		    <div class="row">
		    	<div class="col-md-2">
					<label>Minimum Stock</label>
				</div>
				<div class="col-md-4">
					<input type="text" id="minimumstock" name="minimumstock" value="<?php if(isset($minimumstock)){ echo $minimumstock; }?>">
				</div>

				<div class="col-md-2">
					<label>Maximum Stock</label>
				</div>
				<div class="col-md-4">
					<input type="text"  id="maximumstock" name="maximumstock" value="<?php if(isset($maximumstock)){ echo $maximumstock; }?>">
				</div>
			</div>

		    <div class="row">
		    	<div class="col-md-4">
		    	</div>
		    	<div class="col-md-4">
		    	</div>
		    	<div class="col-md-4">
                <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-success"><i class="fa fa-edit"></i>&nbspUpdate</button>
		    	<button type="reset" id="cancel" class="btn btn-danger"><i class="fa fa-close"></i>&nbspCancel</button>
		    	</div>
			</div>
        </div>
    </form>
</div>
</div>
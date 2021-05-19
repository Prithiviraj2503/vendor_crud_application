<?php
if(isset($_POST["submitbtn"])){
error_reporting(0);
include('../vendorbulk/php-excel-reader/excel_reader2.php');
include('../vendorbulk/SpreadsheetReader.php');
$mysqli = mysqli_connect("localhost", "root", "", "vendor") or die("Error in database connection".mysqli_error($mysqli));

$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if(in_array($_FILES["file"]["type"], $allowedFileType)){ 

        $targetPath = '../uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
  
        $Reader = new SpreadsheetReader($targetPath);        
        $sheetCount = count($Reader->sheets());

        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);   
            foreach ($Reader as $Row)
            {
            if(isset($Row[0])) {
                $quer="SELECT vendorcode from vendordetails";
                $result = $mysqli->query($quer);
                if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                $vendorcodearray[]=$row["vendorcode"];
                }
                $vendorcode = mysqli_real_escape_string($mysqli, $Row[0]);

                if (!in_array($vendorcode, $vendorcodearray)){
                $vendorcode="";
                if(isset($Row[0])) {
                    $vendorcode = mysqli_real_escape_string($mysqli,$Row[0]);
                }

                $vendorname = "";
                if(isset($Row[1])) {
                    $vendorname = mysqli_real_escape_string($mysqli,$Row[1]);
                } 
          
                $address1 = "";
                if(isset($Row[2])) {
                    $address1 = mysqli_real_escape_string($mysqli,$Row[2]);
                }                           
                                
                $address2 = "";
                if(isset($Row[3])) {
                    $address2 = mysqli_real_escape_string($mysqli,$Row[3]);
                } 

                  $pincode = "";
                if(isset($Row[4])) {
                    $pincode = mysqli_real_escape_string($mysqli,$Row[4]);
                }
                
                $contactperson = "";
                if(isset($Row[5])) {
                    $contactperson = mysqli_real_escape_string($mysqli,$Row[5]);
                }
                 $contact = "";
                if(isset($Row[6])) {
                    $contact = mysqli_real_escape_string($mysqli,$Row[6]);
                } 
                 $mailid = "";
                if(isset($Row[7])) {
                    $mailid = mysqli_real_escape_string($mysqli,$Row[7]);
                } 
                $gstnumber="";
                if(isset($Row[8])) {
                    $gstnumber = mysqli_real_escape_string($mysqli,$Row[8]);
                } 
                $pannumber="";
                if(isset($Row[9])) {
                    $pannumber = mysqli_real_escape_string($mysqli,$Row[9]);
                } 
                $stocktype="";
                if(isset($Row[10])) {
                    $stocktype = mysqli_real_escape_string($mysqli,$Row[10]);
                } 
                $deliverytime="";
                if(isset($Row[11])) {
                    $deliverytime = mysqli_real_escape_string($mysqli,$Row[11]);
                }
                $reorderlevel="";
                if(isset($Row[12])) {
                    $reorderlevel = mysqli_real_escape_string($mysqli,$Row[12]);
                } 
                $minimumstock="";
                if(isset($Row[13])) {
                    $minimumstock = mysqli_real_escape_string($mysqli,$Row[13]);
                } 
                $maximumstock="";
                if(isset($Row[14])) {
                    $maximumstock = mysqli_real_escape_string($mysqli,$Row[14]);
                }
                $query = "INSERT INTO vendordetails(vendorcode, vendorname, address1, address2, pincode, contactperson, contact, mailid, gstnumber, pannumber, stocktype, deliverytime, reorderlevel, minimumstock, maximumstock) VALUES('".strip_tags($vendorcode)."','".strip_tags($vendorname)."', '".strip_tags($address1)."', '".strip_tags($address2)."', '".strip_tags($pincode)."', '".strip_tags($contactperson)."', '".strip_tags($contact)."', '".strip_tags($mailid)."', '".strip_tags($gstnumber)."', '".strip_tags($pannumber)."', '".strip_tags($stocktype)."', '".strip_tags($deliverytime)."', '".strip_tags($reorderlevel)."', '".strip_tags($minimumstock)."', '".strip_tags($maximumstock)."') ";

                    $result = $mysqli->query($query);
                    if($result == TRUE){
                    $success = "Data Updated Successfully<br>";
                    }else{
                    $errorupload = "Follwed Data Not Uploaded".$result->error."<br>";
                }
                }else{
                $codepresent[]=$vendorcode;
                continue;
                }
            }
        }
    }
}
}else{
    $errorupload="Select excel file only";
}
}
?>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/customstyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../js/customscript.js"></script>    
</head>

<div class="container-fluid"><br>
<a href="../index.php">
	<button class="btn btn-success float-right">Add New Vendor &nbsp <i class="fa fa-plus-circle"></i></button></a> &nbsp
<a href="managevendor.php">
	<button class="btn btn-primary float-right">Manage Vendor <i class="fa fa-user"></i>&nbsp</button></a>

<form name="bulkupload" action="bulkupload.php" method="post" enctype="multipart/form-data">

<div class="uploadbox">
	<center><h4><span class="bluehead">Bulk Upload Vendor Information</span></h4></center>
<input type="file" id="file" name="file">
<center><button type="submit" id="submitbtn" name="submitbtn" class="btn btn-success upbtn" ><i class="fa fa-upload"></i>Upload</button></center>
<br>
<span class="success"><?php if(isset($success)){ echo $success; }?>
<span class="errorbulk"><?php if(isset($errorupload)){ echo $errorupload; }?>
<span class="errorbulk"><?php
if(isset($codepresent)){
foreach ($codepresent as $code) {
	echo "Vendor Code"." ".$code." "."Already Registerd"."<br>";
}}?>
</span>
<br>
</div>
</form>
</div>



 $(document).ready(function() {  

// Add Stock Details
    $("body").on("click","#addstock" ,function() {  
    var field=$("#stockfield").html();
    $("#stockadd").append(field);  
    });  

    $("body").on("click","#removestock", function() {  
    $("#stockadd").children().last().remove();
    }); 



//E-mail check
$('#emailcheck').hide();	
let emailError = true;
$('#mailid').keyup(function () {			
	validateemail();
});
function validateemail() {

var $email = $('#mailid'); //change form to id or containment selector
var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
if ($email.val() == '' || !re.test($email.val()))
{

	$('#emailcheck').show();
	emailError = false;
	return false;
}
else
{
	$('#emailcheck').hide();
	emailError = true;
}	
}
// Validate Vendorname
	$('#vendornamecheck').hide();	
	let vendornameError = true;
	$('#vendorname').keyup(function () {	
	validatevendorname();
	});
	
	function validatevendorname(){
	let vendornameValue = $('#vendorname').val();	
	if (vendornameValue.length == '') {
	$('#vendornamecheck').show();
	     vendornameError = false;
		return false;
	}
	else {
		$('#vendornamecheck').hide();
		vendornameError = true;	
	}
	}

//contactnumber error
$('#contactcheck').hide();	
let contactError = true;
$('#contact').keyup(function () {			
	validatecontact();
});
function validatecontact() {
	let contactValue = $('#contact').val();

	var letters = /^[0-9]+$/;
	if(!(contactValue.match(letters)) || contactValue.length>10 || contactValue.length<10)
	{
	
			$('#contactcheck').show();
			contactError = false;
				return false;
	}	
	else {
		$('#contactcheck').hide();
		contactError = true;
	
	}
}

// Validate pincode
$('#pincodecheck').hide();	
let pincodeError = true;
$('#pincode').keyup(function () {			
	validatepincode();
});
function validatepincode() {
	let pincodeValue = $('#pincode').val();
	var letters = /^[0-9]+$/;
	if(!(pincodeValue.match(letters)) || pincodeValue.length>6 || pincodeValue.length<6)
	{
	
			$('#pincodecheck').show();
			pincodeError = false;
			return false;
	}	
	else {
		$('#pincodecheck').hide();
		pincodeError = true;
	}
}

    
//Pan Validation
$('#pancheck').hide();	
let panError = true;
$('#pannumber').keyup(function () {			
	validatepan();
});
function validatepan() {
	let panValue = $('#pannumber').val();
	var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;

	if (!(panValue.match(regpan))) {
	$('#pancheck').show();
	panError = false;
		return false;
	}	
	else {
		$('#pancheck').hide();
		panError = true;
	}
	}

//GST Check

$('#gstcheck').hide();	
let gstError = true;
$('#gstnumber').keyup(function () {			
	validategst();
});
function validategst() {
	let gstValue = $('#gstnumber').val();
	var reggst = "^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$"; 

	if (!(gstValue.match(reggst))) {
	$('#gstcheck').show();
	gstError = false;
		return false;
	}	
	else {
		$('#gstcheck').hide();
		gstError = true;
	}
	}

//Stocktype check

// Validate Vendorname
	$('#stocktypecheck').hide();	
	let stocktypeError = true;
	$('#stocktype').keyup(function () {	
	validatestocktype();
	});
	
	function validatestocktype(){
	let stocktypeValue = $('#stocktype').val();	
	if (stocktypeValue.length == '') {
	$('#stocktypecheck').show();
	     stocktypeError = false;
		return false;
	}
	else {
		$('#stocktypecheck').hide();
		stocktypeError = true;	
	}
	}

	$('#submitbtn').click(function () {	

		validatepan();
		validatepincode();
		validatevendorname();
		validatecontact();
		validateemail();
		validategst();
		validatestocktype();

		if (panError == true && pincodeError == true && vendornameError == true && contactError == true
		 && emailError == true && gstError == true && stocktypeError == true){
			return true;
		}else{
			return false;
		}


	});
    });
//export excel
	function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    filename = filename?filename+'.xls':'excel_data.xls';
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
        downloadLink.download = filename;
        downloadLink.click();
    }
}

        
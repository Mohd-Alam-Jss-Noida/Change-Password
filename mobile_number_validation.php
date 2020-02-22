<!DOCTYPE html>
<html>
<head>
	<title>MOBILE NUMBER VALIDATION</title>
</head>
<body>
	<!-- MOBILE NUMBER VALIDATION -->
	<form name="bking" action="" method="post" onsubmit="return validateTicket();">
		<tr>
			<td>
				<input type="text" name="contact" id="contact" maxlength="10" autocomplete="off" onkeypress="return Contactvalidate(event);" />
				<span style="color: red" id="lblmsg"></span><br>
				<span style="color: red" id="valbookTkt"></span><br>
			</td>
	    	<td align="center">
	        	<input type="submit" name="submit" value="submit" tabindex="1"/>
	    	</td>
		</tr>
	</form>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	//ADD BY MOHD ALAM 09/01/2019 //CHARACTOR VALIDATION CODE STAR
	function Contactvalidate(key) {
	    var keycode = (key.which) ? key.which : key.keyCode;
	    if (!(keycode == 8 || keycode == 46) && (keycode < 48 || keycode > 57)) {
	        $("#valbookTkt").html("Only Digits Allowed.");
	        $("#contact").css("border", "1px solid red");
	        return false;
	    }
	    else {
	        $("#valbookTkt").html(" ");
	        $("#contact").css("border", "1px solid rgb(169, 169, 169)");
	        return true;
	    }
	}
	function validateTicket() {
		var flg = true;
		var contact = $("#contact").val();
	    var contact = contact.trim();

	    if (contact == "") {
	    	$("#contact").css("border", "1px solid red");
            $("#contact").focus();
	        $("#valbookTkt").html("Contact Number Can Not Be Blank");
	        alert("Contact Number Can Not Be Blank");
	        flg = false;
	    }
	    else if (contact <= 0) {
	    	$("#contact").css("border", "1px solid red");
            $("#contact").focus();
	        $("#valbookTkt").html("All digits zero not Allowed");
	        alert("All digits zero not Allowed.");
	        flg = false;
	    }
	    else if(contact.indexOf('.') !== -1) {
	    	$("#contact").css("border", "1px solid red");
            $("#contact").focus();
	        $("#valbookTkt").html("Contact Number not accept float value");
	        alert("Contact Number not accept float value");
	        flg = false;
	    }
	    else if (contact.length < 10) {
	    	$("#contact").css("border", "1px solid red");
            $("#contact").focus();
	        $("#valbookTkt").html("Contact Number shouldn't be less than 10 digits");
	        alert("Contact Number shouldn't be less than 10 digits");
	        flg = false;
	    }
	    else if (contact.length > 10) {
	    	$("#contact").css("border", "1px solid red");
            $("#contact").focus();
	        $("#valbookTkt").html("Contact Number shouldn't be grater than 10 digits");
	        alert("Contact Number shouldn't be grater than 10 digits");
	        flg = false;
	    }
	    else {
            $("#contact").css("border", "1px solid rgb(169, 169, 169)");
            $("#valbookTkt").html(" ");
        }
	    return flg;
	}
</script>
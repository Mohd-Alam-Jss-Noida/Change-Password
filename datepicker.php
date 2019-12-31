<!DOCTYPE html>
<html>
<head>
	<title>DATEPICKER</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- DATEPICKER ONLINE CDN ADD BY MOHD ALAM 04/12/2019 -->
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	<link rel="stylesheet" href="/resources/demos/style.css">
  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body style="background-color: #DAE3C2;">
	<form name="reservation_quotas" method="POST" onsubmit="return ValidationEvent()">
		<table border="1" align="center" width="50%">
			<tr>
				<td>From Date:</td>
				<td>
					<input type="text" id="datepicker_from" name="from_date" value="<?php echo ($_REQUEST['from_date'])? $_REQUEST['from_date'] : date('d-m-Y', strtotime("-1 days"));?>" autocomplete="off" size="22" required="required" tabindex="2" />
				</td>
			</tr>
			<tr>
				<td>Till Date:</td>
				<td>
					<input type="text" id="datepicker_till" name="till_date" value="<?php echo ($_REQUEST['till_date'])? $_REQUEST['till_date'] : date('d-m-Y');?>" autocomplete="off" size="22" required="required" tabindex="3" />
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center;"><input type="submit" name="insert" id="insert" value="View Revenue" tabindex="4"  /></td>
			</tr>
		</table>
	</form>
	<script type="text/javascript">
	//ADD BY MOHD ALAM 22/11/2019 DATEPICKER JAVASCRIPT CODE.
	$(function() {
		$( "#datepicker_from" ).datepicker({
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
			changeYear: true,
			yearRange: "-50:+0",
			maxDate: -1
		});
	});

	$(function() {
		$( "#datepicker_till" ).datepicker({
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
			changeYear: true,
			yearRange: "-50:+0",
			maxDate: -1
		});
	});

    //JAVASCRIPT START DATE AND END DATE VALIDATION BY MOHD ALAM 21/12/2019
    function ValidationEvent() {
    	var start_date = document.getElementById("datepicker_from").value;
    	var end_date = document.getElementById("datepicker_till").value;
    	alert(start_date);
    	alert(end_date);
    	if(process(start_date) > process(end_date)){
    		alert("Till Date should be greater or Equal to Start Date");
    		return false;
    	}
    	function process(date){
    		var parts = date.split("-");
    		return new Date(parts[2],parts[1]-1,parts[0]);
    	}
    }
</script>
</body>
</html>
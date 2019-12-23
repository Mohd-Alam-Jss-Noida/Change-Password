<?php
	date_default_timezone_set('Asia/Kolkata');
    echo$todat = date("Y-m-d H:i:s");
    echo "<br>";
    echo$yesterday = "2019-10-16 00:00:00";
    echo "<br>";
    echo$tomm = "2019-10-22 00:00:00";
    echo "<br>";

    if ((strtotime($todat) > strtotime($yesterday)) && (strtotime($todat) < strtotime($tomm))) {
    	echo "Success";
    }
    else {
    	echo "Fail";
    }
    echo "<br><br><br>";
    echo$todat = time("Y-m-d H:i:s");
    echo "<br>";
    echo$yesterday = strtotime("2019-10-16 00:00:00");
    echo "<br>";
    echo$tomm = strtotime("2019-10-22 00:00:00");
    echo "<br>";

    if ( ($todat > $yesterday) && ($todat < $tomm) ) {
    	echo "Success";
    }
    else {
    	echo "Fail";
    }
	
	//JAVASCRIPT SRART DATE AND END DATE BVALIDATION
	<form name="reservation_quotas" method="POST" onsubmit="return ValidationEvent()">
	function ValidationEvent() {
        var start_date = document.getElementById("datepicker_from").value;
        var end_date = document.getElementById("datepicker_till").value;

        if(process(start_date) > process(end_date)){
            alert("Till Date should be greater or Equal to Start Date");
            return false;
        }
        function process(date){
            var parts = date.split("-");
            return new Date(parts[2],parts[1]-1,parts[0]);
        }
    }

?>

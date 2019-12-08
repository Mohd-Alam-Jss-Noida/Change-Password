<?php
session_start();
if(!isset($_SESSION['REV_AUTH'])){
	header('Location: login.php');
}
include_once("connect.php");

/*$old_pass=$_REQUEST['password1'];
$new_pass=$_REQUEST['password'];

$Data=explode("|",$_SESSION['REV_AUTH']);
$query="UPDATE USER_MASTER set PASSWORD='$new_pass' where ID=$Data[1] AND PASSWORD='$old_pass'";//echo $query;
$sth = mysqli_query($con,$query);
if(mysqli_affected_rows($con)>0){
	echo "success";
}*/
//echo $query;
?>

<?php
error_reporting(E_ALL);
// error_reporting(0);
$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['flg']) && $_POST['old_password'] !="" && $_POST['new_password'] !="" && $_POST['confirm_password'] !="") {

		echo$old_password = trim($_POST['old_password']);
		echo$new_password = trim($_POST['new_password']);
		echo$confirm_password = trim($_POST['confirm_password']);

		if((strlen($old_password) >= 8 && strlen($old_password) <= 15) && (strlen($new_password) >= 8 && strlen($new_password) <= 15) && (strlen($confirm_password) >= 8 && strlen($confirm_password) <= 15)) {

			$query = "SELECT password FROM ibrs_users WHERE USER_CD = '" . $_GET['ucd'] . "' ";
			$result = mysql_query($query) or die(mysql_error());
			if (mysql_num_rows($result) == 1) {
				if ($row = mysql_fetch_array($result)) {
					$PASSWORD = $row['password'];
				}
			}

			if (md5($old_password) == $row['password']) {

				if (md5($new_password) != $row['password']) {

					if ($new_password == $confirm_password) {

						date_default_timezone_set('Asia/Kolkata');
						$update_dt = date("Y-m-d H:i:s");
						$expire_dt = date("Y-m-d H:i:s", strtotime("+90 days"));
						$flag = true;
						$query1 = "UPDATE ibrs_users SET PASSWORD=MD5('$new_password') WHERE USER_CD='" . $_GET['ucd'] . "'";

						$result1 = mysql_query($query1);

						if (!$result1) {
							$flag = false;
							echo "Error details: " . mysql_error() . ".";
						}

                        /*$query2 = "UPDATE emp_login SET old_password=MD5('$old_password'), new_password=MD5('$new_password'), update_dt='$update_dt', expire_dt='$expire_dt' WHERE USER_CD='" . $_GET['ucd'] . "'";

                        $result2 = mysql_query($query2);*/

                        $query2 = "UPDATE emp_login SET status= 'I' WHERE USER_CD='" .$_GET['ucd']. "' AND status = 'A' ";

                        $result2 = mysql_query($query2) or die(mysql_error());
                        if (!$result2) {
                        	echo "Error details: " . mysql_error() . ".";
                        }
                        $today = date("Y-m-d H:i:s");
                        $sql12="INSERT INTO emp_login (USER_CD, password, old_password,new_password,update_dt,expire_dt,status,creation_dt) 
                        values ('".$_GET['ucd']."','".$new_password."',
                        '".MD5($old_password)."',
                        '".MD5($new_password)."',
                        '".$update_dt."',
                        '".$expire_dt."','A', '".$today."')";

                        $resultQ = mysql_query($sql12) or die(mysql_error());

                        if (!$resultQ) {
                        	echo "Error details: " . mysql_error() . ".";
                        }

                        if ($flag) {
                        	$_SESSION['CHANGE_PASS'] = "Your password has been changed successfully! Thank you! Please Login Again.";
                        	header("Location:../login/login.php");
                        }
                        else {
                        	echo "Something went wrong";
                        }
                    }
                    else {
                    	$error = "Check whether New Password and Confirm Password are same!";
                    }
                }
                else {
                	$error = "Previous password and new password cannot be same!";
                }
            }
            else {
            	$error = "Please Enter Correct Old Password!";
            }
        }
        else {
        	$error = "Password must have between 8 to 15 characters!";
        } 
    }
    else {
    	$error = "All fields are required!";
    }
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="lib/resources/css/ext-all.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style>
		.x-panel-header {
		    color: #15428b;
		    font-weight: bold;
		    font-size: 20px;
		    font-family: tahoma,arial,verdana,sans-serif;
		    border-color: #99bbe8;
		    background-image: url(../images/default/panel/white-top-bottom.gif);
		    background-color: #99bbe8;
		    text-align: center;
		    padding: 25px 0px 25px 0px;
    	}
    	.x-panel-header1 {
		    color: #15428b;
		    font-weight: bold;
		    font-size: 14px;
		    font-family: tahoma,arial,verdana,sans-serif;
		    border-color: #99bbe8;
		    background-image: url(../images/default/panel/white-top-bottom.gif);
		    background-color: #99bbe8;
		    text-align: center;
		    padding: 10px 0px 10px 0px;
    	}
	</style>
</head>
<body>
	<div id="wrapper">
			<div>
				<p class="x-panel-header">DTC ETIM Revenue (Welcome, 
					<?php
					$REV_AUTH = explode('|', $_SESSION['REV_AUTH']);
					echo $REV_AUTH[0];
					?>
				)</p>
			</div>
		<div leftmargin="0" style="overflow-x:auto; width: 40%; margin: auto;">
			<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="3">
			<tr>
				<td valign="top">
					<br />
					<div class="x-panel-header1">Change Password</div><br>
					<form method="POST" onsubmit="return passwordValidation();">
						<table border="0" align="center" >
							<tr>
								<td>
									<table border="0" align="center" style="border: #802662 solid thin; border-radius: 5px; padding: 30px 34px 30px 33px;">
                                    <form name="chngUsrPass" method="POST" onsubmit="return passwordValidation();"></form>
                                        <tbody>
                                        <tr>
                                            <td>Old Password</td>
                                            <td><input name="old_password" id="old_password" onblur="clearstatus();" size="30" maxlength="15" tabindex="1" autocomplete="off" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" autofocus="autofocus" type="password"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="color: red" id="lblmsg1" align="center"></td>
                                        </tr>
                                        <tr>
                                            <td>New Password</td>
                                            <td><input name="new_password" id="new_password" onblur="clearstatus();" size="30" maxlength="15" tabindex="2" autocomplete="off" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" type="password"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="color: red" id="lblmsg2" align="center"></td>
                                        </tr>
                                        <tr>
                                            <td>Confirm New Password:</td>
                                            <td><input name="confirm_password" id="confirm_password" size="30" maxlength="15" tabindex="3" autocomplete="off" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" type="password"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="color: red" id="lblmsg3" align="center"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center"><input value="Submit" tabindex="4" type="submit">
                                                <input name="flg" value="1" type="hidden"></td>
                                        </tr>
                                    </tbody></table>
								</td>
							</tr>
						</table>
					</form>
					<div style="color: #802662; text-align: center; font-size: 18px;"><?php echo ($error) ? "$error" : ""; ?></div>
				</td>
			</tr>
		</div>
		</table>
	</div>
</body>
<script>
	
	function passwordValidation() {
		var rtn=true;
		var old_password=$("#old_password").val();
		var new_password=$("#new_password").val();
		var confirm_password=$("#confirm_password").val();
		//var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{8,15}$/;

		if(confirm_password == null || confirm_password=="") {
			$("#confirm_password").css("border", "1px solid red");
			$("#confirm_password").focus();
			$("#lblmsg3").html("Please Enter Confirm New Password");
			rtn= false;
		}

		/*else if (reg.test($.trim(confirm_password)) == false) {
			$("#confirm_password").css("border", "1px solid red");
			$("#confirm_password").focus();
			$("#lblmsg3").html("Confirm New Password requires one lower case letter, one upper case letter, one digit, 8-15 length.");
			rtn=false;
		}*/

		else {
			$("#confirm_password").css("border", "1px solid rgb(169, 169, 169)");
			$("#lblmsg3").html(" ");
		}

		if(new_password == null || new_password=="") {
			$("#new_password").css("border", "1px solid red");
			$("#new_password").focus();
			$("#lblmsg2").html("Please Enter New Password");
			rtn= false;
		}

		/*else if (reg.test($.trim(new_password)) == false) {
			$("#new_password").css("border", "1px solid red");
			$("#new_password").focus();
			$("#lblmsg2").html("New Password requires one lower case letter, one upper case letter, one digit, 8-15 length.");
			rtn=false;
		}*/

		else {
			$("#usercd").css("border", "1px solid rgb(169, 169, 169)");
			$("#lblmsg2").html(" ");
		}

		if(old_password == null || old_password=="") {
			$("#old_password").css("border", "1px solid red");
			$("#old_password").focus();
			$("#lblmsg1").html("Please Enter Old Password");
			rtn= false;
		}

		/*else if (reg.test($.trim(old_password)) == false) {
			$("#old_password").css("border", "1px solid red");
			$("#old_password").focus();
			$("#lblmsg1").html("Old Password requires one lower case letter, one upper case letter, one digit, 8-15 length.");
			rtn=false;
		}*/

		else {
			$("#old_password").css("border", "1px solid rgb(169, 169, 169)");
			$("#lblmsg1").html(" ");
		}

		return rtn;
	}
</script>
</html>
?>

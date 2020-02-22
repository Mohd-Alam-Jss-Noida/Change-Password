<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../css/rsrtc_style.css" type="text/css" />
        <script language="javascript" src="../js/login.js"></script>
        <!-- CODE ADDED BY MOHD ALAM 12/02/2018 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            function logged() {
                var rtn=true;
                var windows=$("#windows").val();
                var usercd=$("#usercd").val();
                var passwd=$("#passwd").val();
                var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{8,15}$/;
                
                if(passwd == null || passwd=="") {
                    $("#passwd").css("border", "1px solid red");
                    $("#passwd").focus();
                    $("#lblmsg3").html("Please Enter Password");
                    rtn= false;
                }

                else if (reg.test($.trim(passwd)) == false) {
                    $("#passwd").css("border", "1px solid red");
                    $("#passwd").focus();
                    $("#lblmsg3").html("Password requires one lower case letter, one upper case letter, one digit, 8-15 length.");
                    rtn=false;
                }

                else {
                    $("#passwd").css("border", "1px solid rgb(169, 169, 169)");
                    $("#lblmsg3").html(" ");
                }

                if(usercd == null || usercd=="") {
                    $("#usercd").css("border", "1px solid red");
                    $("#usercd").focus();
                    $("#lblmsg2").html("Please Enter Login Id");
                    rtn= false;
                }
                else {
                    $("#usercd").css("border", "1px solid rgb(169, 169, 169)");
                    $("#lblmsg2").html(" ");
                }

                if(windows == null || windows=="") {
                    $("#windows").css("border", "1px solid red");
                    $("#windows").focus();
                    $("#lblmsg1").html("Please Enter Window Number");
                    rtn= false;
                }
                else {
                    $("#windows").css("border", "1px solid rgb(169, 169, 169)");
                    $("#lblmsg1").html(" ");
                }
                return rtn;
            }
        </script>
    </head>
    <body>
        <div id="wrapper">
            <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                    <td width="20%"  id="rsrtc_header"></td>
                    <td align="center" id="pageHeader">RSRTC Online Reservation System</td>                    
                </tr>
                <tr>
                    <td width="20%" id="sidebar" valign="top">
                        <div id="msg"></div>
                    </td>
                    <td width="80%" id="bodyContentDetails" valign="top"><br />
                        <div align="center" id="pageHeader">LOGIN</div>
                        <div style="color: #802662; text-align: center; font-size: 18px;">
                                                    </div>
                        <form method="post" name="login" onsubmit="return logged();"
                            >
                            <table border="0" align="center" >
                                <tr>
                                    <td>
                                        <table border="0" align="center" width="300" cellspacing="5" cellpadding="5" style="border: #802662 solid thin; border-radius: 5px;">
                                            <tr>
                                                <td>Window</td>
                                                <td><input type="text" name="windows" id="windows" value="" autocomplete="off" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" autofocus="autofocus" tabindex="1" style="background-color:#EBEBE4" />
                                                    <span style="color: red" id="lblmsg1"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Login Id</td>
                                                <td><input type="text" name="usercd" id="usercd" value="" autocomplete="off" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" tabindex="2" onFocus="chkWindow();" onBlur="Username(this.value);" style="background-color:#EBEBE4;" />
                                                    <span style="color: red" id="lblmsg2"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Password</td>
                                                <td><input type="password" name="passwd" id="passwd" value="" autocomplete="off" oncopy="return false" onpaste="return false" ondrag="return false" maxlength="15" ondrop="return false" tabindex="3" onFocus="chkLogin();" style="background-color:#EBEBE4"   />
                                                    <span style="color: red" id="lblmsg3"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="Secpwd">Second Password</td>
                                                <td>
                                                    <input type="password" name="Secpasswd" id="Secpasswd" value="" autocomplete="off" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" tabindex="4" maxlength="10" disabled="disabled" style="background-color:#EBEBE4" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="center">
                                                    <input type="hidden" id="sess" value=""  />
                                                    <input type="submit" name="submit" value="submit" tabindex="5" />
                                                    <input type="hidden" name = "flg" value = "1" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <th id="secOpt">Check if Problem in Login<input type="checkbox" id="checkSess" name="checkSess" onChange="prompter();" />
                                    </th>
                                </tr>
                                <tr>
                                    <th align="center" style="color:#FF0000">
                                        <div id="Logusrname"></div>
                                    </th>
                                </tr>
                                <tr>
                                    <th align="center" style="color:#FF0000" id="error">
                                    System Maintenance Time is 02:00 AM To 03:00 AM 
                                    </th>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
                <tr style="height:20px"> 
                    <td width="20%">&nbsp;</td>
                    <td width="80%" id="">
                        <div id="footer-wrapper">
                            <div align="center" id="footer">
                                <p>Powered By RSRTC 
                                    &copy; 2019 All Rights Reserved.<br>
                                    Version 1.1 Date: 16 Apr 2019</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>

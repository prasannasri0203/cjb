<html>
<head></head>
<body>
<table valign="center" align="center" width="620" border="1" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
        <td style="text-align: center;background: #364146;padding: 7px;    border-bottom: 4px solid #0379e3;">
            <!-- <img src="{{ asset('assets/images/bookepr_logo.png') }}" alt="BookEPR"> -->
            <h2 style="color:#ffffff;">Cool Jelly Bean</h2>
            <!-- <h5 style="color:#ffffff">FOR AUTOMOTIVE</h5> -->
        </td>
    </tr>
    <tr>
        <td>
            <table width="620" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="50">&nbsp;</td>
                    <td width="520">
                        <table width="600" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                           
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr style="text-align: left;">
                                <td style="color:#424242;font-size: 18px;font-family:'Calibri';">Hello,<span style="color:#008dd4;font-size: 18px;font-family:'Calibri';"></span></td>
                            </tr>
                            <tr>
                                <td style="color:#424242;font-size: 18px;font-family:'Calibri';">
                                   <span style="padding-left: 47px;">
                                       You are receiving this email because we received a password reset request for your account.
                                       <a href="{{url('/reset/?email='.$email)}}">Reset Password</a>

                                   </span>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                           <tr>
                                <td height="25">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="50">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr style="text-align: center; background-color: #323844; color:#ffffff;height:43px;font-family:'Calibri';font-size: 14px;">
        <td>Copyright © {{ date("Y") }} All Rights Reserved. </td>
    </tr>
    </tbody>
</table>
</body>
</html>

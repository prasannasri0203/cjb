<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Forget Password</title>
   </head>
   <body style="background: beige; width:100%;min-height: 100vh;">
      <div style="width:600px;margin:auto;">
            <div class="main-cont" style="width: 1000px;margin: 0 auto; background: #fff;">
         <div class="cont-2" style="padding: 25px;">
            <div class="logo"><img src="{{asset('images/logo.png')}}" alt="logo"></div>
            <div class="li-1"style="width: 100%;float: left;line-height: 2.5;margin:0px 0px 15px 0px">
               <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                     <td valign="top">
                        <table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                           <tr>
                              <td width="15"></td>
                              <td valign="top">
                                 <table width="585" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                       <td height="15"></td>
                                    </tr>
                                    <tr>
                                       <td valign="top"><img src="{{ asset('images/logo.png') }}" width="200" height="58" style="display:block;margin:0;border:0;" align="left"/></td>
                                    </tr>
                                 </table>
                              </td>

                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td valign="top">
                        <table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#33b0de">
                           <tr>
                              <td height="13"></td>
                           </tr>
                           <tr>
                              <td valign="top">
                                 <table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#33b0de">
                                    <tr>
                                       <td height="12"></td>
                                    </tr>
                                    <tr>
                                       <td valign="top">
                                          <table width="600" border="0" cellspacing="0" cellpadding="0">
                                             <tr>
                                                <td width="24"></td>
                                                <td valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:21px; color:#061115; text-align:left; line-height:21px;">Cool Jelly Bean - Reset Password
                                                </td>
                                             </tr>
                                          </table>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td height="11"></td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td height="16"></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td valign="top">
                              <table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                 <tr>
                                    <td width="24"></td>
                                    <td valign="top">
                                       <table width="576" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                             <td height="11"></td>
                                          </tr>
                                          <tr>
                                             <td valign="top">
                                                <table width="576" border="0" cellspacing="0" cellpadding="0">
                                                   <tr>
                                                   </tr>
                                                </table>
                                             </td>
                                          </tr>                                          
                                          <tr>
                                             <td valign="top">
                                                <table width="576" border="0" cellspacing="0" cellpadding="0">
                                                   <tr>
                                                      <td width="118" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:14px; color:#000000; text-align:left; line-height:21px;"></td>
                                                   </tr>
                                                </table>
                                             </td>
                                          </tr>
                                          
                                          <tr>
                                             <td valign="top">
                                                <table width="576" border="0" cellspacing="0" cellpadding="0">
                                                   
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
                                                </table>
                                             </td>
                                          </tr>
                                          
                                       </table>
                                    </td>
                                 </tr>
                              </table>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="x_footer">
            <table style="background:#000000; padding:10px; width:1000px;max-width: 600px; text-align:center;margin:0px auto 15px;" >
               <tbody>
                  <tr>
                     <td  style="color:#ffffff;width:100%;max-width: 400px;line-height:15px;margin:0 auto;">
                        <p id="x_fp" style="color:#ffffff;width:100%;max-width: 400px;line-height:15px;padding:0px; margin:0 auto;margin-bottom:0px;"><b><b><b>© Cool Jelly Bean 2021</b></b></b></p>
                     </td>
                  </tr>
                  <tr>
                     <td style="color:#ffffff;width:100%;max-width:600px;line-height:15px;margin:0 auto;">
                        <p id="x_fp" style="color:#ffffff;width:100%;max-width: 500px;margin:0 auto;line-height:15px;padding:0px;"><b><b style="padding: 5px 0px;"><b style="padding: 0px 5px"> Lorem ipsum registered address <br>insert legel registration company number here </b></b></b></p>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      </div>
   </body>
</html>


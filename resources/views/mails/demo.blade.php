
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled Document</title>
</head>
<body>
    
    <div class="main-cont" style="width: 100%; max-width: 420px; margin: 0 auto; background: #fff;">
        
        <div class="cont-2" style="padding: 25px;">
        <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="logo"></div><br>
        
        <div class="li-1">
            <h2 style="font-family: sans-serif; color: #3088e2; margin-bottom:20px;">Customer Login Details:</h2>
             <table margin-bottom: 20px;>
                        <tbody>
                        <tr style="line-height:2.5">
                            <td style="width:40%; font-size: 15px; font-weight: bold;">User Email:</td>
                            <td style="font-size: 15px; font-weight: bold;">{{ $demoEmail}}</td>
                        </tr>
                         <tr style="line-height:2.5">
                            <td style="width:10% font-size:15px; font-weight: bold;">Password:</td>

                            <td style="font-size: 15px; font-weight: bold;">{{ isset($demoPassword) ? $demoPassword :'Customer@123' }} </td>
                        </tr>
                      </tbody>
             </table>
    <tbody>
    <tr>
        <!-- <td style="width: 160px; height: 40px; border-color: #f110ab; outline: none; border-radius: 20px;margin:20px 0px 20px 0px; background: #f110ab; color: #fff; font-size: 16px;"> -->
        <td>
        <!-- <a style="color:#fff; padding-left: 40px; width: 160px; height: 40px; border-color: #f110ab; outline: none; border-radius: 20px;margin:20px 0px 20px 0px; background: #f110ab; color: #fff; font-size: 16px;" href="{{url('/')}}">Login here</a>
 -->       <a href="{{url('/')}}"><img src="{{ asset('images/login.png') }}" alt="logo"> </a>
        </td>
    </tr>
</tbody>

</table>
        </div>

        <h5 style="font-family:sans-serif;font-size: 17px;font-weight:bold;">The Cool Jelly Bean team</h5>
    </div>
        </div>

        <div class="x_footer">
                <table style="background:#000000; padding:10px; width:100%; text-align:center;" >
                            <tbody>
                            <tr style="line-height: 28px;">
                                <td  style="color:#ffffff;width:100%;max-width: 400px;margin:0 auto;"><p style="color:#ffffff;width:100%;line-height:28px;padding:0px; margin:0 auto;margin-bottom:0px !important; padding-bottom: 0px !important;"><b>© Cool Jelly Bean 2021</b></p></td>
                            </tr>
                            <tr>
                                <td style="color:#ffffff;width:100%;max-width:100%;line-height:25px;margin:0 auto !important;"><p id="x_fp" style="color:#ffffff;width:100%;max-width: 500px;margin:0 auto;line-height:25px;padding:0px 0 12px 0 !important;margin-bottom: 12px;"><b>Lorem ipsum registered address <br>insert legel registration company number here </b></p></td>
                            </tr>
                          </tbody>
                 </table>
             </div>
</html>

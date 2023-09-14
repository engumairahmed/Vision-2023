<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MedCustodian</title>
</head>
<body>
    <h1>Welcom to MedCustodian</h1>
    <h3>Hi</h3>
    <h3>You are receiving this email because we received a password reset request for your account.</h3>
    <a href="{{ $PasswordReset }}">Follow this link to reset your account password</a>

    <h3>If you did not request a password reset, no further action is required.</h3>

    <br>
    <br>
    <br>
    
    <h3>Thank You,</h3>
    <h3>Best Regards,</h3>   
    <h3>Team {{ config('app.name') }}</h3>
    <img src="{{asset("/images/logo.png")}}" alt="" width="80px" height="50px" class="img-fluid">
</body>
</html>
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
    <h3>This is an auto generated response email for account verification</h3>
    <a href="{{ $verificationMail }}">Follow this link for email verification</a>
 
    <p>For any questions or concerns, feel free to reach out to us. We're here to assist you!</p>

    <br>
    <br>
    <br>
    
    <h3>Thank You,</h3>
    <h3>Best Regards,</h3>   
    <h3>Team {{ config('app.name') }}</h3>
    <img src="{{asset("/images/logo.png")}}" alt="" width="80px" height="50px" class="img-fluid">
</body>
</html>
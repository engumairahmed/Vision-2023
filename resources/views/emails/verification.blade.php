<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MedCustodian</title>
</head>
<body>
    <h1>{{$verificationMail}}</h1>
    <a href="{{ $verificationMail }}">Verify Email Address</a>
    <a href="{{ route('verify.email', ['token' => $user->email_verification_token]) }}">Verify Email</a>
</body>
</html>
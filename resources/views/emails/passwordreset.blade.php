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

    Thanks,<br>
{{ config('app.name') }}
</body>
</html>
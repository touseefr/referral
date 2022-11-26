<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title'] }}</title>
</head>
<body>
     <p>hi {{ $data['name'] }}, Welcome to Referral System</p>
     <p> username-> {{$data['name']}} </p>
     <p>password-> {{ $data['password'] }}</p>
     <p>You can add users to your Networks by share your <a href="{{ $data['url'] }}">Referral Link</a></p>

    <p>Thank You!</p>

</body>
</html>

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
   <p>Hi, {{ $data['name'] }}</p>
   <p>Please <a href="{{ $data['url'] }}">click here</a>to verify your account</p>
</body>
</html>

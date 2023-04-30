<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet">

    <style>
        * {
            font-family: 'Source Sans Pro', sans-serif;
            letter-spacing: -0.025rem;
        }

        div>pre.sf-dump {
            font-size: 0.5em;
        }
    </style>
</head>

<body>

    <div style="font-size: 2em">
        @php
            dump('App Dashboard');
        @endphp

        @if (Auth::guard('app')->check())
            Guard: {{ $userGuard }}
        @endif
    </div>

    <a href="{{ route('app.logout') }}">Sair</a>

</body>

</html>

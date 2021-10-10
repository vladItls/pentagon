<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pentagon</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<span class="d-block p-2 bg-primary text-white title">
    <h1>Pentagon</h1>
</span>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('notifications.error')
            @include('notifications.status')
        </div>
    </div>
</div>
@yield('content')
</body>
</html>

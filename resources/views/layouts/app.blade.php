<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XmForm Task</title>
    <!-- Fonts -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" >
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
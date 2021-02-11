<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a class="btn btn-primary" href="{{ route('createnewpost') }}" role="button">create new
                    post</a>
                <div class="dropdown open">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('lang') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a name="" id="" class="dropdown-item " href="{{ route('local', 'ar') }}"
                            role="button">العربيه</a> <br>
                        <a name="" id="" class="dropdown-item " href="{{ route('local', 'en') }}"
                            role="button">English</a>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        @foreach ($navCategories as $navcatagory)
                            <a name="" id="" class="dropdown-item " href="{{ route('category', $navcatagory->id) }}"
                                role="button">{{ $navcatagory->title }}</a> <br>

                        @endforeach
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>

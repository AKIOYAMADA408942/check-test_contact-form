<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    @livewireStyles
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-title">
                <h1 class="header__logo">FashionablyLate</h1>
            </div>
            <div class="header-nav">
                @yield('nav')
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
@livewireScripts
</body>

</html>

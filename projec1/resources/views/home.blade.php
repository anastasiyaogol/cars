<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/app.css">
    <title></title>
</head>
<div class="app">
    <div>
        @if (Auth::check())
            <meta name="user-id" content="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
        @endif

    @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="registration_menu">Мой кабинет</a>
                @else
                    <a href="{{ route('login') }}" class="registration_menu">Войти</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="registration_menu">Зарегистрироваться</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <router-view></router-view>
</div>
</html>
{{--<script src="/js/app.js"></script>--}}
<script src="/js/app.js"></script>


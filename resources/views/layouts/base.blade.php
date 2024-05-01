<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/css/style.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <header class="col-12 d-flex justify-content-between">
        <a class="header-title--link" href="">Платформа для изучения <span style="font-weight:500">Китайского Языка</span></a>
        <div>
        <a class="profile--link" href="{{route('user')}}"><img src="{{url('image/icon/profile.svg')}}" alt=""></a>
        @auth
                <a href="{{route('logout')}}">Выйти</a>
        @endauth
        </div>
    </header>
    <main class="d-flex">
        {{-- <div class="d-flex"> --}}
    <ul class="sidebar col-2 ">
        <li class="sidebar__item text-center">Меню</li>
        <li class="sidebar__item"><a class="sidebar__item--link" href="{{route('theories')}}">Теория</a></li>
        <li class="sidebar__item"><a class="sidebar__item--link" href="{{route('tests')}}">Тесты</a></li>
        <li class="sidebar__item"><a class="sidebar__item--link" href="{{route('words')}}">Карточки</a></li>
        <li class="telegram">
            <p class="telegram-text">Подписывайтесь <br> на наш канал <br> в Телеграме!</p>
            <a href="https://t.me/PlatformLovedChineseLanguage"><img class="telegram-image" src="{{url('image/icon/telegram.svg')}}" alt=""></a>
        </li>
    </ul>
    {{-- </div> --}}
    <div class="col-10 ">
        @yield('content')
    </div>
    </main>

</div>
</body>
</html>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель управления</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="{{ asset('js/admin.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
{{--    <script src="{{ asset('js/site.js') }}"></script>--}}

</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <!-- Бренд и кнопка «Гамбургер» -->
        <a class="navbar-brand" href="{{ route('admin.index') }}">Панель управления</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbar-example" aria-controls="navbar-example"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Основная часть меню (может содержать ссылки, формы и прочее) -->
        <div class="collapse navbar-collapse" id="navbar-example">
            <!-- Этот блок расположен слева -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Заказы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Каталог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Бренды</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Товары</a>
                </li>
            </ul>

            <!-- Этот блок расположен справа -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a onclick="document.getElementById('logout-form').submit(); return false"
                       href="{{ route('logout') }}" class="nav-link">Выйти</a>
                </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                @csrf
            </form>
        </div>
    </nav>

    <div class="row">
        <div class="col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible mt-0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $message }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/7a89f39588.js" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
</head>

<body>

    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">login</a></li>
                <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">logout</a></li>
                <li class="nav-item"><a href="{{ route('admin.home') }}" class="nav-link">Admin</a></li>
                <li class="nav-item"><a href="{{ route('admin.categories.index') }}" class="nav-link">Категории</a></li>
                <li class="nav-item"><a href="{{ route('admin.products.index') }}" class="nav-link">Товары</a></li>
            </ul>
        </header>
    </div>


    <div id="app">
        @yield('content')
    </div>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="mb-3 mb-md-0 text-body-secondary">© 2023 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24"
                            height="24">
                            <use xlink:href="#twitter"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24"
                            height="24">
                            <use xlink:href="#instagram"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24"
                            height="24">
                            <use xlink:href="#facebook"></use>
                        </svg></a></li>
            </ul>
        </footer>
    </div>



    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>

</html>


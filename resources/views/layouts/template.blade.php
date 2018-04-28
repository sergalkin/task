<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Сайт</title>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
</html>
<body>
    <div id="wrapper">
        <header class="header">
            <div class="container clearfix">
                <div class="logo">
                    <a href="#"><img src="{{asset('img/logo.png')}}" height="170" width="170" alt=""/></a>
                </div>
                <div class="nav">
                    <p>Телефон: {{config('constants.org_info.telephone')}}</p>
                    <p>Email: <span>{{config('constants.org_info.email')}} </span></p>
                </div>
            </div>
        </header>
        <div id="home">
            <div class="container">
                <h1>Комментарии</h1>
            </div>
        </div>
        @yield('content')
        <footer>
            <div class="container clearfix">
                <div class="logo-footer">
                    <a href="#"><img src="{{asset('img/logo.png')}}" height="100" width="100" alt=""/></a>
                </div>
                <div class="nav">
                    <p>Телефон: {{config('constants.org_info.telephone')}}</p>
                    <p>Email: <span>{{config('constants.org_info.email')}} </span></p>
                    <p>Адрес: <span>{{config('constants.org_info.address')}}</span></p>
                    <p>&copy; 2000-2014. Все права защищены</p>
                </div>
            </div>
        </footer>
    </div>
</body>
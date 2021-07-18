<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>
    
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    
    <link rel="stylesheet" href="{{ secure_asset('css/front.css') }}">
  </head>
  <body>
    <div id="app">
      <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
            News
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navberSupportedContent" aria-expanded="false" aria-label="Togglenavigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <a href="{{ action('ProfileController@index') }}" class="nav-link">プロフィール一覧</a>
            </ul>
            <ul class="navbar-nav ml-auto">
            @guest
              <li><a class="nav-link" href="{{ url('/register') }}">新規登録</a></li>
              <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      新規作成 <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ action('Admin\NewsController@create') }}">
                          ニュース作成
                      </a>
                      <a class="dropdown-item" href="{{ action('Admin\ProfileController@create') }}">
                          プロフィール作成
                      </a>
                  </div>
              </li>
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
            @endguest
            </ul>
          </div>
        </div>
      </nav>
      
      <main class="py-4">
        @yield('content')
      </main>
    </div>
  </body>
</html>
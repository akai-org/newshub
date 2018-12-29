<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title') - {{ config('app.name', 'NewsHub') }}</title>

  <!-- Styles -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />

  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  @yield('head')
</head>

<body>
  <div class="main-container">
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">

        <a class="navbar-item" href="{{ url('/') }}">
          <img src="{{ asset('newshub.png') }}" style="width:100%; height:3000%;" alt="{{ config('app.name', 'NewsHub') }}">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item">
            Najnowsze Wpisy
          </a>

          <a class="navbar-item">
            Poczekalnia
          </a>
        </div>

        <div class="navbar-end">

          <div class="navbar-item has-dropdown is-hoverable" style="z-index:50;">
            @if (isset(Auth::user()->username ))
            <a class="navbar-link">
                {{ Auth::user()->username }}
            </a>

            <div class="navbar-dropdown" style="z-index:31;">
              <a class="navbar-item">
                Profil
              </a>
              <a class="navbar-item">
                Wiadomości
              </a>
              <a class="navbar-item">
                Ustawienia
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item">
                Zgłoś błąd
              </a>
            </div>
            @endif
          </div>


          <div class="navbar-item">
            <div class="buttons">
              @if (Auth::check())
              <a href="{{ route("new_post") }}" class="button is-light">
              <strong>Dodaj wpis</strong>
              </a>
              <form method="POST" action="{{ url('logout') }}">
                @csrf
                <button class="button is-danger">
                      <strong>Wyloguj</strong>
                </button>
              </form>
              @else
                <a href="{{ route('register') }}" class="button is-primary">
                  <strong>Rejestracja</strong>
                </a>
                <a href="{{ route('login') }}" class="button is-light">
                  Login
                </a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="container">

      <small>
        <nav class="navbar cat" role="navigation" style="z-index:20;">
          <div class="navbar-brand">
            <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>

            </a>
          </div>

          <div class="navbar-menu" id="navMenu">
            <div class="navbar-start cat-item">

              <a class="navbar-item" href="test.html">
                Kraj
              </a>
              <a class="navbar-item">
                Zagranica
              </a>
              <a class="navbar-item">
                Irak
              </a>
              <a class="navbar-item">
                Technologia
              </a>

            </div>
          </div>
        </nav>
      </small>
      @yield('content')
    </div>

    @yield('footer')


    <script async type="text/javascript">
      document.addEventListener('DOMContentLoaded', () => {
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
        if ($navbarBurgers.length > 0) {
          $navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {
              const target = el.dataset.target;
              const $target = document.getElementById(target);
              el.classList.toggle('is-active');
              $target.classList.toggle('is-active');

            });
          });
        }

      });
    </script>


  </div>
</body>

</html>
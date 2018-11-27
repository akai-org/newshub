<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') - NewsHub</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
    crossorigin="anonymous">
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>

<body>
  <header class="nh-navbar">
    <div class="container">
      <div class="nh-navbar-list space-between">
        <div class="nh-navbar-list">
          <div class="nh-navbar-item nh-navbar-brand"><a href="#">NewsHub</a></div>
          <div class="nh-navbar-item active"><a href="#">Strona główna</a></div>
          <div class="nh-navbar-item"><a href="#">Poczekalnia</a></div>
        </div>
        <div class="nh-navbar-list">
          <div class="nh-navbar-item"><a href="#">Zarejestruj</a></div>
          <div class="nh-navbar-item"><a href="#">Zaloguj</a></div>
        </div>
      </div>
    </div>
  </header>
  <main>
    <div class="nh-navbar-extra">
      <div class="container">
        <div class="nh-navbar-list">
          <div class="nh-navbar-item-extra">Ciekawostki</div>
          <div class="nh-navbar-item-extra">Nauka</div>
          <div class="nh-navbar-item-extra">Historia</div>
          <div class="nh-navbar-item-extra">Rozrywka</div>
          <div class="nh-navbar-item-extra">Sport</div>
          <div class="nh-navbar-item-extra">Motoryzacja</div>
          <div class="nh-navbar-item-extra">Syria</div>
          <div class="nh-navbar-item-extra">Świat</div>
          <div class="nh-navbar-item-extra">SpaceX</div>
          <div class="nh-navbar-item-extra">Programowanie</div>
          <div class="nh-navbar-item-extra">Technologia</div>
          <div class="nh-navbar-item-extra">AMA</div>
        </div>
      </div>
    </div>
    <div class="container">
      @yield('content')
      <aside>

      </aside>
    </div>
  </main>
  <footer>
    <div class="container">
      2018 NewsHub
    </div>
  </footer>
</body>

</html>
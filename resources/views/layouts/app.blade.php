<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NewsHub') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    
</head>
<body>
    <div class="main-container">
            <nav class="navbar" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                
                <a class="navbar-item" href="{{ url('/') }}">
                    {{ config('app.name', 'NewsHub') }}
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
                    <a class="navbar-link">
                        TestUser
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
                    </div>
                
            
                    <div class="navbar-item">
                    <div class="buttons">
            
            
            
            
                        <a class="button is-primary" {{ route('register') }}>
                        <strong>Rejestracja</strong>
                        </a>
                        <a class="button is-light" href="{{ route('login') }}">
                        Login
                        </a>
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
                    
                    
                    <!--center -->
                    <!-- include_once 'posts_main.php'-->
                    <!-- content-->
                    
                    @yield('content')
                    
                    
                    
                    
                    </div>
                    
                    <footer class="footer">
                      <div class="content has-text-centered">
                        <p>
                          2018 &copy NewsHUB
                        </p>
                      </div>
                    </footer>
                    
                    
                    
                     <script async type="text/javascript">
                    
                    document.addEventListener('DOMContentLoaded', () => {
                      const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
                      if ($navbarBurgers.length > 0) {
                        $navbarBurgers.forEach( el => {
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
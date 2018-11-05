NewsHub
================================

Społecznościowy agregator newsów - otwartoźródłowy klon serwisu Wykop.pl. Projekt realizowany w ramach Akademickiego Koła Naukowego Aplikacji Internetowych (AKAI) na Politechnice Poznańskiej.

=== Getting Started === 

    Sklonuj repozytorium git clone git@github.com:akai-org/newshub.git
    Zainstaluj bazę danych MySQL
    Zainstaluj potrzebne biblioteki composer install
    Skopiuj plik .env.example do pliku .env
    Stwórz bazę danych CREATE DATABASE newshub;
    Wypełnij plik .env danymi dostępowymi do bazy MySQL

DB_DATABASE=newshub
DB_USERNAME=<nazwa użytkownika bazy danych>
DB_PASSWORD=<hasło do bazy danych>

    Wygeneruj klucz php artisan key:generate
    Uruchom aplikację php artisan serve
    Wejdź pod adres localhost:8000 i korzystaj z aplikacji.

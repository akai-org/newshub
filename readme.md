NewsHub
================================

Społecznościowy agregator newsów - otwartoźródłowy klon serwisu Wykop.pl. Projekt realizowany w ramach Akademickiego Koła Naukowego Aplikacji Internetowych (AKAI) na Politechnice Poznańskiej.

Getting Started
---------------------

1. Sklonuj repozytorium git clone git@github.com:akai-org/newshub.git
2. Zainstaluj bazę danych MySQL
3. Zainstaluj potrzebne biblioteki composer install
4. Skopiuj plik .env.example do pliku .env
5. Stwórz bazę danych CREATE DATABASE newshub;
6. Wypełnij plik .env danymi dostępowymi do bazy MySQL

    DB_DATABASE=newshub
    DB_USERNAME=<nazwa użytkownika bazy danych>
    DB_PASSWORD=<hasło do bazy danych>

7. Wygeneruj klucz php artisan key:generate
8. Uruchom aplikację php artisan serve
9. Wejdź pod adres localhost:8000 i korzystaj z aplikacji.

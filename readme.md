NewsHub
================================

Społecznościowy agregator newsów - otwartoźródłowy klon serwisu Wykop.pl zbudowany na bazie frameworka Laravel. Projekt realizowany w ramach Akademickiego Koła Aplikacji Internetowych (AKAI) na Politechnice Poznańskiej.

### Prezentacja
[https://docs.google.com/presentation/d/1wvLft-NYDuY_MgjV__o6LrjBKlLHXsifypvtdYJAMmc/edit?usp=sharing](https://docs.google.com/presentation/d/1wvLft-NYDuY_MgjV__o6LrjBKlLHXsifypvtdYJAMmc/edit?usp=sharing)

### Funkcje
- Logowanie i rejestracja użytkowników
- Profil użytkownika
  - Login, e-mail, imię, nazwisko, avatar
  - Oddzielna podstrona z profilem użytkownika
- Dodawanie nowych wpisów
  - Formularz dodawania treści
  - Automatyczne pobieranie treści ze źródła (tytuł, fragment tekstu, obrazki)
 - Ocenianie wpisów (plusy i minusy)
 - Komentarze
 - Specjalne uprawnienia dla administratora (edycja, usuwanie)
 - Powiadomienia (TODO)

### Screenshots 
![NewsHub - Strona główna](https://i.imgur.com/hVMa5N2.png)

![NewsHub - Dodawanie wpisu](https://i.imgur.com/If1Idro.png)

### Instrukcja 

1. Ściągnij repozytorium
``` git clone git@github.com:akai-org/newshub.git ```
2. Zainstaluj PHP z dodatkami
```
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install apache2 libapache2-mod-php7.2 php7.2 php7.2-xml php7.2-gd php7.2-opcache php7.2-mbstring
```
3. Zainstaluj bazę danych MySQL
```
sudo apt-get update
sudo apt-get install mysql-server
mysql_secure_installation
```
4. Zaloguj się do MySQL, dodaj bazę danych i przykładowego użytkownika 
```
mysql -u root -p 
[wpisz hasło]
CREATE DATABASE newshub;
grant all privileges on newshub.* to laravel@'%' identified by 'qwerty123';
grant all privileges on newshub.* to laravel@localhost identified by 'qwerty123';
```
5. Skopiuj zawartość *.env.example* do pliku *.env* i uzupełnij dane
```
DB_DATABASE=newshub
DB_USERNAME=laravel
DB_PASSWORD=qwerty123
```
6. Zainstaluj zależności
```
composer install
```
7. Wygeneruj klucz ```php artisan key:generate```

8. Wykonaj migrację
```
php artisan migrate:fresh
```
**Uwaga! To polecenie wyczyści całą dotychczasową zawartość bazy danych i utworzy tabele na nowo.**

9. (opcjonalne) Wypełnij bazę danych przykładowymi danymi
```
php artisan db:seed
```
10. Uruchom aplikację poleceniem ``` php artisan serve ```
11. Wejdź pod adres [localhost:8000](http://localhost:8000) i korzystaj z aplikacji.

#### Domyślne konto administratora
Username: _admin_

Hasło: _qwerty123_

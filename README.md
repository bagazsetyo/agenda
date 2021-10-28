![image](https://github.com/bagazsetyo/agenda/blob/main/agenda.png)

#   Jadwal Agenda
Aplikasi jadwal agenda menggunakan jquery sehingga tidak perlu reload page untuk crud nya di bangun dengan menggunakan 
 - Laravel 7
 - Postgresql 14
 
Library tambahan 
 - Jquery 3
 - Bootstrap 5
 - izitoast 

**Features**
CRUD agenda
CRUD detail agenda

#   Installation

Create a Database Table in Postgresql with name jadwal

Open Code Editor → Terminal.

In Terminal, navigate to the extracted agenda folder.
  ```$ cd agenda```
  
Enter these commands one by one ,
  ```
  $ composer install
  $ cp .env.example .env
  $ php artisan key:generate
  ```
Edit the .env file like this,
  ```
  DB_CONNECTION = pgsql
  DB_HOST = 127.0.0.1 // change to Host your database
  DB_PORT = 5432
  DB_DATABASE = jadwal // change to the name of the database table that you created
  DB_USERNAME = postgres // change to be your database username, default root
  DB_PASSWORD = postgres // change to your databse password, null default 
  ```
## NOTE

Untuk databases ada di root project (sejajar dengan file .env) dengan nama jadwal.sql

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Requierements

PHP >=7.3

## Installation

- composer install
- npm install && npm run dev

- Edit the .env file to set the correct location of the sqlite file :

DB_DATABASE=[ABSOLUTE_PASS_TO_MINISAPIRE]/chope/database/db.sqlite

- Either run "php artisan serve" then go to http://127.0.0.1:8000
Or set your appache document root to chope/public folder

## What it uses

- Jetstream to have a build-in auth with registration and login
- JWT Token for API authentication

Whether you register with API or WEB, you can use same credentials for both. But for the API logout, need to provide the token previously given while login with API.

Testing accounts (but you can create your own) :

email : testapi@gmail.com
password : tttttttt

email : testweb@gmail.com
password : tttttttt
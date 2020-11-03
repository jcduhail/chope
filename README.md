## Requierements

PHP >=7.3

## Installation

- composer install
- npm install && npm run dev

- Edit the .env file to set the correct location of the sqlite file :

DB_DATABASE=[ABSOLUTE_PASS_TO_CHOPE_REPO]/chope/database/db.sqlite

- Either run "php artisan serve" then go to http://127.0.0.1:8000
Or set your appache document root to chope/public folder

## How it works

- Jetstream to have a build-in auth with registration and login
- JWT Token for API authentication
- A free Redis server
- SQLite database for quick dev

Whether you register with API or WEB, you can use same credentials for both. But for the API logout, need to provide the token previously given while login with API.

Once login in the WEB app, the login/logout (API or WEB) REDIS datas will be displayed.

## API routes (can be tested with postman for example)

POST /api/auth/register
PARAMS name, email, password, password_confirmation

POST /api/auth/login
PARAMS email, password

POST /api/auth/logout
PARAMS token

Testing accounts (but you can create your own) :

email : testapi@gmail.com
password : tttttttt

email : testweb@gmail.com
password : tttttttt

## Sequence Diagram

![alt text](https://raw.githubusercontent.com/jcduhail/chope/main/diagram.png)

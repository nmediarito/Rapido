<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

How to run Rapido:
Required tools:
PHP, XAMPP, NodeJS, and composer

Download and install PHP and XAMPP - https://www.apachefriends.org/download.html 
Set "C:\xampp\php" in your PATH Environment Variable. Then restart the CMD prompt - Reference: https://stackoverflow.com/questions/31291317/php-is-not-recognized-as-an-internal-or-external-command-in-command-prompt 

Download and install composer - https://getcomposer.org/download/ 

Download and install NodeJS - https://nodejs.org/en/download/ 
Restart your computer.

These are the necessary softwares to run the application.

The repository is available here: https://github.com/nmediarito/Rapido 



Clone the repository:
Open a terminal or command prompt and run the command below:

git clone https://github.com/nmediarito/Rapido.git

Install the required files and dependencies:
Open terminal or command prompt and go to the root folder of the project and type the commands below:

composer install - This will install all the dependencies/libraries used for the project (PHP)

npm install - This will install all the dependencies/libraries used for the project (NodeJS)

copy .env.example .env - This will create a copy of the environment file in the root folder of the project (This is a command for Windows. You do not need to run this if you have already used the Ubuntu command below)

cp.env.example .env - This will create a copy of the environment file in the root folder of the project (This is a command for Ubuntu. You do not need to run this if you have already used the Windows command above)

Open the .env file and change the values of the database (DB_DATABASE, DB_USERNAME, DB_PASSWORD) to correspond to your configuration.
(You should be able to leave this as default, if you haven’t configured anything before).

php artisan key:generate - This sets the APP_KEY value inside of your .env file.

php artisan config:cache - This will create a cache file.

php artisan route:cache - This will clear your route cache. 

These commands will install the necessary dependencies and files to run the application.




To start the application or website:

Open XAMPP Control Panel:
Press the Start button for Apache and MySQL
Press the Start button for MySQL

Go to the database:
http://localhost/phpymadmin

Create a database named roadside_assistance (default value for DB_DATABASE in the .env file) or match the value of DB_DATABASE in your .env file of the project.

Open a terminal and run the command below:
php artisan migrate - This will create all the tables implemented into the database.

Open another terminal and run the command below:
php artisan serve

Open another new terminal and run the command below:
npm run watch

To view the website:
http://127.0.0.1:8000 or http://localhost:8000/ 


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

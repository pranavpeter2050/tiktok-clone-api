<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Tiktok clone backend using Laravel

Reference Youtube link `https://www.youtube.com/watch?v=CHSL0Btbj_o` at [1:49:45]()
Reference Github repo: `https://github.com/John-Weeks-Dev/tiktok-clone`

## Install Laravel Breeze

```bash
composer require laravel/breeze --dev

php artisan breeze:install

Which Breeze stack would you like to install?
  Blade with Alpine ...................................................................................... blade  
  Livewire (Volt Class API) with Alpine ............................................................... livewire  
  Livewire (Volt Functional API) with Alpine ............................................... livewire-functional  
  React with Inertia ..................................................................................... react  
  Vue with Inertia ......................................................................................... vue  
  API only ................................................................................................. api

// select API only

```

## Laravel Tinker

Create a user by using laravel tinker. Run command `php artisan tinker` in the terminal. Once the tinker terminal starts running, run the below command to create a user.

```bash
App\Models\User::create(["name"=>"Pranav Peter","email"=>"pranav@mail.com","password"=>bcrypt("123123123")]);
```

Type in `exit` to exit the laravel tinker Psy Shell (tinker terminal)

## Set up Laravel Sanctum

Apparently, Laravel Sanctum gets installed while installing Laravel Breeze. Read Sanctum related documentation [here](https://laravel.com/docs/11.x/sanctum#main-content).

Edit the session related .env variable as below

```bash
SESSION_DRIVER=cookie
# This is for the backend
SESSION_DOMAIN=localhost
# This is for the frontend
SANCTUM_STATEFUL_DOMAINS=localhost:3000
```

### IMPORTANT: Make sure to change the port for laravel app, eg. `http://localhost:8040`

## Make `UserController` and `UserCollection`

```bash
php artisan make:controller Api/UserController --resource

php artisan make:resource UserCollection
```

There are some changes in the `users` table, so we run `php artisan migrate:reset` to clear the data and edit the users-table-migration file.

```php
Schema::create('users', function (Blueprint $table) {
  ...
  $table->string('bio')->nullable();
  $table->text('image')->nullable();
  ...
});
```

Then we need to make relevant changes in `RegisteredUserController` and `Users` model file.

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

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

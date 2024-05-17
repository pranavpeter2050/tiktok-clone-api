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

## Handing user Image upload

We need to install the below package. Read more about the package [here](https://image.intervention.io/v3/introduction/frameworks)

```bash
composer require intervention/image-laravel
```

Next, add the configuration files to your application using the `vendor:publish` command:

```bash
php artisan vendor:publish --provider="Intervention\Image\Laravel\ServiceProvider"
```

This command will publish the configuration file `image.php` to your `app/config` directory. In this file you can set the desired driver for Intervention Image. By default the library is configured to use GD library for image processing.

The integration is now complete and it is possible to access the `ImageManager` via Laravel's facade.

```php
use Intervention\Image\Laravel\Facades\Image;

Route::get('/', function () {
    $image = Image::read('images/example.jpg');
});
```

We create a `Service` called `FileService` to handle the user profile image upload.

## Create `GlobalController`

```bash
php artisan make:controller Api/GlobalController --resource
```

## Define `Post` model, migration and controller

```bash
php artisan make:model Post -mc --resource

// create AllPostsCollection
php artisan make:resource AllPostsCollection
```

## Create `ProfileController`

```bash
php artisan make:controller Api/ProfileController --resource
```

## Create `HomeController`

```bash
php artisan make:controller Api/HomeController --resource
```

## Define `Comment` model, migration and controller

```bash
php artisan make:model Comment -mc --resource
```

## Define `Like` model, migration and controller

```bash
php artisan make:model Like -mc --resource

// create AllPostsCollection
php artisan make:resource AllPostsCollection
```

## Create API endpoints

Define the API endpoints in `api.php`. This completes all steps for the backend.
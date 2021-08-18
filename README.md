# Laravel Flashcards

This project is a CRUD flashcard app written in Laravel. Users who register and sign in 
can create their own flashcards and quiz themselves.

The purpose of this project is to showcase proficiency in the fundamentals of Laravel 
and back end web development. Some Laravel concepts and tools used for this project 
include routing, controllers, Eloquent models and relationships, validation, and 
Laravel Breeze for authentication.

## Demo

Coming soon.

## Getting Started

Follow these steps in your terminal to get this project running on your machine in development mode.
Code meant for a file within the project is indicated by a comment with the filename.

First, navigate to the directory where you would like the laravel-flashcards project to appear.

```
cd your/preferred/directory
```

Clone the project from this repository to your local machine.

```
git clone https://github.com/PatrickDCullen/laravel-flashcards.git
```

Navigate to the new directory for the project.

```
cd laravel-flashcards
```

Install all the dependencies with Composer.

```
composer install
```

Create a .env file and set your database password.

```
cp .env.example .env

// .env
DB_PASSWORD=password
```

Create the database.

```
mysql -u root -p
create database laravel_flashcards;
exit;
```

Generate the application key.

```
php artisan key:generate
```

Run migrations and seed the database. 

```
php artisan migrate --seed
```

Serve the application.
```
php artisan serve
```

Grab a user email from the database and log in with their email and a password of password. Alternatively, you can
skip the database seeding process and register your own user to log in, create flashcards and flashcard decks, and quiz yourself.

## Author

Patrick Cullen

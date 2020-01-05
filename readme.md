## Laravel Cameroun

Laravel Boilerplate provides a very flexible and extensible way of building your custom Laravel 5 applications.
This project is a fork of [Laravel 5 Boilerplate](https://github.com/rappasoft/laravel-boilerplate) and provide new features with [Keen Admin](https://keenthemes.com/keen) as admin backend.

## Table of Contents

- [Features](#features)
- [Theme Demo](#theme-demo)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Run](#run)
- [How to contribute](#how-to-contribute)
- [Bugs and Feedback](#bugs-and-feedback)
- [License](#license)

## Features

This project has the same features with [Laravel 5 Boilerplate](http://laravel-boilerplate.com/5.7/start.html) but provide additionnal features like :

- Administration Dashboard with [Keen Admin Theme](https://keenthemes.com/keen)

## Theme Demo
![Keen Bootstrap Admin Template](http://keenthemes.com/keen/themes/keen/doc/assets/img/demos/demo1-1.png "Keen Theme Browser Preview")

**[Keen Admin Theme Demo](https://keenthemes.com/keen/preview/demo1)**

## System Requirements
To be able to run Laravel Boilerplate you have to meet the following requirements:
- PHP > 7.1
- PHP Extensions: PDO, cURL, Mbstring, Tokenizer, Mcrypt, XML, GD
- Node.js > 6.0
- Composer > 1.0.0

## Installation
1. Install Composer using detailed installation instructions [here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
```
$ wget https://getcomposer.org/composer.phar
$ chmod +x composer.phar
$ mv composer.phar /usr/local/bin/composer
```
2. Install Node.js using detailed installation instructions [here](https://nodejs.org/en/download/package-manager/)
```
$ yum install npm
```
3. Clone repository
```
$ git clone https://github.com/mckenziearts/laravel-boilerplate.git
```
4. Change into the working directory
```
$ cd laravel-boilerplate
```
5. Copy `.env.example` to `.env` and modify according to your environment
```
$ cp .env.example .env
```
6. Install composer dependencies
```
$ composer install --prefer-dist
```
7. An application key can be generated with the command
```
$ php artisan key:generate
```
8. Execute following commands to install other dependencies
```
$ npm install or yarn
$ npm run dev or yarn run dev
```
9. Run these commands to create the tables within the defined database and populate seed data
```
$ php artisan migrate --seed
```

## Run

To start the PHP built-in server
```
$ php artisan serve --port=8080
or
$ php -S localhost:8080 -t public/
```

Now you can browse the site at [http://localhost:8080](http://localhost:8080)  🙌

## How to contribute

Fork the repository, read the [CONTRIBUTE](CONTRIBUTE.md) file and make some changes.
Thanks!

### Contributors and Supporters

Thank you to all the [contributors](https://github.com/mckenziearts/laravelcm/graphs/contributors) on this project. Your help is much appreciated!

- [Laravel 5 Boilerplate](https://github.com/rappasoft/laravel-boilerplate) team for this great project structuring.

## Bugs and Feedback

For bugs, questions and discussions please use the [GitHub Issues](https://github.com/mckenziearts/laravelcm/issues).

## License

This boilerplate is open-sourced software licensed under the [MIT license](LICENSE).

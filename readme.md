<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Tutorial de ambientação

- Instalar PHP ou Wamp (Já vem com PHP)
- Instalar Composer (https://getcomposer.org/download/)
- Criar projeto Laravel (composer create-project laravel/laravel myapp) (Criar o projeto dentro da pasta www do WAMP)
- Dentro da pasta do projeto, no cmd digite: php artisan serve (carrega o projeto em http://127.0.0.1:8000).

Obs:
 - APÓS clonar a versão do git:

 - executar: composer install
 - criar um arquivo .env (o arquivo não sobe no git)
 - executar os comandos: 
 - php artisan key:generate
 - php artisan cache:clear 
 - php artisan config:clear
 - php artisan migrate
 - php artisan route:list
 - php artisan storage:link

 - executar php artisan serve

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


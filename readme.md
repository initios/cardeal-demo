<img src="resources/assets/cardeal.png">

## Cardeal

Un clon de Twitter para mostrar algunos ejemplos sobre Laravel.

Para avanzar paso a paso:

```bash
# Ver todos los tag disponibles
git tag

# Ir al tag correspondiente
git checkout 3
```

> Cada vez que avances un paso lanza ```composer install``` y ```./artisan migrate``` para actualizar la base de datos
> (¡si vas hacia atrás es posible que tengas que recrearla!)
> Arrancar el servidor  con ```./artisan serve```
>
> Por último puedes recrear la base de datos de 0 lanzando ```make recreate```
> para ello recuerda que en el fichero .env debes configurar la base de datos
> DB_DATABASE=cardeal ... etc

### Paso 1

#### Listado de Tweets

* Creamos ruta, controlador y vista básicos para listar tweets genéricos, ```./artisan make:controller TweetController``` para generar el controlador
* Creamos modelo y migración de base de datos para poder hacer la query, ```php artisan make:model Tweet --migration``` y rellenamos a gusto la migracion
* Migramos ```./artisan migrate``` (configura tu .env con los parámetros de base de datos)
* Creamos la vista ```resources/views/tweet/index.blade.php``` para listar los tweet

Ya puedes crear Tweets en local entrando en la **shell** con el comando ```./artisan tinker```

```php
<?php
>>> $user = App\User::firstOrCreate(['name' => 'Twittero', 'email' => 'example@example.com']);
=> App\User {#690
     id: 1,
     name: "Twittero",
     email: "example@example.com",
     created_at: "2017-04-05 15:40:12",
     updated_at: "2017-04-05 15:40:12",
   }
>>> $user->tweets()->create(['content' => 'Mi primer tweet']);
=> App\Tweet {#663
     content: "Mi primer tweet",
     user_id: 1,
     updated_at: "2017-04-05 15:47:48",
     created_at: "2017-04-05 15:47:48",
     id: 1,
   }
```

### Paso 2

#### Semillas y factorías

Las semillas nos permitirán rellenar fácilmente la base de datos con datos de ejemplo.
Las factorías es otra forma interesante de rellenar la base de datos, de momento elegimos las semillas que son mas fáciles para empezar.

* Creamos una [semilla](https://laravel.com/docs/5.4/seeding) para usuarios y otra para Tweets con ```php artisan make:seeder UsersTableSeeder``` y ```php artisan make:seeder TweetsTableSeeder``` y la rellenamos a gusto. Debemos también ponerlos en el orden correcto en el fichero  seeds/DatabaseSeeder.php

* Tras lanzar ```./artisan db:seed``` podremos ver el listado de Tweets recién generado en la ruta /tweets

* También añadimos a la lista al usuario que ha creado el Tweet


## Enlaces de interés

- [Laravel Cheatsheet](http://cheats.jesse-obrien.ca/)
- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).
- [Laravel documentation](https://laravel.com/docs)
- [Laracasts](https://laracasts.com)

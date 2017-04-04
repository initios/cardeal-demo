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

Cada uno incluye comentarios justo aquí debajo:

> Cada vez que avances un paso lanza ```composer install``` y ```./artisan migrate``` para actualizar la base de datos
> (¡si vas hacia atrás es posible que tengas que recrearla!)
> Arrancar el servidor  con ```./artisan serve```

### Paso 1

#### Listado de Tweets

* Creamos ruta, controlador y vista básicos para listar tweets genéricos, ```./artisan make:controller TweetController``` para generar el controlador
* Creamos modelo y migración de base de datos para poder hacer la query, ```php artisan make:model Tweet --migration`` y rellenamos a gusto la migracion
* Migramos ```./artisan migrate``` (configura tu .env con los parámetros de base de datos)
* Todavía no podemos ver nada ya que no tenemos nada en la base de datos, creamos una [semilla](https://laravel.com/docs/5.4/seeding) con ```./artisan make seeder``` y la rellenamos a gusto (ver fichero en seeds/DatabaseSeeder.php)
* Tras lanzar ```./artisan db:seed``` podremos ver el listado de Tweets en la ruta /tweets



## About Laravel

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).
- [Laravel documentation](https://laravel.com/docs)
- [Laracasts](https://laracasts.com)

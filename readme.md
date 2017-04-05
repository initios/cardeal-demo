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

### Paso 3

#### Perfil de usuario

Crearemos la ruta ```/users/{user_id}```, a la cual solo podrá acceder cada uno de los usuarios (esto en el siguiente paso), y mostraremos los Tweets para ese único usuario.

* Lo primero es añadir la ruta en ```routes/web.php```, el controlador ```UserController``` y crear la vista ```user/index.blade.php```. En este caso la ruta es especial ya que requiere el ID del usuario que queremos ver.


### Paso 4

#### Proteger la vista de usuario

* Ahora protegeremos esta vista configurando la autenticación que trae laravel siguiendo su [guia](https://laravel.com/docs/5.4/authentication#authentication-quickstart). Esto nos creará un AuthController, plantillas y demás. Básicamente lanzamos ```php artisan make:auth```

* También nos añade un layout básico con bootstrap, así que modificamos nuestras templates para que hereden de ese layout base (layouts/app.blade.php). Las modificamos a gusto, tanto el layout como la pantalla de bienvenida que nos ha creado (home.blade.php)

* Modificamos también la página home / y hacemos que la home sea nuestra vista pública de tweets cambiando el controlador en web.php. Le damos a esa vista el nombre "home" y a la de usuarios "user.index" para crear rutas a esta URL fácil

* También configuramos el idioma de la APP en castellano y el nombre de la app en la config para que salgan los mensajes de error en nuestro idioma

* Modificamos en AuthController la ruta a la que queremos redirigir cuando se realice un registro con éxito. En este momento deberíamos poder registrarnos y poder iniciar sesión sin embargo debemos proteger la vista de perfil todavía, hay varias estrategias pero añadimos un middleware en web.php (ver web.php). Si intentamos acceder sin sesión seremos redirigidos al formulario de iniciar sesión

### Paso 5

#### Vista para añadir Tweets

* Añadimos un enlace y una ruta a la navegación para para mostrar un formulario de añadir tweets y un controlador específico para estas vistas, recordar añadirlo dentro del grupo middleware que protege las rutas para usuarios identificados.

* Añadimos el HTML para guardar un tweet y rellenamos también el método STORE del controlador para guardarlo, una vez creado redirigimos a la home para ver el nuevo tweet, si hubiese errores, volvemos a mostrar el formulario con los errores, conservando los campos que ya había rellenado el usuario

* OJO a la función csrf_field

* Sino lo has hecho antes debes instalar los locale para español, puedes copiar y pegar de https://github.com/caouecs/Laravel-lang/tree/master/src/es en la carpeta lang/es


## Enlaces de interés

- [Official Documentation](https://laravel.com/docs)
- [Cheatsheet](http://cheats.jesse-obrien.ca/)
- [Laracasts](https://laracasts.com)
- [PHP The Right Way](http://www.phptherightway.com/)

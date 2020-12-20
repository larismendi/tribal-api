<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
 
# Tribal-Api

## Descripción

Esta API centraliza otros servicios de búsqueda como Itunes, Tvmaze y Crcind por medio del endpoint http://localhost:8000/api/search recibiendo el parametro:


| Nombre   | Valor                    |
|----------|--------------------------|
| provider | itunes, tvmaze o crcind  |
| term     | string (solo para itunes)|
| media    | string (solo para itunes)|
| name     | string (solo para tvmaze)|
| q        | string (solo para crcind)|


## Instalación

Para la instalación se debe seguir los siguientes pasos:

Primer paso: ir al espacio de trabajo local y ejecutar el siguiente comando.

```
git clone https://github.com/larismendi/tribal-api.git
```

Segundo paso: entrar en el directorio y correr el siguiente comando para instalar todas las librerias necesarias para Laravel.

```
composer install
```

Tercer paso: Al finalizar el paso anterior, correr el siguiente comando para configurar las variables de entorno del proyecto.

```
cp .env.example .env
```

Cuarto paso: Luego del paso anterior, por seguridad se debe generar el APP_KEY corriendo el siguiente comando.

```
php artisan key:generate
```

Quinto paso: Para levantar el servidor de Laravel en Local, por favor correr el siguiente comando.

```
php artisan serve
```

Ya con estos pasos podemos ingresar al Api con la url=http://localhost:8000/api/search y los parametros solicitados por provider:

```
http://localhost:8000/api/search?provider=itunes&term=jack&media=music
```


## Correr pruebas

Para ejecutar las pruebas creadas para el proyecto, por favor correr el siguiente comando:

```
php artisan test
```

## Generar la documentación del Api

Para generar la documentación en http://localhost:8000/api/documentation, por favor correr el siguiente comando:

```
php artisan l5-swagger:generate
```

## Autor

* **Luis Arismendi** - *Trabajo inicial* - [larismendi](https://github.com/larismendi)

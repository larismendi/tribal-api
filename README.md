<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
 
# Tribal-Api

## Descripción

Esta API fue desarrollada con Laravel 8 y centraliza otros servicios de búsqueda como Itunes, Tvmaze y Crcind por medio del endpoint http://localhost:8000/api/search recibiendo el parametro:


| Nombre   | Valor                    |
|----------|--------------------------|
| q        | string                   |

## Requisitos de sistema operativo

* PHP >= 7.3

## Instalación

Para la instalación se debe seguir los siguientes pasos desde la terminal:

Primer paso: ir al espacio de trabajo local de tu preferencia (Esta ubicación + el directorio donde se instalará el proyecto será lo que llamaremos "path root" más adelante) y ejecutar el siguiente comando.

```
git clone https://github.com/larismendi/tribal-api.git
```

Segundo paso: entrar en el directorio tribal-api ejecutando el siguiente comando en la terminal.

```
cd tribal-api
```

Tercer paso: ejecutar el siguiente comando para instalar todas las librerias necesarias para Laravel 8.

```
composer install
```

Cuarto paso: Al finalizar el paso anterior, correr el siguiente comando para crear el archivo de variables de entorno del proyecto.

```
cp .env.example .env
```

Quinto paso: Agregar al final del archivo creado en el paso anterior los siguientes variables (Lo encontraras con el nombre .env, puedes encontrarlo en el path root del proyecto haciendo un ls -la):

```
ITUNES_URL=https://itunes.apple.com
TVMAZE_URL=https://api.tvmaze.com
CRCIND_URL=http://www.crcind.com/csp/samples/SOAP.Demo.cls?wsdl
```

Sexto paso: Luego del paso anterior, por seguridad se debe generar el APP_KEY corriendo el siguiente comando.

```
php artisan key:generate
```

Séptimo paso: Para levantar el servidor de Laravel en Local, por favor correr el siguiente comando.

```
php artisan serve
```

Ya con estos pasos podemos ingresar a la Api desde cualquier IDE como Postman o Insomnia y realizar por ejemplo la siguiente petición:

```
http://localhost:8000/api/search?q=Adams
```


## Correr pruebas

Para ejecutar las pruebas creadas para el proyecto, por favor correr desde la terminal ubicandote en el path root del proyecto el siguiente comando:

```
php artisan test
```

## Generar la documentación del Api

Para generar con Swagger la documentación del API en http://localhost:8000/api/documentation, por favor correr desde la terminal y ubicandote en el path root del proyecto el siguiente comando:

```
php artisan l5-swagger:generate
```

## Autor

* **Luis Arismendi** - *Trabajo inicial* - [larismendi](https://github.com/larismendi)

## **Intrucciones para ejecutar la solución**

Se debe tener instalado composer y laravel 8.

1) Clonar el proyecto en algun directorio de su ordenador.
2) Abrir linea de comandos dentro del directorio, y escribir "composer install"
3) Se debe crear el archivo .env, para ello se debe copiar el archivo .env.example, y cambiarle el nombre a .env , dentro de este archivo se deben editar las credenciales de la base de datos,  tales como DB_USERNAME y DB_PASSWORD. Ademas, se debe crear una base de datos con el nombre "api_usuarios".
4) Luego de tener las credenciales actualizadas, en la linea de comandos se debe escribir "php artisan migrate"(la base de datos debe estar encendida).
5) Por ultimo en la linea de comandos dentro del directorio, se debe escribir "php artisan key:generate".

Ahora, para ejecutar la aplicación simplemente dentro del directorio en la linea de comandos se debe escribir "php artisan serve"

Documentación de POSTMAN, pruebas de la API: https://documenter.getpostman.com/view/7919584/TVewYimb

MockAPI, usuarios registrados(ultimos datos despues de las actualizaciones): https://5fbbe94dc09c200016d4143f.mockapi.io/api/auth/users

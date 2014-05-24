Sistema de Reservación de Asientos.
===================================
Introducción
------------


Requisitos del Servidor
-------------------------
    PHP 5.1.X or higher (recomended 5.4.X)
    Databases supported: MySQL, MySQLi, MsSQL, Oracle, PostgreSQL and SQLite

Diseño del Sistema
-------------------------
  - Patron de diseño: [HMVC](http://arandilopez.blogspot.mx/2014/01/patrones-de-diseno-hmvc-y-pac.html "Patron de diseño HMVC")
  - Estilo Arquitectonico SOA RESTful services
  - Lenguaje de Programación
    - Back-end: PHP5
    - Front-end: HTML5, CSS3, Javascript

Instalación
---------------
  1. Clonar este repositiorio en la raiz de tu carpeta de servidor (www o htdocs)

  ```
  $ git clone git@github.com:arandilopez/reservas.git         (para ssh)
  $ git clone https://github.com/arandilopez/reservas.git     (para https)
  ```

  2. Renombrar los archivos `www/config/*` quitando el .example. __No borres lo archivos .example__
  3. En `config.php` añadir la ruta base que tendra la aplicacion, ej: `http:localhost/reservas`
  4. En `database.php` añadir los datos para la conexión a la base de datos. Por defecto se usa el driver de `mysqli`
  5. Añadir la base datos (se adjunta el archivo `reservas.sql`)

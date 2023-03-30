# Prueba_Dev
Prueba de diagnostico 'Desis'

Introduccion:

El proyecto que veras a continuacion es una plataforma de votacion la cual esta desarrollada principalmente con PHP 5.6.36 y JavaScript (Ajax & JQuery), se encuentra conectada a una base de datos la cual fue desarrollada en MySQL 10.1.32.

Herramientas:

XAMPP: https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/5.6.36/xampp-win32-5.6.36-0-VC11-installer.exe/download

Instalacion:

1. Instalacion del servidor web local: Primero comenzaremos instalando el servidor web en el cual haremos correr el proyecto, en este caso se utilizo XAMPP 3.2.2.
2. Una vez instalado XAMPP, iremos a la ubicacion de la aplicacion XAMPP dentro de nuestro disco local y encontraremos una carpeta llamada htdocs, moveremos la carpeta Prueba_DEV dentro de htdocs.
3. Ahora abriremos XAMPP, dentro de este veremos un Control Panel de XAMPP en el cual se encuentran varios servicios.
4. Presionamos en "Start" en los Service Apache y MySQL.
5. Ahora nos iremos a nuestro navegador e ingresaremos el siguiente link http://localhost/phpmyadmin/.
6. Nos logearemos con las credenciales por defecto las cuales son Usuario 'root' y Contraseña ''.
7. Una vez dentro de Phpmyadmin, veremos en la izquierda que nos dejara crear una nueva base de datos, seleccionamos en nueva y arriba donde dice 'Nombre de la base de datos' escribimos el nombre de nuestra base de datos, en este caso 'pruebabd', y damos click en crear.
8. Ahora se nos cargara nuestra base de datos, tendremos que ir al apartado 'importar' y seleccionamos el archivo 'pruebabd.sql' el cual se encuentra dentro de la carpeta 'Database' para luego dar en continuar.
9. Hasta este punto ya tenemos nuestra base de datos creada, por lo que procederemos a ingresar en nuestro proyecto web en el siguiente link http://localhost/Prueba_DEV/index.php

Uso:
1. Ingresamos nuestros datos en los campos aparentes en el formulario de votaciones.
2. En caso de que exista un problema en lo ingresado o que falten datos, se avisara a traves de una ventana emergente.
3. Una vez que todos los datos esten correctos, haremos click en 'Votar' y esto nos llevara a una pagina en blanco con un boton para volver al formulario.
4. Ya en este instante, nuestros datos ingresados se encontraran dentro de la base de datos y podremos visualizarlos.

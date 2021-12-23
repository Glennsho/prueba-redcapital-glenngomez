<p align="center"><a href="https://redcapital.cl" target="_blank"><img src="https://www.paymentmedia.com/gallery/59b6ecdbce3a4red_capita_dfgfgf_623.jpg" width="400"></a></p>

Proyecto desarrollado por [Glenn Gómez Miranda](https://github.com/Glennsho/) como solución al examen de selección de la empresa [Red Capital CL](https://redcapital.cl).

## INTRODUCCIÓN

El propósito de la siguiente evaluación es validar el conocimiento específico y técnico
requerido para el cargo mencionado. Los conocimientos a evaluar son:    

- [Laravel 6+.](https://laravel.com).
- [PHP-UNIT.](https://www.php.net).
- [Eloquent.](https://laravel.com/docs/8.x/eloquent).
- [GIT.](https://github.com).
- [Docker | Docker-container.](https://www.docker.com).

## REQUERIMIENTOS

**1-** Crear un login de usuario, el cual permitirá identificar el usuario según su **ROL y PERMISOS**.

*Validaciones y/o reglas de negocio:*
- Utilizar buenas prácticas para mostrar errores ocurridos dentro del sistema.
- Se deberá crear un modelo que permita gestionar menú, sub-menú y vista para cualquier usuario del sistema, independiente de su rol, la cual mediante un middleware controlar el acceso de un usuario a la vista.
- Generar Seeders de carga inicial, con los menús y submenús

**2-** El usuario podrá subir documentos **PDF, XML, WORD, ETC.**, los cuales serán almacenados en Laravel, y que luego el usuario podrá revisar históricamente todos los archivos que están asociados a él y descargarlos.

*Validaciones y/o reglas de negocio:*
- Si un usuario administrador posee permisos para visitar esta vista, podrá revisar todo los archivos históricos.
- El usuario administrador podrá subir archivos y asociar a qué persona se creará el nuevo registro.
- Un usuario normal solo podrá ver sus archivos históricos.

## LÓGICA APLICADA

El sistema debe gestionar por medio de los controladores y middleware la carga de los menus y submenus, según los roles que tengan asignados. En este aspecto, los usuarios se asocian a un rol que implicitamente cuenta con los permisos para acceder a las funciones que tienen asignadas.

Por lo tanto, las vistas se corresponden a un tipo de usuario específico y que serán accedidos por sus respectivos menús y submenus.

## EJECUCIÓN DEL PROYECTO

Como consideraciones previas para la ejecución correcta del proyecto, se debe contar con los siguientes elementos en su maquina y/o servidor local:

- Composer. (*Para la gestión de las dependencias que requiere el proyecto*)
- Laragon, XAMPP, etc.
- Visual Studio Code u otra IDE. (*Principalmente para la lectura de código en este caso*) 

Se debe descargar el proyecto desde este repositorio a su máquina o servidor local por el medio de preferencia (descarga de paquete o por Git Bash). Ya descargado, descomprimir el proyecto dentro del directorio correspondiente dentro del gestor utilizado (ejemplo: Laragon dentro de su directorio ubicar la carpeta `www`y descomprimir el proyecto en una carpeta propia), y se deberán realizar los siguientes pasos para un correcto funcionamiento:

- **Configurar el archivo ".env"**: dentro del directorio principal del proyecto, modificar el archivo `.env.example` para habilitar las configuraciones de preferencia y renombrarlo eliminando la extensión `.example`. Tener especial consideración con el nombre de la base de datos que se registra. La siguiente imagen de ejemplo muestra la configuración utilizada:

<p align="center"><a target="_blank"><img src="storage\readme\env-example.png" width="500"></a></p>

- **Creación de Base de datos**: a través del gestor de base de datos, crear la DB correspondiente que tenga exactamente el mismo nombre declarado en el archivo `.env`. 

- **Actualización de dependencias**: se debe abrir una terminal sobre el directorio raíz del proyecto y ejecutar el comando `composer update` para la actualización de las dependencias del proyecto. Adicionalmente, puede ejecutar el comando `npm install && npm run dev` en caso de presentar algún conflicto. (*nota: dado que muchas dependencias para esta versión de Laravel han sido descontinuadas o han sido abandonadas, puede advertir sobre problemas de seguridad. Favor, ignorar estos mensajes.*)

- **Crear llave para el entorno virtual**: en la terminal, ejecutar `php artisan key:generate` para generar la llave del proyecto.

- **Carga de tablas y seeds en base de datos**: antes de poder ejecutar el proyecto, se deben cargar las tablas que componen la BD del sistema. Para ello, en la terminal nuevamente se debe ejecutar la siguiente línea de comando `php artisan migrate`, la cual realizará todas las migraciones asociadas. Luego, se debe hacer la carga de datos declarados en los Seeds, por medio del uso de la siguiente línea en la terminal `php artisan db:seed`.  Adicionalmente, si se quiere realizar un reinicio de las tablas y realizar las migraciones y carga de seeds nuevamente puede utilizar `php artisan migrate:fresh --seed` para realizar todo este proceso de una sola vez.

- **Ejecución del proyecto**: para este punto, ya se realizaron los pasos necesarios para la ejecución del proyecto. Si está utilizando una herramienta de entorno de desarrollo, puede utilizarlo para acceder a la aplicación por ese medio. En caso de realizarlo de forma local vía terminal, utilice el comando `php artisan serve` para iniciar el servicio de entorno virtual de PHP. (*nota: este último caso, solo realizarlo en consideración que tenga debidamente instalado composer, laravel y homestead*)

## EXPLICACIÓN BREVE DEL SISTEMA

- ### Modelo ER
Se adjunta la siguiente imagen que muestra el modelo ER que se utilizó para como base para la estructura de la base de datos de la solución desarrollada:

<p align="center"><a target="_blank"><img src="storage\readme\Modelo ER - Prueba Tecnica Glenn Gomez.drawio.png" width="500"></a></p>

- ### Explicación de roles y usuarios
El sistema fue desarrollado pensando como página de inicio el Login de usuario. Para propositos de esta prueba, se crearon cuatro credenciales con los siguientes parametros:

**Usuario (email)**: admin.a@testmail.com; admin.b@testmail.com; user1@testmail.com; user2@testmail.com

**Contraseña**: clave123 (*para todos los usuarios indicados anteriormente*)

Por otra parte, cada usuario poseé un rol que lo diferencia y que poseé un respectivo acceso. Se explican a continuación: 

**Rol Administrador A**: este rol fue creado con el propósito de gestionar sobre los usuarios existentes en la BD del sistema, pudiendo editar sus perfiles. *Usuarios: user1@testmail.com; admin.a@testmail.com*

**Rol Administrador B**: se encarga exclusivamente para el control absoluto sobre la gestión de archivos de almacenados localmente en el sistema. Puede ver el histórico completo de todos los usuarios y descargarlas. Adicionalmente, puede subir un archivo y asignarla a uno de los usuarios existentes en la BD. *Usuarios: admin.b@testmail.com*

**Rol Usuario**: solo puede ver los archivos que estén asociados a él/ella, y subir archivos. *Usuarios: user1@testmail.com; user2@testmail.com*

Cada usuario, después de iniciar sesión es redireccionado a un sitio especifico según el rol por defecto que contiene.

- ### Menús y Sub=menús
La siguiente imagen presenta los menús desarrollados para esta evaluación:
<p align="center"><a target="_blank"><img src="storage\readme\menus-0.png" width="500"></a></p>

- **Administración de usuarios (Rol>Admin A)**: Este menú, sin ser un requerimiento, se creo principalmente con el proposito de verificar el comportamiento de las vistas y permisos según el rol del usuario, por medio de la edición de su información.

<p align="center"><a target="_blank"><img src="storage\readme\menus-1.png" width="500"></a></p>

- **Submenú Admin (Rol>Admin B)**

<p align="center"><a target="_blank"><img src="storage\readme\menus-2.png" width="500"></a></p>
- *Historico de archivos (Admin)*: vista que despliega el histórico de archivos subidos por todos los usuarios.

- *Carga de archivos (Admin)*: vista para subir un archivo y almacenarlo dentro del proyecto, con la propiedad de asignar la propiedad del archivo a un usuario registrado en el sistema.

- **Submenú Usuario (Rol>User)**
<p align="center"><a target="_blank"><img src="storage\readme\menus-3.png" width="500"></a></p>
- *Historico de archivos*: vista que despliega el histórico de archivos subidos por el usuario.

- *Carga de archivos*: vista para subir un archivo y almacenarlo dentro del proyecto.

El directorio de almacenamiento de los archivos se realiza en la ruta `storage\app\public\[nombre usuario]`, y no tiene restricción de tipo de archivo.

## LICENCIA

El framework de Laravel is un software Open-source licenciado bajo la [Licencia MIT](https://opensource.org/licenses/MIT).

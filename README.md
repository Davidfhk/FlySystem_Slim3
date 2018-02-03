# FlySystem_Slim3
Ejemplo basico de la implementación de [FlySystem](https://flysystem.thephpleague.com/) en [Slim 3](https://www.slimframework.com/)

### ¿Qué hace FlySystem_Slim3?

##### Leer un archivo por FTP y escribir su contenido en un archivo en Local
##### Actualizar el contenido del archivo que está en FTP 
##### Eliminar el archivo de FTP

### Requisitos

Crear un servidor FTP:
  
  - [FileZilla](https://filezilla-project.org/)
  
  - [Guia_servidor_ftp](https://informaticapc.com/guias-instalacion-programas/servidor-ftp-filezilla.php)
  
  Yo lo he creado como:
  
     usuario: test
     password: 1234
  Pero puedes crearlo con otros datos, eso sí recuerda cambiarlo en  App\flysystemws\config\dev\settings.php
  
          'ftp' => [
            'host' => 'localhost',
            'username' => 'test',
            'password' => '1234',
        ],

Composer install

El archivo que se sube a FTP es la carpeta FTP de la aplicación donde se encuentra el txt.

El txt de FTP yo lo he llamado hello.txt, aunque le puedes poner cualquier nombre. Pero recuerda añadir el nombre correctamente en el "fileFtp":  , del JSON

Ejemplo petición POST:

    {
      "fileFtp":"hello.txt",
      "fileLocal":"newHello.txt"
    }
    
  El txt con el contenido se te creara dentro de la carpeta App

Ejemplo petición PUT:

    {
      "fileFtp":"hello.txt",
      "newContent":"Este archivo está actualizado"
    }

  Se te modificara con el nuevo texto, el contenido del archivo que tienes en FTP

Ejemplo petición DELETE:

    {
	    "fileFtp":"hello.txt"
    }
  
  Eliminara el fichero que tienes en FTP

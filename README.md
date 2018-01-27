# FlySystem_Slim3
Ejemplo basico de la implementación de [FlySystem](https://flysystem.thephpleague.com/) en [Slim 3](https://www.slimframework.com/)

Leyendo un archivo por FTP y escribiendolo en local

### Requisitos

Crear un servidor FTP:
  
  - [FileZilla](https://filezilla-project.org/)
  
  - [Guia_servidor_ftp](https://informaticapc.com/guias-instalacion-programas/servidor-ftp-filezilla.php)
  
  Yo le he introducido como 
  
     usuario: test
     password: 1234
  Pero puedes crearlo con otros datos, eso sí recuerda cambiarlo en  App\flysystemws\config\dev\settings.php
  
          'ftp' => [
            'host' => 'localhost',
            'username' => 'test',
            'password' => '1234',
        ],

Composer install

El archivo que se sube a FTP es la carpeta FTP de la aplicación donde se encuantra el txt.

El txt de FTP yo lo he llamado hello.txt, aunque le puedes poner cualquiera, y cambiarlo respectivamente en el FlysystemModel

    public function getFile(){

        $this->contents= $this->manager->read('ftp://hello.txt');
    }

Lo mismo para el txt destino que quieres que se cree, con el contenido del txt del FTP, lo he llamado tambien hello.txt

    public function writeLocalFile(){
        
        $this->manager->write('local://hello.txt', $this->contents);
    }

Una vez se ejecuta la aplicación, el txt con el contenido se te creara dentro de la carpeta App

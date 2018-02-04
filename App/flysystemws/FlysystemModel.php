<?php
/**
 * @author David Ignacio Martos
 * @version 1.0.0
 */

namespace App\flysystemws;

class FlysystemModel
{
    /**
     * @var MountManager
     */
    private $manager;

    /**
     * @var String
     */
    private $contents;

    /**
     * Creates the Controller
     *
     * @param MountManager
     * 
     *
     * @return void
     */
    public function __construct($manager)
    {
        $this->manager = $manager;
    }
    
    public function getFile($fileFtp)
    {

        $this->contents= $this->manager->read('ftp://'.$fileFtp);
    }
    
    public function writeLocalFile($fileLocal)
    {
        
        $this->manager->write('local://'.$fileLocal, $this->contents);

        echo "El contenido se te ha escrito con exito en el archivo ".$fileLocal;
    }

    public function updateContent($fileFtp,$newContent)
    {

        $this->manager->update('ftp://'.$fileFtp,$newContent);

        echo "El contenido se ha actualizado con exito por el siguiente texto: ".$newContent;
    }

    public function deleteFileFtp($fileFtp)
    {

        $this->manager->delete('ftp://'.$fileFtp);

        echo "El fichero ".$fileFtp." ha sido eliminado con exito";
    }

}

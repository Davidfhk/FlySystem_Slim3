<?php
/**
 * @author David Ignacio Martos>
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
    
    public function getFile(){

        $this->contents= $this->manager->read('ftp://hello.txt');
    }
    
    public function writeLocalFile(){
        
        $this->manager->write('local://hello.txt', $this->contents);
    }
}
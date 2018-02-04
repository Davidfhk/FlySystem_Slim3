<?php
/**
 * @author David Ignacio Martos
 * @version 1.0.0
 */

namespace App\flysystemws;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\flysystemws\FlysystemModel as Model;

class FlysystemController
{
    /**
     * @var Model
     */
    private $model;

    /**
     * @var Array
     */
    private $payload;

    /**
     * Creates the Controller
     *
     * @param Model $model Service functions
     *
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function readWrite(Request $request, Response $response, $args)
    {

        if($this->checkFileFtp($request,$response, $args))
        {

            $this->model->getFile($this->payload['fileFtp']);

            if($this->checkFileLocal())
            {
                $this->model->writeLocalFile($this->payload['fileLocal']);
            }
             
        }


    }

    public function updateContent(Request $request, Response $response, $args)
    {
        if($this->checkFileFtp($request,$response, $args))
        {
            if(!isset($this->payload['newContent']) || $this->payload['newContent'] == "")
            {
                echo "Por favor, introduzca el nuevo contenido";
            }else{

                $this->model->updateContent($this->payload['fileFtp'],$this->payload['newContent']);
            }
        
        }
    }

    public function deleteFileFtp(Request $request, Response $response, $args)
    {
        if($this->checkFileFtp($request,$response, $args))
        {
            
            $this->model->deleteFileFtp($this->payload['fileFtp']);
        
        } 
    }

/*****CHECKS*******/

    public function checkFileFtp(Request $request, Response $response, $args)
    {
        $this->payload = $request->getParsedBody();

        if(!$this->payload['fileFtp'])
        {
            echo "El nombre del archivo no existe";
        }else{

            return true; 
        }

    }

    public function checkFileLocal()
    {
        if(!isset($this->payload['fileLocal']) || $this->payload['fileLocal'] == "")
        {
            echo "Por favor introduzca el nombre del archivo donde quiere que se le copie el contenido";
        }else{

            return true; 
        }
    }
}

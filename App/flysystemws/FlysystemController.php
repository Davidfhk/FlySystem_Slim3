<?php
/**
 * @author David Ignacio Martos>
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
    
    public function readWrite() {
        $this->model->getFile();
        $this->model->writeLocalFile();
    }
}
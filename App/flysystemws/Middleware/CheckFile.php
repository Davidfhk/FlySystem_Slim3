<?php
/**
* @author David Ignacio Martos
* @version 1.0.0
*/

namespace App\flysystemws\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class CheckFile
{

    private $manager;

    public function __construct($manager)
    {
        $this->manager = $manager;
    }

    public function __invoke(Request $request, Response $response, callable $next){
        
        $payload = $request->getParsedBody();
            
        if(isset($payload['fileFtp'])){
            
            if($this->manager->has('ftp://'.$payload['fileFtp']))
            {
                return $next($request,$response);
            }else{
                
                $payload['fileFtp'] = false;
                $newRequest = $request->withParsedBody($payload);
                    return $next($newRequest,$response);
            } 
        }
    }
}
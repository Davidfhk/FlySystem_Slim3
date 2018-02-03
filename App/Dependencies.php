<?php
/**
 * DEPENDENCIES OF THE WS MUST BE INYECTED HERE
 *
 * DEPENDENCY CONTAINER: $container
 */
$container['ServiceSettings'] = require __DIR__ . "/flysystemws/config/dev/settings.php";

 
$container['FlysystemController']=function($c){
    return new App\flysystemws\FlysystemController(
        $c['FlysystemModel']
    );
};
 
$container['FlysystemModel']=function($c){
    return new App\flysystemws\FlysystemModel(
        $c['Manager']
    );
};

$container['Manager'] = function($c){

    return new League\Flysystem\MountManager(
        [
            'ftp' => $c['Ftp'],
            'local' => $c['Local']
        ]
    );
};

$container['Ftp'] = function($c){
    return new League\Flysystem\Filesystem(
        $c['AdapterFtp']
    );
};
    
$container['Local'] = function($c){

    return new League\Flysystem\Filesystem(
        $c['AdapterLocal']
    );
};
 
$container['AdapterLocal'] = function($c){
    return new League\Flysystem\Adapter\Local(__DIR__);
};

$container['AdapterFtp'] = function($c){

    return new League\Flysystem\Adapter\Ftp(
        $c['ServiceSettings']['ftp']
    );
};

/*----------------MIDDLEWARE---------------------*/

$container['CheckFileMw'] = function($c){

    return new App\flysystemws\Middleware\CheckFile(
        $c['Manager']
        );
};
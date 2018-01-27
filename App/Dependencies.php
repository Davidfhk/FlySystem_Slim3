<?php
/**
 * DEPENDENCIES OF THE WS MUST BE INYECTED HERE
 *
 * DEPENDENCY CONTAINER: $container
 */
$container['ServiceSettings'] = require __DIR__ . "/flysystemws/config/dev/settings.php";
$container['FTP'] = function($c){
    return new League\Flysystem\Filesystem($c['AdapterFTP']);
    };
    
$container['Manager'] = function($c){
    return new League\Flysystem\MountManager(['ftp' => $c['FTP'],'local' => $c['Local']]);
    };
    
 $container['Local'] = function($c){
    return new League\Flysystem\Filesystem($c['AdapterLocal']);
 };
 
 $container['AdapterLocal'] = function($c){
    return new League\Flysystem\Adapter\Local(__DIR__);
 };

  $container['AdapterFTP'] = function($c){
    return new League\Flysystem\Adapter\Ftp($c['ServiceSettings']['ftp']);
 };
 
 $container['FlysystemModel']=function($c){
    return new App\flysystemws\FlysystemModel($c['Manager']);
 };
 
  $container['FlysystemController']=function($c){
    return new App\flysystemws\FlysystemController($c['FlysystemModel']);
 };
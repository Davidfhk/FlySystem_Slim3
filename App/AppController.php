<?php

    namespace App;

    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set("Europe/Madrid");

    require("../vendor/autoload.php");

    $configuration = [
        'settings' => [
            'displayErrorDetails' => true,
        ]
    ];

    $app = new \Slim\App($configuration);

    $container = $app->getContainer();

    require "Dependencies.php";     // Dependencies
    require "Routes.php";           // Routing
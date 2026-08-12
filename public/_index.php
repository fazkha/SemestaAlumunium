<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
// if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
if (file_exists($maintenance = '/home/semest22/laravel-sal/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require '/home/semest22/laravel-sal/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
// (require_once __DIR__.'/../bootstrap/app.php')
//     ->handleRequest(Request::capture());
(require_once '/home/semest22/laravel-sal/bootstrap/app.php')
    ->handleRequest(Request::capture());

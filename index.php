<?php
require_once __DIR__ . '/vendor/autoload.php';

start_session();
$klein = new \Klein\Klein();
// До определения путей
$klein->respond(function ($request, $response, $service) {
    $service->layout('views/layout.php');
});

$klein->app()->register('db', function () {
    $params = require('db.php');
    return new PDO(
	$params['connection'], 
	$params['username'], 
	$params['password']);
});

$klein->respond(
	['GET','POST'],
	'/register',
    require('pages/register.php')
);

$klein->respond(
	['GET','POST'],
	'/login',
    require('pages/login.php')
);

$klein->respond(
	['GET'],
	'/logout',
    require('pages/logout.php') 
);


$klein->dispatch();
?>
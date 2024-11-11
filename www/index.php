<?php
declare (strict_types = 1);

// 
$root = dirname(__DIR__);
require $root . '/vendor/autoload.php';

$configurator = new Nette\Bootstrap\Configurator;
$configurator->enableTracy($root . '/log');
$configurator->setTempDirectory($root . '/temp');


// create a DI container based on the configuration in config.neon
$configurator->addConfig($root . '/app/config.neon');
$container = $configurator->createContainer();

// Router instance
$router = new Nette\Application\Routers\RouteList;
$container->addService('router', $router);

// URLS
$router->addRoute('/', function () {
	echo 'Frontpage route';
});

// run the application!
$container->getByType(Nette\Application\Application::class)->run();
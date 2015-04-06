<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views',));

// Register services.
$app['dao.book'] = $app->share(function ($app) {
    return new MicroCMS\DAO\BookDAO($app['db']);
});

$app['dao.author'] = $app->share(function ($app) {
    $authorDAO = new MicroCMS\DAO\AuthorDAO($app['db']);
    $authorDAO->setBookDAO($app['dao.book']);
    return $authorDAO;
});
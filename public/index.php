<?php

use core\Router\Exception\RouteNotFoundException;
use core\Router\Router;

require_once implode(DIRECTORY_SEPARATOR, [__DIR__, "..", "config", "config.php"]);

$router = Router::getInstance();

require implode(DIRECTORY_SEPARATOR, [ROOT, 'config', 'routes.php']);

dump($router);

// Appliquer l'action
try {
    $route = $router->match();
    
    // (new App\Controller\ArticleController())->index()
    // (new App\Controller\ArticleController())->show($id)
    (new ($route->getController())())->{$route->getAction()}(...$router->getMatches());
    
} 
catch (RouteNotFoundException $e) {
    dump($e);
    echo $e->getMessage();
    // header("Location: /"); // ou error 404
    // exit;
}
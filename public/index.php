<?php

require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/Controller/CategorieController.php';
require_once __DIR__ . '/../src/Repository/CategorieRepository.php';

use App\Controller\CategorieController;
use App\Database;
use App\Router;

$pdo = Database::getConnection();
$cc = new CategorieController();
$router = new Router();
$router->add('GET', '/GestiStock2/public/api/categories', [$cc, 'index']);
$router->add('POST', '/GestiStock2/public/api/categories', [$cc, 'store']);
$router->add('GET', '/GestiStock2/public/api/categories/{id}', [$cc, 'find']);
$router->add('PUT', '/GestiStock2/public/api/categories/{id}', [$cc, 'update']);
$router->add('DELETE', '/GestiStock2/public/api/categories/{id}', [$cc, 'delete']);


$router->dispatch();
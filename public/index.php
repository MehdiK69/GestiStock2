<?php

require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/Controller/CategorieController.php';

use App\Database;
use App\Router;

$pdo = Database::getConnection();

$router = new Router();
$router->add('GET', '/GestiStock2/public/api/categories', [new App\Controller\CategorieController(), 'index']);

$router->dispatch();
<?php

require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/Controller/CategorieController.php';
require_once __DIR__ . '/../src/Controller/ProduitController.php';
require_once __DIR__ . '/../src/Repository/CategorieRepository.php';
require_once __DIR__ . '/../src/Repository/ProduitRepository.php';


use App\Controller\CategorieController;
use App\Controller\ProduitController;
use App\Database;
use App\Router;

$pdo = Database::getConnection();

$cc = new CategorieController();
$router = new Router();
$router->add('GET', '/GestiStock2/public/api/categories', [$cc, 'getAllCategories']);
$router->add('GET', '/GestiStock2/public/api/categories/{id}', [$cc, 'getOneCategorie']);
$router->add('POST', '/GestiStock2/public/api/categories', [$cc, 'store']);
$router->add('PUT', '/GestiStock2/public/api/categories/{id}', [$cc, 'update']);
$router->add('DELETE', '/GestiStock2/public/api/categories/{id}', [$cc, 'delete']);

$pr = new ProduitController();
$router->add('GET', '/GestiStock2/public/api/produits', [$pr, 'getAllProduits']);
$router->add('GET', '/GestiStock2/public/api/produits/{id}', [$pr, 'getOneProduit']);
$router->add('POST', '/GestiStock2/public/api/produits', [$pr, 'store']);
$router->add('PUT', '/GestiStock2/public/api/produits/{id}', [$pr, 'update']);
$router->add('DELETE', '/GestiStock2/public/api/produits/{id}', [$pr, 'delete']);

$router->dispatch();
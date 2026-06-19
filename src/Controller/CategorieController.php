<?php
namespace App\Controller;

class CategorieController {
    function index()
    {
        header('Content-Type: application/json');
        echo json_encode(['message'=>'CategorieController OK']);
    }
}

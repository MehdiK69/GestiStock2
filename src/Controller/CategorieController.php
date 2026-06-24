<?php
namespace App\Controller;
use App\Repository\CategorieRepository;
class CategorieController {
    function index()
    {
        $cr = new CategorieRepository();
        $categories = $cr->findAll();
        header('Content-Type: application/json');
        echo json_encode($categories);
    }

    function store(){
        $body  = file_get_contents("php://input");
        $data = json_decode($body,true);
        $cr = new CategorieRepository();
        $cr->insert($data['nom']);
        header('Content-Type: application/json');
        http_response_code(201);
        echo json_encode(['message' => 'insertion success']);
    }

    function find($id){
        $cr = new CategorieRepository();
        $cat = $cr->findOne($id);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode($cat);
    }

    function update($id){
        $cr = new CategorieRepository();
        $cr->findOne($id);
        $body = file_get_contents("php://input");
        $data = json_decode($body,true);
        $nom = $data['nom'];
        $cr->update($id, $nom);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(['message' => 'update success']);
    }
    function delete($id){
        $cr = new CategorieRepository();
        $cr->delete($id);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(['message' => 'delete success']);
    }
}

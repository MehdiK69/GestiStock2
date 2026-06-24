<?php
namespace App\Controller;
use App\Repository\CategorieRepository;
class CategorieController {
    function getAllCategories()
    {
        $cr = new CategorieRepository();
        $categories = $cr->findAllCategories();
        header('Content-Type: application/json');
        echo json_encode($categories);
    }
    function getOneCategorie($id){
        $cr = new CategorieRepository();
        $cat = $cr->findOneCategorie($id);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode($cat);
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

    function update($id){
        $cr = new CategorieRepository();
        $cr->findOneCategorie($id);
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

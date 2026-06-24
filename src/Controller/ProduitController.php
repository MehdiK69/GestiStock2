<?php

namespace App\Controller;

use App\Repository\ProduitRepository;

class ProduitController
{
    public function getAllProduits(){
        $pr = new ProduitRepository();
        $produits = $pr->findAll();
        header('Content-Type: application/json');
        echo json_encode($produits);
    }
    public function getOneProduit($id){
        $pr = new ProduitRepository();
        $produit = $pr->findById($id);
        header('Content-Type: application/json');
        echo json_encode($produit);
    }
    public function store(){
        $body  = file_get_contents("php://input");
        $data = json_decode($body,true);
        $pr = new ProduitRepository();
        $pr->insert($data['nom'],$data['prix'],$data['quantite'],$data['seuil_alerte'],$data['categorie_id']);
        header('Content-Type: application/json');
        http_response_code(201);
        echo json_encode(['message' => 'insertion success']);
    }
    public function update($id){
        $body  = file_get_contents("php://input");
        $data = json_decode($body,true);
        $pr = new ProduitRepository();
        $pr->findById($id);
        $nom = $data['nom'];
        $prix = $data['prix'];
        $quantite = $data['quantite'];
        $seuil_alerte = $data['seuil_alerte'];
        $categorie_id = $data['categorie_id'];
        $pr->update($id,$nom, $prix, $quantite, $seuil_alerte, $categorie_id);
        header('Content-Type: application/json');
        http_response_code(201);
        echo json_encode(['message' => 'update success']);
    }
    public function delete($id){
        $pr = new ProduitRepository();
        $pr->delete($id);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(['message' => 'delete success']);

    }
}

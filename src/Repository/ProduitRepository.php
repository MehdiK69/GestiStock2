<?php

namespace App\Repository;
use App\Database;
use PDO;

class ProduitRepository
{
    private PDO $pdo;
    public function __construct(){
        $this ->pdo = Database::getConnection();
    }
    public function findAll():array{
        $stmt = $this ->pdo -> prepare("SELECT * FROM produit");
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById(int $id):array{
        $stmt = $this ->pdo -> prepare("SELECT * FROM produit WHERE id = :id");
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
    public function insert(string $nom,float $prix,int $quantite,int $seuil_alerte, int $categorie_id){
        $stmt = $this ->pdo -> prepare("INSERT INTO produit (nom,prix,quantite,seuil_alerte,categorie_id) VALUES (:nom, :prix, :quantite, :seuil_alerte, :categorie_id)");
        $stmt -> bindParam(':nom', $nom);
        $stmt -> bindParam(':prix', $prix);
        $stmt -> bindParam(':quantite', $quantite);
        $stmt -> bindParam(':seuil_alerte', $seuil_alerte);
        $stmt -> bindParam(':categorie_id', $categorie_id);
        $stmt->execute();
    }
    public function update(int $id,string $nom,float $prix, int $quantite,int $seuil_alerte, int $categorie_id){
        $stmt = $this ->pdo -> prepare("UPDATE produit SET nom= :nom, prix= :prix, quantite= :quantite, seuil_alerte= :seuil_alerte, categorie_id= :categorie_id WHERE id = :id");
        $stmt -> bindParam(':id', $id);
        $stmt -> bindParam(':nom', $nom);
        $stmt -> bindParam(':prix', $prix);
        $stmt -> bindParam(':quantite', $quantite);
        $stmt -> bindParam(':seuil_alerte', $seuil_alerte);
        $stmt -> bindParam(':categorie_id', $categorie_id);
        $stmt -> execute();
    }
    public function delete(int $id){
        $stmt = $this ->pdo -> prepare("DELETE FROM produit WHERE id = :id");
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();
    }
}

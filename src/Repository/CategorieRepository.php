<?php

namespace App\Repository;

use App\Database;
use PDO;

class CategorieRepository
{
    private PDO $pdo;

    public function __construct(){
        $this ->pdo = Database::getConnection();
    }

    public function findAllCategories():array{
        $stmt = $this ->pdo -> prepare("SELECT * FROM categorie");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOneCategorie(int $id){
        $stmt = $this ->pdo -> prepare("SELECT * FROM categorie WHERE id = :id");
        $stmt -> bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function insert(string $nom){
        $stmt = $this ->pdo -> prepare("INSERT INTO categorie (nom) VALUES (:nom)");
        $stmt -> bindParam(':nom', $nom);
        $stmt->execute();
    }
    public function update(int $id, string $nom){
        $stmt = $this ->pdo -> prepare("UPDATE categorie SET nom = :nom WHERE id = :id");
        $stmt -> bindParam(':id', $id);
        $stmt -> bindParam(':nom', $nom);
        $stmt->execute();
    }
    public function delete(int $id){
        $stmt = $this ->pdo -> prepare("DELETE FROM categorie WHERE id = :id");
        $stmt -> bindParam(':id', $id);
        $stmt-> execute();
    }
}

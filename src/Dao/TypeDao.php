<?php 

namespace App\Dao;

use App\Model\Type;
use PDO;

class TypeDao extends AbstractDao
{
    /**
     * Récupération de tous les types
     *
     * @return Type[]
     */
    public function getAll(): array
    {
        $req = $this->pdo->query("SELECT * FROM types");
        return $req->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Insertion d'un nouveau Type
     *
     * @param Type $type Type à insérer
     * @return int Identifiant du Type nouvellement créée
     */
    public function add(Type $type): int {
        $req = $this->pdo->prepare("
        INSERT INTO types (name) 
        VALUES (:name)");

        $req->execute([
            ":name" => $type->getName()
        ]);

        return $this->pdo->lastInsertId();
    }

    /**
     * Suppression d'un type
     *
     * @param int $id Identifiant du type à supprimer
     */
    public function delete(int $id): void
    {
        $req = $this->pdo->prepare("DELETE FROM types WHERE id = :id");
        $req->execute([
            ":id" => $id
        ]);
    }
}
<?php 

namespace App\Dao;

use App\Model\Tag;
use PDO;

class TagDao extends AbstractDao
{
    /**
     * Récupération de tous les tags
     *
     * @return Tag[]
     */
    public function getAll(): array
    {
        $req = $this->pdo->query("SELECT * FROM tags");
        return $req->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Insertion d'un nouveau Tag
     *
     * @param Tag $tag Tag à insérer
     * @return int Identifiant du Tag nouvellement créée
     */
    public function add(Tag $tag): int {
        $req = $this->pdo->prepare("
        INSERT INTO tags (name, type_id) 
        VALUES (:name, :type_id)");

        $req->execute([
            ":name" => $tag->getName(),
            ":type_id" => $tag->getTypeId()
        ]);

        return $this->pdo->lastInsertId();
    }

    /**
     * Suppression d'un tag
     *
     * @param int $id Identifiant du tag à supprimer
     */
    public function delete(int $id): void
    {
        $req = $this->pdo->prepare("DELETE FROM tags WHERE id = :id");
        $req->execute([
            ":id" => $id
        ]);
    }
}
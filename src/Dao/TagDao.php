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
}
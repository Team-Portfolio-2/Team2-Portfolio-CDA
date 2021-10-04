<?php 

namespace App\Dao;

use App\Model\Tag;
use PDO;

class TagDao extends AbstractDao
{
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
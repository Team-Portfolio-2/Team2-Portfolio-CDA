<?php 

namespace App\Dao;

use App\Model\Task;
use PDO;

class TaskDao extends AbstractDao
{
    /**
     * Récupération de tous les types
     *
     * @return Task[]
     */
    public function getAll(): array
    {
        $req = $this->pdo->query("SELECT * FROM tasks");
        return $req->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Insertion d'un nouveau Task
     *
     * @param Task $task Task à insérer
     * @return int Identifiant du Task nouvellement créée
     */
    public function add(Task $task): int {
        $req = $this->pdo->prepare("
        INSERT INTO tasks (description) 
        VALUES (:description)");

        $req->execute([
            ":description" => $task->getDescription()
        ]);

        return $this->pdo->lastInsertId();
    }

    /**
     * Suppression d'un task
     *
     * @param int $id Identifiant du task à supprimer
     */
    public function delete(int $id): void
    {
        $req = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
        $req->execute([
            ":id" => $id
        ]);
    }
}
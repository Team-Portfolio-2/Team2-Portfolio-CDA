<?php

namespace App\Controller;

use App\Dao\PortefolioDao;
use App\Model\PortefolioModele;
use PDOException;

class TaskController
{

    public function index(): void
    {
        if (isset($_SESSION['admin']))
        try {
            $projects = (new TaskDao())->getAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

         require implode(
             DIRECTORY_SEPARATOR, 
             [TEMPLATES, "", "tasks.html.php"]);

        // Récupérer toutes les infos
    }
    public function addTask(): void
    {

    }
    
    public function editTask(int $id_task): void
    {

    }



    public function deleteTask(int $id_task): void
    {

    }

}
<?php

namespace App\Controller;

use App\Dao\ProjectDao;
use PDOException;

class ProjectController
{
    public function index(): void
    {
        try {
            $projects = (new ProjectDao())->getAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

        // require implode(
        //     DIRECTORY_SEPARATOR, 
        //     [TEMPLATES, "projects", "index.html.php"]);

    }
    public function add(): void
    {
    }
    public function edit(int $id_project): void
    {
    }
    public function delete(int $id_project): void
    {
    }
}
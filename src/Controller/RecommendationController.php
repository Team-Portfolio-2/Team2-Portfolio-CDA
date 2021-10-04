<?php

namespace App\Controller;

use App\Dao\Portefolio;


class RecommendationController
{
    public function index(): void

        try {
            $projects = (new ProjectDao())->getAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

         require implode(
             DIRECTORY_SEPARATOR, 
             [TEMPLATES, "projects", "recommandation.html.php"]
            );

    }

    public function add(): void
    {

    }
    
    public function editRecommendation(int $id_task): void
    {

    }



    public function deleteRecommendation(int $id_task): void
    {

    }

}
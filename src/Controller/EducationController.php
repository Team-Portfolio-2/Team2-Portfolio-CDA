<?php

namespace App\Controller;

use App\Dao\EducationDao;
use PDOException;

class EducationController
{
    public function index(): void
    {
        try {
            $educations = (new EducationDao())->getAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

        require implode(
            DIRECTORY_SEPARATOR,
            [TEMPLATES, "educations", "education.html.php"]
        );
    }


    public function editEducation(): void
    {
    }


    public function addEducation(): void
    {
    }

    public function deleteEducation(int $id_education): void
    {
    }
}

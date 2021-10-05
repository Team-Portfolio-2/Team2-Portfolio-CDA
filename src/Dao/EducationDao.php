<?php

namespace App\Dao;

use App\Model\Education;
use App\Model\Profile;
use PDO;

class EducationDao extends AbstractDao
{

    public function getAll(): array
    {
        $req = $this->pdo->prepare("SELECT * FROM educations");
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        $educations = [];

        foreach ($result as $key => $education) {


            $educations[$key] = (new Education(
                $education['id'],
                $education['title'],
                $education['school'],
                $education['year'],
                $education['description'],

            ));
        }

        return $educations;
    }
}

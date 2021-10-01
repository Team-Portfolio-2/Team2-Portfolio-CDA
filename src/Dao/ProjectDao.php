<?php

namespace App\Dao;

use App\Model\Project;
use PDO;

class ProjectDao extends AbstractDao
{
    public function getAll(): array
    {
        $req = $this->pdo->prepare("SELECT * FROM projects");
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $projects = [];

        foreach ($result as $key => $project) {
            $projects[$key] = (new Project(
                $project['id'],
                $project['name'],
                $project['company'],
                $project['logo_company'],
                $project['description'],
                $project['website'],
                $project['start'],
                $project['end']
            ));
        }

        return $result;
    }


    public function getById(int $id): Project
    {
      $req = $this->pdo->prepare("SELECT * FROM projects WHERE id = :id");
      $req->execute([
        ":id" => $id
      ]);

        $project = $req->fetch(PDO::FETCH_ASSOC);

        $article = (new Project(
        $project['id'],
        $project['name'],
        $project['company'],
        $project['logo_company'],
        $project['description'],
        $project['website'],
        $project['start'],
        $project['end']
        ));

        return $$article;
    }

    public function edit(Project $project): void
    {
        $req = $this->pdo->prepare("UPDATE project
        SET name = :name, 
        company = :company, 
        logo_company = :logo_company, 
        description = :description, 
        website = :website,
        start = :start,
        end = :end
        WHERE id = :id");

        $req->execute([
            ":name" => $project->getName(),
            ":company" => $project->getCompany(),
            ":logo_company" => $project->getLogoCompany(),
            ":description" => $project->getDescription(),
            ":website" => $project->getWebsite(),
            ":start" => $project->getStart(),
            ":end" => $project->getEnd(),
            ":id" => $project->getId()
        ]);
    }
}

<?php

namespace App\Dao;

use App\Model\Profile;
use PDO;

class PortfolioDao extends AbstractDao
{
    public function signUp(Profile $admin): void
    {
        $req = $this->pdo->prepare(
            "INSERT INTO profile VALUES (:first_name, 
            :last_name, 
            :gender,
            :adress,
            :cp,
            :city,
            :email,
            :phone,
            :linkedin_url,
            :github_url,
            :twitter_url,
            :password,
            :drive_licence,
            :catchphrase,
            :birthdate)"
        );
        $req->execute([
            ":first_name" => $admin->getFirstName(),
            ":last_name" => $admin->getLastName(),
            ":gender" => $admin->getGender(),
            ":adress" => $admin->getAdress(),
            ":cp" => $admin->getCp(),
            ":city" => $admin->getCity(),
            ":email" => $admin->getEmail(),
            ":phone" => $admin->getPhone(),
            ":linkedin_url" => $admin->getLinkedinUrl(),
            ":github_url" => $admin->getGithubUrl(),
            ":twitter_url" => $admin->getTwitterUrl(),
            ":password" => $admin->getPassword(),
            ":drive_licence" => $admin->getDriveLicence(),
            ":catchphrase" => $admin->getCatchphrase(),
            ":birthdate" => $admin->getBirthdate(),
        ]);
    }

    public function signIn($admin)
    {
        $req = $this->pdo->prepare(
            "SELECT * FROM profile WHERE email = ?"
        );
        $req->execute([
            $admin['email'],
        ]);
        $receivedProfile = ($req->fetch());
        return $receivedProfile;
    }
}

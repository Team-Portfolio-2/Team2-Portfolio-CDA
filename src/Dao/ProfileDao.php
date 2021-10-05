<?php

namespace App\Dao;

use App\Model\Profile;
use PDO;
use DateTime;

class ProfileDao extends AbstractDao
{
    private function toDateTime(string $date): Datetime
    {
        return DateTime::createFromFormat(
            "Y-m-d",
            $date
        );
    }

    public function getInfo(): Profile
    {
        $req = $this->pdo->query("SELECT * FROM profile");
        $info = $req->fetch(PDO::FETCH_ASSOC);
        dump($info);
        $profile = (new Profile())
            ->setFirstName($info["first_name"])
            ->setLastName($info["last_name"])
            ->setGender($info["gender"])
            ->setAdress($info["adress"])
            ->setCp($info["cp"])
            ->setCity($info["city"])
            ->setEmail($info["email"])
            ->setPhone($info["phone"])
            ->setLinkedinUrl($info["linkedin_url"])
            ->setGithubUrl($info["github_url"])
            ->setTwitterUrl($info["twitter_url"])
            ->setDriveLicence($info["drive_licence"])
            ->setCatchphrase($info["catchphrase"])
            ->setBirthdate(
                $this->toDateTime(
                    $info["birthdate"]
                )
            );

        return $profile;
    }

    public function edit(Profile $profile): void
    {
        $req = $this->pdo->prepare("UPDATE profile
      SET 
      first_name = :first_name,
      last_name = :last_name,
      gender = :gender,
      adress = :adress,
      cp = :cp,
      city = :city,
      email = :email,
      phone = :phone,
      linkedin_url = :linkedin_url,
      github_url = :github_url,
      twitter_url = :twitter_url,
      password = :password,
      drive_licence = :drive_licence,
      catchphrase = :catchphrase,
      birthdate = :birthdate
      WHERE email = :email");

        $req->execute([
            ":first_name" => $profile->getFirstName(),
            ":last_name" => $profile->getLastName(),
            ":gender" => $profile->getGender(),
            ":adress" => $profile->getAdress(),
            ":cp" => $profile->getCp(),
            ":city" => $profile->getCity(),
            ":email" => $profile->getEmail(),
            ":phone" => $profile->getPhone(),
            ":linkedin_url" => $profile->getLinkedinUrl(),
            ":twitter_url" => $profile->getTwitterUrl(),
            ":password" => $profile->getPassword(),
            ":drive_licence" => $profile->getDriveLicence(),
            ":catchphrase" => $profile->getCatchphrase(),
            ":birthdate" => $profile->getCatchphrase()
        ]);
    }
}

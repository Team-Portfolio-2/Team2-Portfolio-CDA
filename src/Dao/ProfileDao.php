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

    public function getInfo():Profile {
        $req = $this->pdo->query("SELECT * FROM profile");
        $info = $req->fetch(PDO::FETCH_ASSOC);

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
}
<?php

namespace App\Controller;

use App\Dao\ProfileDao;
use App\Model\Profile;
use PDOException;

class ProfileController
{
    public function index():void {
        try {
            $profile = (new ProfileDao())->getInfo();
            dump($profile);
        } catch (PDOException $e) {
            echo $e->getMessage();
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

        // require implode(
        //     DIRECTORY_SEPARATOR, 
        //     [TEMPLATES, "projects", "index.html.php"]);
    }

    public function edit(): void
    {
        if (isset($_POST["email"])) {
            try {
                $profile = new Profile();
                $profile->setFirstName($_POST["first_tname"])
                        ->setLastName($_POST["last_name"])
                        ->setGender($_POST["gender"])
                        ->setAdress($_POST["adress"])
                        ->setCp($_POST["cp"])
                        ->setCity($_POST["city"])
                        ->setEmail($_POST["email"])
                        ->setPhone($_POST["phone"])
                        ->setLinkedinUrl($_POST["linkedin"])
                        ->setGithubUrl($_POST["github"])
                        ->setTwitterUrl($_POST["twitter"])
                        ->setPassword($_POST["password"])
                        ->setDriveLicence($_POST["drive_licence"])
                        ->setCatchphrase($_POST["catchphrase"])
                        ->setBirthdate($_POST["birthdate"]);
                (new ProfileDao())->edit($profile);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } 
        else {
            try {
                $profile = (new ProfileDao())->getInfo();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            // require implode(
            //     DIRECTORY_SEPARATOR, 
            //     [TEMPLATES, "projects", "edit.html.php"]);    
        }
    }

}

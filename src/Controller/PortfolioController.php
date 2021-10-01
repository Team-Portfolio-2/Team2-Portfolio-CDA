<?php

namespace App\Controller;

use App\Dao\PortefolioDao;
use App\Dao\PortfolioDao;
use App\Model\PortefolioModele;
use App\Model\Profil;
use PDOException;

class PortfolioController
{


    public function index(): void
    {

        // Récupérer toutes les infos
    }

    public function signUp(): void
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");
        if ('GET' === $request_method) {
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'admin', 'signup.html.php']);
        } elseif ('POST' === $request_method) {
            $args = [
                "email" => [],
                "passwordOne" => [],
                "passwordTwo" => [],
            ];

            $admin = filter_input_array(INPUT_POST, $args);

            if (empty($admin['email']) || empty($admin['passwordOne']) || empty($admin['passwordTwo'])) {
                $error_messages = "Merci de completer tous les champs !";
            } elseif ($_POST['passwordOne'] !== $_POST['passwordTwo']) {
                $error_messages = "Merci de mettre les memes mots de passe !";
            } else {
                $passwordHash = password_hash($_POST['passwordOne'], PASSWORD_DEFAULT);

                $admin = (new Profil())->setFirstName("John")
                    ->setLastName("Doe")
                    ->setGender(1)
                    ->setAdress(null)
                    ->setCp(69000)
                    ->SetCity("Lyon")
                    ->setEmail($admin['email'])
                    ->setPhone(null)
                    ->setLinkedinUrl(null)
                    ->setGithubUrl(null)
                    ->setTwitterUrl(null)
                    ->setPassword($passwordHash)
                    ->setDriveLicence(null)
                    ->setCatchphrase(null)
                    ->setBirthdate(null);
            }
            if (empty($error_messages)) {
                try {
                    (new PortfolioDao())->signUp($admin);
                    require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'admin', 'signin.html.php']);
                    exit;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                //ERROR 404
            }
        }
    }

    public function signin(): void
    {
    }

    public function logout(): void
    {
    }
}

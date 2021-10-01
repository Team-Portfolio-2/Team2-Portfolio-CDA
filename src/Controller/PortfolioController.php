<?php

namespace App\Controller;

use App\Dao\PortefolioDao;
use App\Dao\PortfolioDao;
use App\Model\PortefolioModele;
use App\Model\Profile;
use PDOException;

class PortfolioController
{


    public function index(): void
    {
        if (isset($_SESSION['admin']))
            dump($_SESSION);
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
                $error_messages = "";
                $admin = (new Profile())->setFirstName("John")
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
                    header("Location: /admin/signin");
                    exit;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                //ERROR 404
            }
        }
    }

    public function signIn(): void
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");
        if ('GET' === $request_method) {
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'admin', 'signin.html.php']);
        } elseif ('POST' === $request_method) {
            $error_messages = "";
            $args = [
                "email" => [],
                "passwordOne" => [],
            ];

            $admin = filter_input_array(INPUT_POST, $args);
            if (empty($admin['email']) || empty($admin['passwordOne'])) {
                $error_messages = "Merci de completer tous les champs obligatoires !";
            }
            if (empty($error_messages)) {
                try {
                    $adminConfirmed = (new PortfolioDao())->signIn($admin);
                    if (password_verify($admin['passwordOne'], $adminConfirmed['password'])) {
                        $_SESSION['admin'] = $adminConfirmed;
                        header('Location: /');
                        exit;
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                //ERROR 404
            }
        }
    }

    public function logout(): void
    {
    }
}

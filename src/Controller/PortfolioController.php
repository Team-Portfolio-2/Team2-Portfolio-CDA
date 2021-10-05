<?php

namespace App\Controller;

use App\Dao\PortfolioDao;
use App\Dao\ProfileDao;
use PDOException;
use App\Model\Profile;
use App\Dao\ProjectDao;
use App\Dao\EducationDao;

class PortfolioController
{


    public function index(): void
    {

        if (isset($_SESSION['admin']))

            try {
                $projects = (new ProjectDao())->getAll();
                $profile = (new ProfileDao())->getInfo();
                $educations = (new EducationDao())->getAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
            }

        require implode(
            DIRECTORY_SEPARATOR,
            [TEMPLATES, "", "index.html.php"]
        );


        // Récupérer toutes les infos
    }
    /**
     * Displays the form or POST an admin
     *
     * @return void
     */
    public function signUp(): void
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");
        if ('GET' === $request_method) {
            $profile = (new ProfileDao())->getInfo();
            // Guard against registration if already an admin
            if (!empty($profile)) {
                header("Location: /admin/signin");
            }
            // If no admin exists allows the form
            else {
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'admin', 'signup.html.php']);
            }
            //POST a admin
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
                    ->setCatchphrase("Ma passion c'est le code !")
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

    /**
     * GET a admin
     *
     * @return void
     */
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
    /**
     * LOGOUT a admin
     *
     * @return void
     */
    public function logout(): void
    {
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'admin', 'logout.html.php']);
    }
}

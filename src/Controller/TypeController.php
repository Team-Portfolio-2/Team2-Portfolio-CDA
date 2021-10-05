<?php

namespace App\Controller;

use App\Model\Type;
use APP\Dao\TypeDao;
use PDOException;


class TypeController
{

    public function index(): void
    {
        try {
            $types = (new TypeDao())->getAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

        // require implode(
        // DIRECTORY_SEPARATOR, 
        // [TEMPLATES, "types", "index.html.php"]);
    }

    public function add(): void
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        if ('GET' === $request_method) {
            // require implode(
            // DIRECTORY_SEPARATOR, 
            // [TEMPLATES, "types", "add.html.php"]);  
        } elseif ('POST' === $request_method) {
            // Récupération des données envoyées depuis le formulaire
            $args = [
                "name" => []
            ];
            $type_post = filter_input_array(INPUT_POST, $args);

            // Vérification qu'on n'a pas reçu de champs vide ou rempli d'espace
            if (isset($type_post["name"])) {
                if (empty(trim($type_post["name"]))) {
                    $error_messages[] = "Nom inexistant";
                }
            }

            // Instanciation d'un article avec les valeurs récupérées dans le formulaire
            $type = new Type(
                null,
                $type_post["name"]
            );

            if (empty($error_messages)) {
                try {
                    // Création du nouvel article et récupération de son identifiant
                    $id = (new TypeDao())->add($type);
                    // Redirection sur l'affiche de l'article nouvellement créée
                    // $this->redirectToRoute('show_article', [$id]);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                //Load template with errors displayed  
            }
        }
    }
    

    public function edit(int $id): void
    {

    }

    /**
     * Suppression d'un type en fonction de son identifiant unique
     *
     * @param int $id Identifiant de l'article
     */
    public function delete(int $id): void
    {
        try {
            //Suppression de l'article en fonction de son identifiant
            (new TypeDao())->delete($id);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
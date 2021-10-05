<?php

namespace App\Controller;

use App\Model\Tag;
use APP\Dao\TagDao;
use PDOException;


class TagController
{

    public function index(): void
    {
        try {
            $tags = (new TagDao())->getAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

        // require implode(
        // DIRECTORY_SEPARATOR, 
        // [TEMPLATES, "tags", "index.html.php"]);  
    }

    public function add(): void
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        if ('GET' === $request_method) {
            // require implode(
            // DIRECTORY_SEPARATOR, 
            // [TEMPLATES, "tags", "add.html.php"]);  
        } elseif ('POST' === $request_method) {
            // Récupération des données envoyées depuis le formulaire
            $args = [
                "name" => [],
                "type_id" => []
            ];
            $tag_post = filter_input_array(INPUT_POST, $args);

            // Vérification qu'on n'a pas reçu de champs vide ou rempli d'espace
            if (isset($tag_post["name"]) && isset($tag_post["type_id"])) {
                if (empty(trim($tag_post["name"]))) {
                    $error_messages[] = "Nom inexistant";
                }

                if (empty(trim($tag_post["type_id"]))) {
                    $error_messages[] = "Type inexistant";
                }
            }

            // Instanciation d'un article avec les valeurs récupérées dans le formulaire
            $tag = new tag(
                $tag_post["name"],
                $tag_post["type_id"]
            );

            if (empty($error_messages)) {
                try {
                    // Création du nouvel article et récupération de son identifiant
                    $id = (new TagDao())->add($tag);
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
     * Suppression d'un tag en fonction de son identifiant unique
     *
     * @param int $id Identifiant de l'article
     */
    public function delete(int $id): void
    {
        try {
            //Suppression de l'article en fonction de son identifiant
            (new TagDao())->delete($id);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
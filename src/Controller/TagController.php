<?php

namespace App\Controller;

use App\Model\Tag;

class TagController
{


    public function addTag(): void
    {
        // Créer un nouveau Tag

        // Appeler (inclure) la vue

        if (!empty($_POST)) {

            $newTag = (new Tag())
                ->setId(null)
                ->setName($_POST['name'])
                ->setTypeId($_POST['id'])                ;
            try {
                TagDao::newTag($newTag);
                // Appeler (inclure) la vue
                require TEMPLATES . DIRECTORY_SEPARATOR . "tag" . DIRECTORY_SEPARATOR . "newsuccess.html.php";
            } catch (PDOException $e) {
                dump($e);
            }
        } else {
            require TEMPLATES . DIRECTORY_SEPARATOR . "tag" . DIRECTORY_SEPARATOR . "new.html.php";
        }

    }
    

    public function editTag(int $id_tag): void
    {

    }



    // Récupérer un tag en fonction de son id
    public function deleteTag(int $id_tag): void
    {
        // Appeler (inclure) la vue
        ob_start();
        require "tags.html.php";
        $content = ob_get_clean();

        // Appeler le layout
        require "layout.html.php";
    }

}
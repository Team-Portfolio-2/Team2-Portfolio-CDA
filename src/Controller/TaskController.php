<?php

namespace App\Controller;

use App\Model\Task;
use APP\Dao\TaskDao;
use PDOException;


class TaskController
{

    public function index(): void
    {
        try {
            $tasks = (new TaskDao())->getAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

        // require implode(
        // DIRECTORY_SEPARATOR, 
        // [TEMPLATES, "tasks", "index.html.php"]);  
    }

    public function add(): void
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        if ('GET' === $request_method) {
            // require implode(
            // DIRECTORY_SEPARATOR, 
            // [TEMPLATES, "tasks", "add.html.php"]);  
        } elseif ('POST' === $request_method) {
            // Récupération des données envoyées depuis le formulaire
            $args = [
                "description" => []
            ];
            $task_post = filter_input_array(INPUT_POST, $args);

            // Vérification qu'on n'a pas reçu de champs vide ou rempli d'espace
            if (isset($task_post["description"])) {
                if (empty(trim($task_post["description"]))) {
                    $error_messages[] = "Nom inexistant";
                }
            }

            // Instanciation d'un article avec les valeurs récupérées dans le formulaire
            $task = new Task(
                null,
                $task_post["description"]
            );

            if (empty($error_messages)) {
                try {
                    // Création du nouvel article et récupération de son identifiant
                    $id = (new TaskDao())->add($task);
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
    

    /**
     * Edition de la task en fonction de son identifiant unique
     *
     * @param int $id Identifiant de la task
     */
    public function edit(int $id): void
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        // Intanciation d'un TaskDao
        $taskDao = new TaskDao();
        // Récupération de la task en fonction de son identifiant
        $task = $taskDao->getById($id);

        if ('GET' === $request_method) {
            // require implode(
            // DIRECTORY_SEPARATOR, 
            // [TEMPLATES, "tasks", "edit.html.php"]);  
        } elseif ('POST' === $request_method) {
            // Récupération des données envoyées depuis le formulaire
            $args = [
                "description" => []
            ];
            $task_post = filter_input_array(INPUT_POST, $args);

            // Vérification qu'on n'a pas reçu de champs vide ou rempli d'espace
            if (isset($task_post["description"])) {
                if (empty(trim($task_post["description"]))) {
                    $error_messages[] = "Nom inexistant";
                }
            }

            // Instanciation d'un article avec les valeurs récupérées dans le formulaire
            $task = new Task(
                null,
                $task_post["description"]
            );

            if (empty($error_messages)) {
                try {
                    // Création du nouvel article et récupération de son identifiant
                    $id = (new TaskDao())->edit($task);
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


    /**
     * Suppression d'un task en fonction de son identifiant unique
     *
     * @param int $id Identifiant de l'article
     */
    public function delete(int $id): void
    {
        try {
            //Suppression de l'article en fonction de son identifiant
            (new TaskDao())->delete($id);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
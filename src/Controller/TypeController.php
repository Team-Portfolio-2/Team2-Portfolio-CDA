
    <?php

namespace App\Controller;

use App\Dao\PortefolioDao;
use App\Model\PortefolioModele;
use PDOException;

class TagController
{

    public function index(): void
    {
        if (isset($_SESSION['admin']))
        try {
            $projects = (new TypeDao())->getAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

         require implode(
             DIRECTORY_SEPARATOR, 
             [TEMPLATES, "", "Type.html.php"]);

        // Récupérer toutes les infos
    }

    
    public function editTag(int $id_tag): void
    {

    }



    public function deleteTag(int $id_tag): void
    {

    }

}
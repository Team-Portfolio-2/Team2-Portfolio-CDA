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
}

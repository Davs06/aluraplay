<?php

namespace Alura\MVC\Controller;

use Alura\MVC\Repository\VideoRepository;
use PDO;

class FormController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function req(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $video = null;

        if ($id !== false and $id !== null) {
            $video = $this->videoRepository->find(intval($id));
        }
        require_once __DIR__ . "/../../views/form.php";
    }
}

<?php

namespace Alura\MVC\Controller;

use Alura\MVC\Repository\VideoRepository;

class RemoveVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function req() :void
    {

        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        if ($id === false && $id !== null) {
            header("Location: /?sucesso=0");
            exit();
        }

        $remove = $this->videoRepository->remove(intval($id));

        if ($remove === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}

<?php

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Repository\VideoRepository;

class EditVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function req(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id === false || $id === null) {
            header('Location: /?sucesso=0');
            return;
        }

        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);

        if ($url === false) {
            header('Location: /?sucesso=0');
            return;
        }

        $title = filter_input(INPUT_POST, 'title');

        if ($title === false) {
            header('Location: /?sucesso=0');
            return;
        }

        $video = new Video($url, $title);
        $video->setId($id);

        $editar = $this->videoRepository->update($video);

        if ($editar === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
        
    }
}

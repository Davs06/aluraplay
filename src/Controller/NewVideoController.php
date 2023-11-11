<?php

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Repository\VideoRepository;

class NewVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function req(): void
    {
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);

        if ($url === false) {
            header('Location: /?sucesso=0');
            return ;
        }

        $title = filter_input(INPUT_POST, 'title');

        if ($title === false || $title === null) {
            header('Location: /?sucesso=0');
            return;
        }

        $novoVideo = $this->videoRepository->add(new Video($url, $title));

        if ($novoVideo === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}

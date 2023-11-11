<?php

namespace Alura\MVC\Controller;

use Alura\MVC\Repository\VideoRepository;
use PDO;

class VideoListController implements Controller
{

    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function req(): void
    {
        $videoList = $this->videoRepository->findAll();

        require_once __DIR__ . "/../../views/video_list.php";
    }
}

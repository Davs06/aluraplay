<?php

namespace Alura\MVC\Repository;

use PDO;
use Alura\MVC\Entity\Video;

class VideoRepository
{
    public function __construct(private PDO $pdo)
    {
        // $this->pdo = $pdo;
    }

    public function add(Video $video)
    {
        $sql = "INSERT INTO videos(url,title) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $video->url);
        $stmt->bindValue(2, $video->title);
        $result = $stmt->execute();

        $id = $this->pdo->lastInsertId();
        $video->setId(intval($id));

        return $result;
    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM videos WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }

    public function update(Video $video): bool
    {
        $sql = 'UPDATE videos SET url = :url, title = :title  WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':url', $video->url);
        $stmt->bindValue(':title', $video->title);
        $stmt->bindValue(':id', $video->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function findAll(): array
    {
        $videoList = $this->pdo->query("SELECT * FROM videos;")->fetchAll(PDO::FETCH_ASSOC);
        return array_map(

            $this->hydrateVideo(...),
            $videoList
        );
    }

    public function find(int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM videos WHERE id=?');
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        return $this->hydrateVideo($stmt->fetch(PDO::FETCH_ASSOC));
    }

    private function hydrateVideo(array $videoData): Video
    {
        $video = new Video($videoData['url'], $videoData['title']);
        $video->setId($videoData['id']);
        return $video;
    }
}

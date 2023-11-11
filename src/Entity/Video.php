<?php
namespace Alura\MVC\Entity;


class Video
{
    public readonly int $id;
    public readonly string $url;
    
    public function __construct(string $url, public readonly string $title)
    {
        $this->setUrl($url);
    }

    public function setUrl(string $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException("url invalida");
        }
        $this->url = $url;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}

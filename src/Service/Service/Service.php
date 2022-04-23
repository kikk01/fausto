<?php

declare(strict_types=1);

namespace App\Service\Service;

class Service
{
    private string $title;

    private string $text;

    private string $imagePath;

    public function __construct($title, $text, $imagePath)
    {
        $this->title = $title;
        $this->text = $text;
        $this->imagePath = $imagePath;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;

        return $this;
    }
}

<?php

namespace App\DTO;

class NewsDto
{
    public string $link;
    public string $description;
    public string $title;
    public string $date;
    public string $source;

    public function __construct(string $title, string $link, string $date, string $description = '', string $source = '')
    {
        $this->link = $link;
        $this->description = $description;
        $this->title = $title;
        $this->date = $date;
        $this->source = $source;
    }

    public function toArray()
    {
        return [
            'link' => $this->link,
            'description' => $this->description,
            'title' => $this->title,
            'date' => $this->date,
            'source' => $this->source,
        ];
    }
}

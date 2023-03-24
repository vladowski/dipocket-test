<?php

namespace App\DTO;

class NewsDTO
{
    public function __construct(
        private string $title,
        private string $link,
        private string $date,
        private string $source,
        private string $description
    )
    {
    }

    public function toArray(): array
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

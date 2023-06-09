<?php

namespace App\Services;

use SimplePie\SimplePie;

class NewsFetcher
{
    public function __construct(private SimplePie $simplePie)
    {
    }

    public function fetch(string $keyword, string $language): ?array
    {
        $this->simplePie->set_feed_url("https://news.google.com/rss/search?q={$keyword}&hl={$language}&gl={$language}&ceid={$language}:{$language}");
        $this->simplePie->enable_cache(false);
        $this->simplePie->init();

        return $this->simplePie->get_items();
    }
}

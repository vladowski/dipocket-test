<?php

namespace App\Controllers;

use App\Services\NewsFetcher;
use App\Transformers\NewsTransformer;
use Symfony\Component\HttpFoundation\Request;

class MainController
{
    public function __construct(private NewsFetcher $newsFetcher, private NewsTransformer $newsTransformer)
    {
    }

    public function index(Request $request): array
    {
        $results = $this->newsFetcher->fetch($request->get('keyword'), $request->get('language'));

        return $this->newsTransformer->transform($results);
    }
}
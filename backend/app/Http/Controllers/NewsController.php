<?php

namespace App\Http\Controllers;

use App\Services\NewsFetcher;
use App\Transformers\NewsTransformer;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private NewsFetcher $newsFetcher;
    private NewsTransformer $newsTransformer;

    public function __construct(NewsFetcher $newsFetcher, NewsTransformer $newsTransformer)
    {
        $this->newsFetcher = $newsFetcher;
        $this->newsTransformer = $newsTransformer;
    }

    public function getNews(Request $request)
    {
        $results = $this->newsFetcher->fetch($request->get('keyword'), $request->get('language'));
        $transformedResults = $this->newsTransformer->transform($results);

        return response()->json(['results' => $transformedResults]);
    }
}

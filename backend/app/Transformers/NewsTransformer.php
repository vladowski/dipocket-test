<?php

namespace App\Transformers;


use App\DTO\NewsDto;
use SimplePie\Item;

class NewsTransformer
{
    /**
     * @param Item[] $results
     * @return array
     */
    public function transform(array $results): array
    {
        $transformedResults = [];

        foreach ($results as $result) {
            $newsDto = new NewsDTO(
                $result->get_title(),
                $result->get_link(),
                $result->get_date(),
                $result->get_base(),
                $result->get_description()
            );

            $transformedResults[] = $newsDto->toArray();
        }

        return $transformedResults;
    }
}

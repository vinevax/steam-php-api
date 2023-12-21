<?php

namespace VineVax\SteamPHPApi\Responses;

use VineVax\SteamPHPApi\Models\NewsItem;

readonly class NewsForAppResponse implements Response
{
    public function __construct(
        public int   $appid,
        /* @type $newsItems NewsItem[] */
        public array $newsItems,
        public int   $count,
    ) {}

    public static function fromResponse($response): self
    {
        $response = json_decode($response->getBody()->getContents(), true);

        return new self(
            $response['appnews']['appid'],
            array_map(fn($item) => new NewsItem(
                $item['gid'] ?? null,
                $item['title'] ?? null,
                $item['url'] ?? null,
                $item['is_external_url'] ?? null,
                $item['author'] ?? null,
                $item['contents'] ?? null,
                $item['feedlabel'] ?? null,
                $item['date'] ?? null,
                $item['feedname'] ?? null,
                $item['feed_type'] ?? null,
                $item['appid'] ?? null,
                $item['tags'] ?? null,
            ), $response['appnews']['newsitems']),
            $response['appnews']['count']);
    }
}
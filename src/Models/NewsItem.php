<?php

namespace VineVax\SteamPHPApi\Models;

readonly class NewsItem
{
    public function __construct(
        public ?string $gid,
        public ?string $title,
        public ?string $url,
        public ?bool $isExternalUrl,
        public ?string $author,
        public ?string $contents,
        public ?string $feedLabel,
        public ?string $date,
        public ?string $feedName,
        public ?string $feedType,
        public ?int $appid,
        public ?array $tags,
    ) {}
}
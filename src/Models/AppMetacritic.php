<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppMetacritic
{
    public function __construct(
        public ?int $score,
        public ?string $url,
    ){}

    public static function fromArray(array $array): self
    {
        return new self(
            score: $array['score'] ?? null,
            url: $array['url'] ?? null,
        );
    }
}
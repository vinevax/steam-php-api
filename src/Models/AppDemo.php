<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppDemo
{
    public function __construct(
        public ?int $appid,
        public ?string $description,
    ){}

    public static function fromArray(array $array): self
    {
        return new self(
            appid: $array['appid'] ?? null,
            description: $array['description'] ?? null,
        );
    }
}
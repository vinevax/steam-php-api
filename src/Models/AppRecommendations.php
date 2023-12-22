<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppRecommendations
{
    public function __construct(
        public ?int $total,
    ){}

    public static function fromArray(array $array): self
    {
        return new self(
            total: $array['total'] ?? null,
        );
    }
}
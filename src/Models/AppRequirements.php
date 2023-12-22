<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppRequirements
{
    public function __construct(
        public ?string $minimum,
        public ?string $recommended,
    ){}

    public static function fromArray(array $array): self
    {
        return new self(
            minimum: $array['minimum'] ?? null,
            recommended: $array['recommended'] ?? null,
        );
    }
}
<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppGenre
{
    public function __construct(
        public ?string $id,
        public ?string $description,
    ){}

    public static function fromArray(array $array): self
    {
        return new self(
            id: $array['id'] ?? null,
            description: $array['description'] ?? null,
        );
    }
}
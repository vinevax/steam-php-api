<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppCategory
{
    public function __construct(
        public ?int $id,
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
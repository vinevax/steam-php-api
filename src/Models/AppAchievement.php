<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppAchievement
{
    public function __construct(
        public ?string $name,
        public ?string $path,
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? null,
            $data['path'] ?? null,
        );
    }
}
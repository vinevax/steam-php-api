<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppScreenshot
{
    public function __construct(
        public ?int $id,
        public ?string $pathThumbnail,
        public ?string $pathFull,
    ){}

    public static function fromArray(array $array): self
    {
        return new self(
            id: $array['id'] ?? null,
            pathThumbnail: $array['path_thumbnail'] ?? null,
            pathFull: $array['path_full'] ?? null,
        );
    }
}
<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppMovie
{
    public function __construct(
        public ?int $id,
        public ?string $name,
        public ?string $thumbnail,
        public ?AppMovieResolutions $webm,
        public ?AppMovieResolutions $mp4,
        public ?bool $highlight,
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? null,
            $data['name'] ?? null,
            $data['thumbnail'] ?? null,
            $data['webm'] ? AppMovieResolutions::fromArray($data['webm']) : null,
            $data['mp4'] ? AppMovieResolutions::fromArray($data['mp4']) : null,
            $data['highlight'] ?? null,
        );
    }
}
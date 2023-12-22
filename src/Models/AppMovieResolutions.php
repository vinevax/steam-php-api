<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppMovieResolutions
{
    public function __construct(
        public ?string $sd,
        public ?string $max,
    ){}

    public static function fromArray(array $array): self
    {
        return new self(
            sd: $array['sd'] ?? null,
            max: $array['max'] ?? null,
        );
    }
}
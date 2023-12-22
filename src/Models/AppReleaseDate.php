<?php

namespace VineVax\SteamPHPApi\Models;

use DateTimeImmutable;
use DateTimeZone;

readonly class AppReleaseDate
{
    public function __construct(
        public bool $comingSoon = false,
        public ?string $date = null,
    ){}

    public static function fromArray(array $array): self
    {
        return new self(
            comingSoon: $array['coming_soon'] ?? false,
            date: $array['date'] ?? null,
        );
    }
}
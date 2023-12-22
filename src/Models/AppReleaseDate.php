<?php

namespace VineVax\SteamPHPApi\Models;

use DateTimeImmutable;
use DateTimeZone;

readonly class AppReleaseDate
{
    public function __construct(
        public bool $comingSoon = false,
        public ?DateTimeImmutable $date = null,
    ){}

    public static function fromArray(array $array): self
    {
        $date = isset($array['date']) ? DateTimeImmutable::createFromFormat('j M, Y', $array['date'], new DateTimeZone('America/Los_Angeles')) : null;
        if ($date !== false && $date !== null) {
            $date = $date->setTime(10, 0);
        }

        return new self(
            comingSoon: $array['coming_soon'] ?? false,
            date: $date,
        );
    }
}
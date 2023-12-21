<?php

namespace VineVax\SteamPHPApi\Models;

readonly class GlobalAchievement
{
    public function __construct(
        public ?string $name,
        public ?float $percent,
    ) {}
}
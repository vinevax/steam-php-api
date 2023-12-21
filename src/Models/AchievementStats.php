<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AchievementStats
{
    public function __construct(
        public ?string $name,
        public ?int $value,
    ){}
}
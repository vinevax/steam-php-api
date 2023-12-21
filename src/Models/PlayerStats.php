<?php

namespace VineVax\SteamPHPApi\Models;

readonly class PlayerStats
{
    public function __construct(
        public ?string $steamId,
        public ?string $gameName,
        /* @type $achievements Achievement[] */
        public ?array $achievements,
        public ?bool $success,
    ){}
}
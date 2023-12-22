<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppPlatforms
{
    public function __construct(
        public ?bool $windows,
        public ?bool $mac,
        public ?bool $linux,
    ){}

    public static function fromArray(array $array): self
    {
        return new self(
            windows: $array['windows'] ?? null,
            mac: $array['mac'] ?? null,
            linux: $array['linux'] ?? null,
        );
    }
}
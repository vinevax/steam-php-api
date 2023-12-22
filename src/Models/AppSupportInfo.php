<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppSupportInfo
{
    public function __construct(
        public ?string $url,
        public ?string $email,
    ){}

    public static function fromArray(array $array): self
    {
        return new self(
            url: $array['url'] ?? null,
            email: $array['email'] ?? null,
        );
    }
}
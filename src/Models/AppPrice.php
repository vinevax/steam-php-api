<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppPrice
{
    public function __construct(
        public ?string $currency,
        public ?int $initial,
        public ?int $final,
        public ?int $discountPercent,
        public ?string $initialFormatted,
        public ?string $finalFormatted,
    ){}

    public static function fromArray(array $array): self
    {
        return new self(
            currency: $array['currency'] ?? null,
            initial: $array['initial'] ?? null,
            final: $array['final'] ?? null,
            discountPercent: $array['discount_percent'] ?? null,
            initialFormatted: $array['initial_formatted'] ?? null,
            finalFormatted: $array['final_formatted'] ?? null,
        );
    }
}
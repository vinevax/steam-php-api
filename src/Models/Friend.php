<?php

namespace VineVax\SteamPHPApi\Models;

use DateTimeImmutable;

readonly class Friend
{
    public DateTimeImmutable $friendSince;

    public function __construct(
        public ?string $steamId,
        public ?string $relationship,
        ?int $friendSince,
    ) {
        $this->friendSince = DateTimeImmutable::createFromFormat('U', $friendSince ?? '0');
    }
}
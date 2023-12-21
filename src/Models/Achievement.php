<?php

namespace VineVax\SteamPHPApi\Models;

use DateTimeImmutable;

readonly class Achievement
{
    public bool $achieved;
    public ?DateTimeImmutable $unlockTime;

    public function __construct(
        public ?string $apiName = null,
        ?int $achieved = null,
        ?int $unlockTime = null,
        public ?string $name = null,
        public ?string $description = null,
    ) {
        $this->achieved = $achieved === 1;
        $this->unlockTime = $unlockTime ? DateTimeImmutable::createFromFormat('U', $unlockTime): null;
    }
}
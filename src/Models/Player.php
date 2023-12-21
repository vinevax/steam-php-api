<?php

namespace VineVax\SteamPHPApi\Models;

use DateTimeImmutable;
use VineVax\SteamPHPApi\Enums\CommunityVisibilityState;
use VineVax\SteamPHPApi\Enums\PersonaState;

readonly class Player
{
    public ?PersonaState $personaState;
    public ?CommunityVisibilityState $communityVisibilityState;
    public ?DateTimeImmutable $lastLogOff;
    public ?DateTimeImmutable $timeCreated;

    public function __construct(
        public ?int $steamId = null,
        ?int $communityVisibilityState = null,
        public ?int $profileState = null,
        public ?string $personaName = null,
        public ?int $commentPermission = null,
        public ?string $profileUrl = null,
        public ?string $avatar = null,
        public ?string $avatarMedium = null,
        public ?string $avatarFull = null,
        public ?string $avatarHash = null,
        ?int $lastLogOff = null,
        ?int $personaState = null,
        public ?string $realname = null,
        public ?string $primaryClanId = null,
        ?int $timeCreated = null,
        public ?int $personaStateFlags = null,
        public ?string $locCountryCode = null,
    ) {
        if (is_numeric($communityVisibilityState)) {
            $this->communityVisibilityState = CommunityVisibilityState::from($communityVisibilityState);
        }

        if (is_numeric($personaState)) {
            $this->personaState = PersonaState::from($personaState);
        }

        if (is_numeric($lastLogOff)) {
            $this->lastLogOff = DateTimeImmutable::createFromFormat('U', $lastLogOff);
        }

        if (is_numeric($timeCreated)) {
            $this->timeCreated = DateTimeImmutable::createFromFormat('U', $timeCreated);
        }
    }
}
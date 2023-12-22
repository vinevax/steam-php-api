<?php

namespace VineVax\SteamPHPApi\Models;

readonly class AppAchievements
{
    public function __construct(
        public ?int $total,
        /** @var AchievementStats[] */
        public array $highlighted = [],
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            total: $data['total'] ?? null,
            highlighted: array_map(fn($achievement) => AppAchievement::fromArray($achievement), $data['highlighted'] ?? []),
        );
    }
}
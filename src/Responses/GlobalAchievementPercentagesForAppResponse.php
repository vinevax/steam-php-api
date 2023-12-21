<?php

namespace VineVax\SteamPHPApi\Responses;

use VineVax\SteamPHPApi\Models\GlobalAchievement;

readonly class GlobalAchievementPercentagesForAppResponse implements Response
{
    public function __construct(
        public array $achievements = [],
    ){}

    public static function fromResponse($response): self
    {
        return new self(
            array_map(fn($achievement) => new GlobalAchievement(
                $achievement['name'] ?? null,
                $achievement['percent'] ?? null,
            ), $response['achievementpercentages']['achievements'])
        );
    }
}
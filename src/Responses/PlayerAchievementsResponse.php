<?php

namespace VineVax\SteamPHPApi\Responses;

use VineVax\SteamPHPApi\Models\Achievement;
use VineVax\SteamPHPApi\Models\PlayerStats;

readonly class PlayerAchievementsResponse implements Response
{
    public function __construct(
        public PlayerStats $playerStats,
    ){}

    public static function fromResponse($response): self
    {
        return new self(
            new PlayerStats(
                $response['playerstats']['steamID'] ?? null,
                $response['playerstats']['gameName'] ?? null,
                array_map(fn($achievement) => new Achievement(
                    $achievement['apiname'] ?? null,
                    $achievement['achieved'] ?? null,
                    $achievement['unlocktime'] ?? null,
                ), $response['playerstats']['achievements'] ?? []),
                $response['playerstats']['success'] ?? null,
            )
        );
    }
}
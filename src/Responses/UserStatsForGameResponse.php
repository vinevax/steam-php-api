<?php

namespace VineVax\SteamPHPApi\Responses;

use VineVax\SteamPHPApi\Models\Achievement;
use VineVax\SteamPHPApi\Models\AchievementStats;
use VineVax\SteamPHPApi\Models\PlayerStats;

readonly class UserStatsForGameResponse implements Response
{
    public function __construct(
        public PlayerStats $playerStats,
    ){}

    public static function fromResponse($response): Response
    {
        return new self(
            new PlayerStats(
                $response['playerstats']['steamID'] ?? null,
                $response['playerstats']['gameName'] ?? null,
                array_map(fn($achievement) => new Achievement(
                    $achievement['apiname'] ?? null,
                    $achievement['achieved'] ?? null,
                    $achievement['unlocktime'] ?? null,
                    $achievement['name'] ?? null,
                    $achievement['description'] ?? null,
                ), $response['playerstats']['achievements'] ?? []),
                $response['playerstats']['success'] ?? null,
                array_map(fn($stat) => new AchievementStats(
                    $stat['name'] ?? null,
                    $stat['value'] ?? null,
                ), $response['playerstats']['stats'] ?? [])
            )
        );
    }
}
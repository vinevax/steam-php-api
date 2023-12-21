<?php

namespace VineVax\SteamPHPApi\Responses;

use VineVax\SteamPHPApi\Models\Game;

readonly class RecentlyPlayedGamesResponse implements Response
{
    public function __construct(
        public int $totalCount = 0,
        public array $games = [],
    ){}

    public static function fromResponse($response): self
    {
        return new self(
            $response['response']['total_count'] ?? 0,
            array_map(fn($game) => new Game(
                $game['appid'] ?? null,
                $game['name'] ?? null,
                $game['playtime_2weeks'] ?? null,
                $game['playtime_forever'] ?? null,
                $game['img_icon_url'] ?? null,
                $game['img_logo_url'] ?? null,
                $game['has_community_visible_stats'] ?? null,
                $game['playtime_windows_forever'] ?? null,
                $game['playtime_mac_forever'] ?? null,
                $game['playtime_linux_forever'] ?? null,
            ), $response['response']['games'] ?? [])
        );
    }
}
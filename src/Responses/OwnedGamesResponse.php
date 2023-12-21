<?php

namespace VineVax\SteamPHPApi\Responses;

use VineVax\SteamPHPApi\Models\Game;

readonly class OwnedGamesResponse implements Response
{
    public function __construct(
        public ?int $gameCount,
        /** @type $games Game */
        public array $games = [],
    ){}

    public static function fromResponse($response): Response
    {
        return new self(
            $response['response']['game_count'] ?? null,
            array_map(fn($game) => new Game(
                $game['appid'] ?? null,
                $game['name'] ?? null,
                $game['playtime_forever'] ?? null,
                $game['playtime_2weeks'] ?? null,
                $game['img_icon_url'] ?? null,
                $game['img_logo_url'] ?? null,
                $game['has_community_visible_stats'] ?? null,
                $game['playtime_windows_forever'] ?? null,
                $game['playtime_mac_forever'] ?? null,
                $game['playtime_linux_forever'] ?? null,
                $game['rtime_last_played'] ?? null,
            ), $response['response']['games'] ?? [])
        );
    }
}
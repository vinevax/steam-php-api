<?php

namespace VineVax\SteamPHPApi\Responses;

use VineVax\SteamPHPApi\Models\Player;

readonly class PlayerSummariesResponse implements Response
{

    public function __construct(
        /* @var Player[] */
        public array $players = [],
    ) {}

    public static function fromResponse($response): self
    {
        $response = json_decode($response->getBody()->getContents(), true);

        $players = array_map(function (array $player) {
            return new Player(
                $player['steamid'] ?? null,
                $player['communityvisibilitystate'] ?? null,
                $player['profilestate'] ?? null,
                $player['personaname'] ?? null,
                $player['commentpermission'] ?? null,
                $player['profileurl'] ?? null,
                $player['avatar'] ?? null,
                $player['avatarmedium'] ?? null,
                $player['avatarfull'] ?? null,
                $player['avatarhash'] ?? null,
                $player['lastlogoff'] ?? null,
                $player['personastate'] ?? null,
                $player['realname'] ?? null,
                $player['primaryclanid'] ?? null,
                $player['timecreated'] ?? null,
                $player['personastateflags'] ?? null,
                $player['loccountrycode'] ?? null,
            );
        }, $response['response']['players']);


        return new self($players);
    }
}
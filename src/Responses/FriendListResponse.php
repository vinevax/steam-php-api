<?php

namespace VineVax\SteamPHPApi\Responses;

use VineVax\SteamPHPApi\Models\Friend;

readonly class FriendListResponse implements Response
{
    public function __construct(
        /** @type $friends Friend[] */
        public array $friends = [],
    ){}

    public static function fromResponse($response): self
    {
        return new self(
            array_map(fn($friend) => new Friend(
                $friend['steamid'] ?? null,
                $friend['relationship'] ?? null,
                $friend['friend_since'] ?? null,
            ), $response['friendslist']['friends'])
        );
    }
}
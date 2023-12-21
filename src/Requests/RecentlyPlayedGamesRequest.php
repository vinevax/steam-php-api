<?php

namespace VineVax\SteamPHPApi\Requests;

use VineVax\SteamPHPApi\Responses\RecentlyPlayedGamesResponse;

class RecentlyPlayedGamesRequest extends Request
{
    private string $version = 'v0001';
    private string $interface = 'IPlayerService';
    private string $method = 'GetRecentlyPlayedGames';
    private string $response = RecentlyPlayedGamesResponse::class;

    public function __construct()
    {
        parent::__construct($this->version, $this->interface, $this->method, $this->response);
    }
}
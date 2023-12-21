<?php

namespace VineVax\SteamPHPApi\Requests;

use VineVax\SteamPHPApi\Responses\OwnedGamesResponse;

class OwnedGamesRequest extends Request
{
    private string $version = 'v0001';
    private string $interface = 'IPlayerService';
    private string $method = 'GetOwnedGames';
    private string $response = OwnedGamesResponse::class;

    public function __construct()
    {
        parent::__construct($this->version, $this->interface, $this->method, $this->response);
    }
}
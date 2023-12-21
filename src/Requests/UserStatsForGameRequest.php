<?php

namespace VineVax\SteamPHPApi\Requests;

use VineVax\SteamPHPApi\Responses\UserStatsForGameResponse;

class UserStatsForGameRequest extends Request
{
    private string $version = 'v0002';
    private string $interface = 'ISteamUserStats';
    private string $method = 'GetUserStatsForGame';
    private string $response = UserStatsForGameResponse::class;

    public function __construct()
    {
        parent::__construct($this->version, $this->interface, $this->method, $this->response);
    }
}
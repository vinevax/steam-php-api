<?php

namespace VineVax\SteamPHPApi\Requests;

use VineVax\SteamPHPApi\Responses\PlayerAchievementsResponse;

class PlayerAchievementsRequest extends Request
{
    private string $version = 'v0001';
    private string $interface = 'ISteamUserStats';
    private string $method = 'GetPlayerAchievements';
    private string $response = PlayerAchievementsResponse::class;

    public function __construct()
    {
        parent::__construct($this->version, $this->interface, $this->method, $this->response);
    }
}
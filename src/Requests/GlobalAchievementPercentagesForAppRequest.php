<?php

namespace VineVax\SteamPHPApi\Requests;

use VineVax\SteamPHPApi\Responses\GlobalAchievementPercentagesForAppResponse;

class GlobalAchievementPercentagesForAppRequest extends Request
{
    private string $version = 'v0002';
    private string $interface = 'ISteamUserStats';
    private string $method = 'GetGlobalAchievementPercentagesForApp';
    private string $response = GlobalAchievementPercentagesForAppResponse::class;

    public function __construct()
    {
        parent::__construct($this->version, $this->interface, $this->method, $this->response);
    }
}
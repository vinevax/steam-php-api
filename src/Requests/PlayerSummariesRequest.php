<?php

namespace VineVax\SteamPHPApi\Requests;

use VineVax\SteamPHPApi\Responses\PlayerSummariesResponse;

class PlayerSummariesRequest extends Request
{
    private string $version = 'v0002';
    private string $interface = 'ISteamUser';
    private string $method = 'GetPlayerSummaries';
    private string $response = PlayerSummariesResponse::class;

    public function __construct()
    {
        parent::__construct($this->version, $this->interface, $this->method, $this->response);
    }
}
<?php

namespace VineVax\SteamPHPApi\Requests;

use VineVax\SteamPHPApi\Responses\NewsForAppResponse;

class NewsForAppRequest extends Request
{
    private string $version = 'v0002';
    private string $interface = 'ISteamNews';
    private string $method = 'GetNewsForApp';
    private string $response = NewsForAppResponse::class;

    public function __construct()
    {
        parent::__construct($this->version, $this->interface, $this->method, $this->response);
    }
}
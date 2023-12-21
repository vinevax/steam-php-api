<?php

namespace VineVax\SteamPHPApi\Requests;

use VineVax\SteamPHPApi\Responses\FriendListResponse;

class FriendListRequest extends Request
{
    private string $version = 'v0001';
    private string $interface = 'ISteamUser';
    private string $method = 'GetFriendList';
    private string $response = FriendListResponse::class;

    public function __construct()
    {
        parent::__construct($this->version, $this->interface, $this->method, $this->response);
    }
}
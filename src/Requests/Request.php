<?php

namespace VineVax\SteamPHPApi\Requests;

use VineVax\SteamPHPApi\Responses\Response;

abstract class Request
{
    public function __construct(
        private readonly string  $version,
        private readonly string  $interface,
        private readonly  string $method,
        private readonly string  $response,
    ) {}

    public function getUrl(): string
    {
        return "https://api.steampowered.com/{$this->interface}/{$this->method}/{$this->version}/";
    }

    public function createResponse(...$response): Response
    {
        return $this->response::fromResponse(...$response);
    }
}
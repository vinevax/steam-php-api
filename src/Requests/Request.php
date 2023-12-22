<?php

namespace VineVax\SteamPHPApi\Requests;

use VineVax\SteamPHPApi\Responses\Response;

abstract class Request
{
    public function __construct(
        private readonly ?string $version = null,
        private readonly ?string $interface = null,
        private readonly ?string $method = null,
        private readonly ?string $response = null,
        private readonly string $base = 'https://api.steampowered.com',
    ) {}

    public function getUrl(): string
    {
        return "{$this->base}/{$this->interface}/{$this->method}/{$this->version}/";
    }

    public function createResponse(...$response): Response
    {
        return $this->response::fromResponse(...$response);
    }
}
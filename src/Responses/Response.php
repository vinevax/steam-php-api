<?php

namespace VineVax\SteamPHPApi\Responses;

interface Response
{
    public static function fromResponse($response): self;
}
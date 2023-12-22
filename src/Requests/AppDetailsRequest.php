<?php

namespace VineVax\SteamPHPApi\Requests;

use VineVax\SteamPHPApi\Responses\AppDetailsResponse;

class AppDetailsRequest extends Request
{
    public function __construct(
    ) {
        parent::__construct(
            response: AppDetailsResponse::class,
        );
    }

    public function getUrl(): string
    {
        return "https://store.steampowered.com/api/appdetails";
    }
}
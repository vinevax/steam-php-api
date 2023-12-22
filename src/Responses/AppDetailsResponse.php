<?php

namespace VineVax\SteamPHPApi\Responses;

use VineVax\SteamPHPApi\Models\AppDetails;

readonly class AppDetailsResponse implements Response
{
    public function __construct(
        public bool $success,
        public AppDetails $appDetails,
    ){}

    public static function fromResponse($response): self
    {
        $key = array_key_first($response);
        $data = $response[$key]['data'];

        return new self(
            $response[$key]['success'],
            AppDetails::fromArray($data),
        );
    }
}
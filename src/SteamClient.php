<?php

namespace VineVax\SteamPHPApi;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use VineVax\SteamPHPApi\Requests\NewsForAppRequest;
use VineVax\SteamPHPApi\Requests\PlayerSummariesRequest;
use VineVax\SteamPHPApi\Requests\Request;
use VineVax\SteamPHPApi\Responses\NewsForAppResponse;
use VineVax\SteamPHPApi\Responses\PlayerSummariesResponse;
use VineVax\SteamPHPApi\Responses\Response;

class SteamClient
{
    private ClientInterface $client;

    public function __construct(
        private readonly string $apiKey,
        ClientInterface         $client = null,
    ){
        $this->client = $client ?? new Client();
    }

    /**
     * @throws GuzzleException
     */
    private function sendRequest(Request $request, $params = []): Response
    {
        $url = $request->getUrl();

        $params['key'] = $this->apiKey;

        $res = $this->client->get($url, [
            'query' => $params,
        ]);

        return $request->createResponse($res);
    }

    public function getPlayerSummaries(array|string $steamIds): PlayerSummariesResponse
    {
        return $this->sendRequest(new PlayerSummariesRequest(), [
            'steamids' => is_array($steamIds) ? implode(',', $steamIds) : $steamIds,
        ]);
    }

    public function getNewsForApp(int $appId, int $count = 20, int $maxLength = 300): NewsForAppResponse
    {
        return $this->sendRequest(new NewsForAppRequest(), [
            'appid' => $appId,
            'count' => $count,
            'maxlength' => $maxLength,
        ]);
    }
}
<?php

namespace VineVax\SteamPHPApi;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use VineVax\SteamPHPApi\Enums\Language;
use VineVax\SteamPHPApi\Requests\FriendListRequest;
use VineVax\SteamPHPApi\Requests\GlobalAchievementPercentagesForAppRequest;
use VineVax\SteamPHPApi\Requests\NewsForAppRequest;
use VineVax\SteamPHPApi\Requests\OwnedGamesRequest;
use VineVax\SteamPHPApi\Requests\PlayerAchievementsRequest;
use VineVax\SteamPHPApi\Requests\PlayerSummariesRequest;
use VineVax\SteamPHPApi\Requests\Request;
use VineVax\SteamPHPApi\Requests\UserStatsForGameRequest;
use VineVax\SteamPHPApi\Responses\FriendListResponse;
use VineVax\SteamPHPApi\Responses\GlobalAchievementPercentagesForAppResponse;
use VineVax\SteamPHPApi\Responses\NewsForAppResponse;
use VineVax\SteamPHPApi\Responses\OwnedGamesResponse;
use VineVax\SteamPHPApi\Responses\PlayerAchievementsResponse;
use VineVax\SteamPHPApi\Responses\PlayerSummariesResponse;
use VineVax\SteamPHPApi\Responses\Response;
use VineVax\SteamPHPApi\Responses\UserStatsForGameResponse;

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

        return $request->createResponse(
            json_decode($res->getBody()->getContents(), true)
        );
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

    public function getGlobalAchievementPercentagesForApp(int $appId): GlobalAchievementPercentagesForAppResponse
    {
        return $this->sendRequest(new GlobalAchievementPercentagesForAppRequest(), [
            'gameid' => $appId,
        ]);
    }

    public function getFriendList($steamId, $relationship = 'friend'): FriendListResponse
    {
        return $this->sendRequest(new FriendListRequest(), [
            'steamid' => $steamId,
            'relationship' => $relationship,
        ]);
    }

    public function getPlayerAchievements($steamId, $appId, Language $language = Language::ENGLISH): PlayerAchievementsResponse
    {
        return $this->sendRequest(new PlayerAchievementsRequest(), [
            'steamid' => $steamId,
            'appid' => $appId,
            'l' => $language->value,
        ]);
    }

    public function getUserStatsForGame($steamId, $appId, Language $language = Language::ENGLISH): UserStatsForGameResponse
    {
        return $this->sendRequest(new UserStatsForGameRequest(), [
            'steamid' => $steamId,
            'appid' => $appId,
            'l' => $language->value,
        ]);
    }

    public function getOwnedGames(int $steamId, bool $includeAppInfo = false, $includeFreeGames = false): OwnedGamesResponse
    {
        return $this->sendRequest(new OwnedGamesRequest(), [
            'steamid' => $steamId,
            'include_appinfo' => $includeAppInfo,
            'include_played_free_games' => $includeFreeGames,
        ]);
    }
}
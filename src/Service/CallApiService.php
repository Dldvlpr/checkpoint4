<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;


class CallApiService
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }


    public function getsummonerStat(string $playerName): array
    {


        $playerId = $this->client->request(
            'GET',
            "https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/$playerName?api_key=RGAPI-81da8750-b1f7-4283-b7e3-3a489e206628"
        );

        $ar = $playerId->toArray();
        $id = strval($ar["id"]);


        $playerStat = $this->client->request(
            'GET',
            "https://euw1.api.riotgames.com/lol/league/v4/entries/by-summoner/$id?api_key=RGAPI-81da8750-b1f7-4283-b7e3-3a489e206628"
        );

        return $playerStat = $playerStat->toArray();
    }
}
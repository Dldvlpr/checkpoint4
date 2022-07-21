<?php

namespace App\Service;

use App\Entity\LolProfile;
use App\Entity\User;
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
            "https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/$playerName?api_key=RGAPI-4788b30f-d2f7-43bc-b9b7-a9d09e1876af"
        );

        $ar = $playerId->toArray();
        $id = strval($ar["id"]);


        $playerStat = $this->client->request(
            'GET',
            "https://euw1.api.riotgames.com/lol/league/v4/entries/by-summoner/$id?api_key=RGAPI-4788b30f-d2f7-43bc-b9b7-a9d09e1876af"
        );

        return $playerStat = $playerStat->toArray();
    }
}
<?php

namespace App\Entity;

use App\Repository\LolProfileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LolProfileRepository::class)]
class LolProfile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $leagueId = null;

    #[ORM\Column(length: 255)]
    private ?string $summonerId = null;

    #[ORM\Column(length: 255)]
    private ?string $summonerName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLeagueId(): ?string
    {
        return $this->leagueId;
    }

    public function setLeagueId(string $leagueId): self
    {
        $this->leagueId = $leagueId;

        return $this;
    }

    public function getSummonerId(): ?string
    {
        return $this->summonerId;
    }

    public function setSummonerId(string $summonerId): self
    {
        $this->summonerId = $summonerId;

        return $this;
    }

    public function getSummonerName(): ?string
    {
        return $this->summonerName;
    }

    public function setSummonerName(string $summonerName): self
    {
        $this->summonerName = $summonerName;

        return $this;
    }
}

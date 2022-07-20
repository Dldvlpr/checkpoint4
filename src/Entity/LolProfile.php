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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $summonerRank = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $summonerTier = null;

    #[ORM\Column(nullable: true)]
    private ?int $leaguePoints = null;

    #[ORM\OneToOne(inversedBy: 'lolProfile', cascade: ['persist', 'remove'])]
    private ?User $user = null;

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

    public function getSummonerRank(): ?string
    {
        return $this->summonerRank;
    }

    public function setSummonerRank(?string $summonerRank): self
    {
        $this->summonerRank = $summonerRank;

        return $this;
    }

    public function getSummonerTier(): ?string
    {
        return $this->summonerTier;
    }

    public function setSummonerTier(?string $summonerTier): self
    {
        $this->summonerTier = $summonerTier;

        return $this;
    }

    public function getLeaguePoints(): ?int
    {
        return $this->leaguePoints;
    }

    public function setLeaguePoints(?int $leaguePoints): self
    {
        $this->leaguePoints = $leaguePoints;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}

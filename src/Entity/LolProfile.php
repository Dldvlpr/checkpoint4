<?php

namespace App\Entity;

use App\Repository\LolProfileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LolProfileRepository::class)]
class LolProfile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?int $lolId = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private User $user;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $rankedFlex = [];

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $rankedSolo = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRankedFlex(): array
    {
        return $this->rankedFlex;
    }

    public function setRankedFlex(?array $rankedFlex): self
    {
        $this->rankedFlex = $rankedFlex;

        return $this;
    }

    public function getRankedSolo(): array
    {
        return $this->rankedSolo;
    }

    public function setRankedSolo(?array $rankedSolo): self
    {
        $this->rankedSolo = $rankedSolo;

        return $this;
    }
}

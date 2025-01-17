<?php

namespace App\Entity;

use App\Repository\PartieRejointRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: PartieRejointRepository::class)]
class PartieRejoint
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['mes_parties_view', 'mes_parties', 'partie'])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'partieRejoints')]
    #[Groups(['mes_parties_view', 'mes_parties', 'partie_view'])]
    private ?Partie $partie = null;

    #[ORM\ManyToOne(inversedBy: 'partieRejoints')]
    #[Groups(['mes_parties_view', 'mes_parties', 'partie', 'partie_view'])]
    private ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['mes_parties_view', 'mes_parties', 'partie', 'partie_view'])]
    private ?string $role = null;

    #[ORM\Column(type: 'simple_array', nullable: true)]
    private ?array $souhaits = [];


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartie(): ?Partie
    {
        return $this->partie;
    }

    public function setPartie(?Partie $partie): static
    {
        $this->partie = $partie;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getSouhaits(): ?array
    {
        return $this->souhaits;
    }

    public function setSouhaits(?array $souhaits): static
    {
        $this->souhaits = $souhaits;

        return $this;
    }
}

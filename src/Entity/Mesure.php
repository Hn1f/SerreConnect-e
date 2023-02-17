<?php

namespace App\Entity;

use App\Repository\MesureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MesureRepository::class)]
class Mesure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datation = null;

    #[ORM\Column]
    private ?float $mesureT = null;

    #[ORM\Column]
    private ?float $mesureHSol = null;

    #[ORM\Column]
    private ?float $mesureHAir = null;

    #[ORM\Column]
    private ?float $niveau = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatation(): ?\DateTimeInterface
    {
        return $this->datation;
    }

    public function setDatation(\DateTimeInterface $datation): self
    {
        $this->datation = $datation;

        return $this;
    }

    public function getMesureT(): ?float
    {
        return $this->mesureT;
    }

    public function setMesureT(float $mesureT): self
    {
        $this->mesureT = $mesureT;

        return $this;
    }

    public function getMesureHSol(): ?float
    {
        return $this->mesureHSol;
    }

    public function setMesureHSol(float $mesureHSol): self
    {
        $this->mesureHSol = $mesureHSol;

        return $this;
    }

    public function getMesureHAir(): ?float
    {
        return $this->mesureHAir;
    }

    public function setMesureHAir(float $mesureHAir): self
    {
        $this->mesureHAir = $mesureHAir;

        return $this;
    }

    public function getNiveau(): ?float
    {
        return $this->niveau;
    }

    public function setNiveau(float $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
}

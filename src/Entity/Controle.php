<?php

namespace App\Entity;

use App\Repository\ControleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ControleRepository::class)]
class Controle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $mode = null;

    #[ORM\Column]
    private ?float $tempConsigne = null;

    #[ORM\Column]
    private ?bool $arrosage = null;

    #[ORM\Column]
    private ?bool $ventilation = null;

    #[ORM\Column]
    private ?float $SoilHumidity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isMode(): ?bool
    {
        return $this->mode;
    }

    public function setMode(bool $mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    public function getTempConsigne(): ?float
    {
        return $this->tempConsigne;
    }

    public function setTempConsigne(float $tempConsigne): self
    {
        $this->tempConsigne = $tempConsigne;

        return $this;
    }

    public function isArrosage(): ?bool
    {
        return $this->arrosage;
    }

    public function setArrosage(bool $arrosage): self
    {
        $this->arrosage = $arrosage;

        return $this;
    }

    public function isVentilation(): ?bool
    {
        return $this->ventilation;
    }

    public function setVentilation(bool $ventilation): self
    {
        $this->ventilation = $ventilation;

        return $this;
    }

    public function getSoilHumidity(): ?float
    {
        return $this->SoilHumidity;
    }

    public function setSoilHumidity(float $SoilHumidity): self
    {
        $this->SoilHumidity = $SoilHumidity;

        return $this;
    }
}

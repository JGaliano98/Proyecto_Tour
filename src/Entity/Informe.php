<?php

namespace App\Entity;

use App\Repository\InformeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InformeRepository::class)]
class Informe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $observaciones = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $dinero = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $foto = null;

    #[ORM\OneToOne(inversedBy: 'informe', cascade: ['persist', 'remove'])]
    private ?Tour $id_tour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(string $observaciones): static
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getDinero(): ?string
    {
        return $this->dinero;
    }

    public function setDinero(string $dinero): static
    {
        $this->dinero = $dinero;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): static
    {
        $this->foto = $foto;

        return $this;
    }

    public function getIdTour(): ?Tour
    {
        return $this->id_tour;
    }

    public function setIdTour(?Tour $id_tour): static
    {
        $this->id_tour = $id_tour;

        return $this;
    }
}

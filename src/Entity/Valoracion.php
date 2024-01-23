<?php

namespace App\Entity;

use App\Repository\ValoracionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ValoracionRepository::class)]
#[Broadcast]
class Valoracion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $estrellas = null;

    #[ORM\Column(length: 255)]
    private ?string $comentario = null;

    #[ORM\ManyToOne(inversedBy: 'valoracions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tour $id_tour = null;

    #[ORM\OneToOne(inversedBy: 'valoracion', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reserva $id_reserva = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstrellas(): ?int
    {
        return $this->estrellas;
    }

    public function setEstrellas(int $estrellas): static
    {
        $this->estrellas = $estrellas;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(string $comentario): static
    {
        $this->comentario = $comentario;

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

    public function getIdReserva(): ?Reserva
    {
        return $this->id_reserva;
    }

    public function setIdReserva(Reserva $id_reserva): static
    {
        $this->id_reserva = $id_reserva;

        return $this;
    }
}

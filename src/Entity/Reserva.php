<?php

namespace App\Entity;

use App\Repository\ReservaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservaRepository::class)]
class Reserva
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\Column(length: 255)]
    private ?string $estado = null;

    #[ORM\Column(nullable: true)]
    private ?int $personas_iniciales = null;

    #[ORM\Column(nullable: true)]
    private ?int $personas_finales = null;

    #[ORM\ManyToOne(inversedBy: 'reservas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $id_usuario = null;

    #[ORM\ManyToOne(inversedBy: 'reservas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tour $id_tour = null;

    #[ORM\OneToOne(mappedBy: 'id_reserva', cascade: ['persist', 'remove'])]
    private ?Valoracion $valoracion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    public function getPersonasIniciales(): ?int
    {
        return $this->personas_iniciales;
    }

    public function setPersonasIniciales(?int $personas_iniciales): static
    {
        $this->personas_iniciales = $personas_iniciales;

        return $this;
    }

    public function getPersonasFinales(): ?int
    {
        return $this->personas_finales;
    }

    public function setPersonasFinales(?int $personas_finales): static
    {
        $this->personas_finales = $personas_finales;

        return $this;
    }

    public function getIdUsuario(): ?User
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(?User $id_usuario): static
    {
        $this->id_usuario = $id_usuario;

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

    public function getValoracion(): ?Valoracion
    {
        return $this->valoracion;
    }

    public function setValoracion(Valoracion $valoracion): static
    {
        // set the owning side of the relation if necessary
        if ($valoracion->getIdReserva() !== $this) {
            $valoracion->setIdReserva($this);
        }

        $this->valoracion = $valoracion;

        return $this;
    }
}

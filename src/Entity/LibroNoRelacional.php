<?php

namespace App\Entity;

use App\Repository\LibroNoRelacionalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LibroNoRelacionalRepository::class)]
class LibroNoRelacional
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $titulo = null;

    #[ORM\Column(length: 100)]
    private ?string $editorial = null;

    #[ORM\Column(length: 100)]
    private ?string $autor = null;

    #[ORM\Column]
    private ?int $a_publicacion = null;

    #[ORM\Column(type: 'boolean')]
    private bool $activo = true; // definido como activo (true)

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getEditorial(): ?string
    {
        return $this->editorial;
    }

    public function setEditorial(string $editorial): static
    {
        $this->editorial = $editorial;

        return $this;
    }

    public function getAutor(): ?string
    {
        return $this->autor;
    }

    public function setAutor(string $autor): static
    {
        $this->autor = $autor;

        return $this;
    }

    public function getAPublicacion(): ?int
    {
        return $this->a_publicacion;
    }

    public function setAPublicacion(int $a_publicacion): static
    {
        $this->a_publicacion = $a_publicacion;

        return $this;
    }

    public function isActivo(): bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;
        return $this;
    }
}

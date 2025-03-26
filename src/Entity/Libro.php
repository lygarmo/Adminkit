<?php

namespace App\Entity;

use App\Repository\LibroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LibroRepository::class)]
class Libro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $titulo = null;

    // Relación de 1 a 1 con la entidad Autor
    #[ORM\OneToOne(targetEntity: Autores::class, inversedBy: 'libro')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Autores $autor = null;

    #[ORM\Column]
    private ?int $a_publicacion = null;

    // Relacion de 1 a N con la entidad Editorial
    #[ORM\ManyToOne(targetEntity: Editorial::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Editorial $editorial = null;

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

    public function getAutor(): ?Autores
    {
        return $this->autor;
    }

    public function setAutor(Autores $autor): static
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

    public function getEditorial(): ?Editorial
    {
        return $this->editorial;
    }

    public function setEditorial(Editorial $editorial): static
    {
        $this->editorial = $editorial;

        return $this;
    }
}

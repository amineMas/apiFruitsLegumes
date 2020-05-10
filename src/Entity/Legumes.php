<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LegumesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      collectionOperations={"get", "post"},
 *      itemOperations={
 *          "get"={"path"="/legume/{id}"},
 *          "put"
 *      }
 * 
 * )
 * @ORM\Entity(repositoryClass=LegumesRepository::class)
 */
class Legumes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $rang;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRang(): ?int
    {
        return $this->rang;
    }

    public function setRang(int $rang): self
    {
        $this->rang = $rang;

        return $this;
    }
}

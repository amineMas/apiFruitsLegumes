<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FruitsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *          "get"={"path"="/fruit/{id}"},
 *          "put"
 *     }
 * )
 * @ORM\Entity(repositoryClass=FruitsRepository::class)
 */
class Fruits
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Nom du fruit
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * Classement du fruit selon le taux d'échantillons contenant des résidus de pesticides du plus contaminé au moins contaminé
     * 
     * @ORM\Column(type="integer")
     */
    private $rang;

    /**
     * taux d'échantillons contenant des résidus de pesticides divisé par 100
     * 
     * @ORM\Column(type="decimal", precision=4, scale=3)
     */
    private $tauxPesticides;

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

    public function getTauxPesticides(): ?string
    {
        return $this->tauxPesticides;
    }

    public function setTauxPesticides(string $tauxPesticides): self
    {
        $this->tauxPesticides = $tauxPesticides;

        return $this;
    }
}

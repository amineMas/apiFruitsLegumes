<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FruitsRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\MongoDbOdm\Filter\RangeFilter;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *          "get"={"path"="/fruit/{id}"},
 *          "put"
 *     },
 *     normalizationContext={"groups"={"fruit_listing:read"}, "swagger_definition_name"="Read"},
 *     denormalizationContext={"groups"={"fruit_listing:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"nom": "partial"})
 * @ApiFilter(RangeFilter::class, properties={"tauxPesticides"})
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
     * @Groups({"fruit_listing:read", "fruit_listing:write"})
     */
    private $nom;

    /**
     * Classement du fruit selon le taux d'échantillons contenant des résidus de pesticides du plus contaminé au moins contaminé
     * 
     * @ORM\Column(type="integer")
     * @Groups({"fruit_listing:read", "fruit_listing:write"})
     */
    private $rang;

    /**
     * taux d'échantillons contenant des résidus de pesticides divisé par 100
     * 
     * @ORM\Column(type="decimal", precision=4, scale=3)
     * @Groups({"fruit_listing:read", "fruit_listing:write"})
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
        return $this->tauxPesticides * 100;
    }

    public function setTauxPesticides(string $tauxPesticides): self
    {
        $this->tauxPesticides = $tauxPesticides;

        return $this;
    }
}

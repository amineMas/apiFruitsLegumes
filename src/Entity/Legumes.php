<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\LegumesRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *      collectionOperations={"get", "post"},
 *      itemOperations={
 *          "get",
 *          "put"
 *      }
 * )
 * @ApiFilter(SearchFilter::class, properties={"nom": "partial"})
 * @ApiFilter(OrderFilter::class, properties={"rang"}, arguments={"orderParameterName"="order"})
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

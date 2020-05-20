<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FruitsRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *          "get"={"path"="/fruit/{id}"},
 *          "put"
 *     },
 *     normalizationContext={"groups"={"fruit_listing:read"}, "swagger_definition_name"="Read"},
 *     denormalizationContext={"groups"={"fruit_listing:write"}},
 *     attributes={
 *          "pagination_items_per_page"=20,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ApiFilter(SearchFilter::class, properties={"nom": "partial"})
 * @ApiFilter(OrderFilter::class, properties={"rang"}, arguments={"orderParameterName"="order"})
 * @ApiFilter(PropertyFilter::class)
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
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min=4,
     *      max=50,
     *      maxMessage="Le fruit doit contenir 50 caractères ou moins"
     * )
     */
    private $nom;

    /**
     * Classement du fruit selon le taux d'échantillons contenant des résidus de pesticides du plus contaminé au moins contaminé
     * 
     * @ORM\Column(type="integer")
     * @Groups({"fruit_listing:read", "fruit_listing:write"})
     * @Assert\NotBlank()
     */
    private $rang;

    /**
     * taux d'échantillons contenant des résidus de pesticides divisé par 100
     * 
     * @ORM\Column(type="decimal", precision=4, scale=3)
     * @Groups({"fruit_listing:read", "fruit_listing:write"})
     * @Assert\NotBlank()
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
